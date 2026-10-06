<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display all tasks for the logged-in user.
     */
    public function index(Request $request)
    {
        $query = auth()->user()
            ->tasks()
            ->with('category');

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'ilike', "%{$search}%")
                    ->orWhere('description', 'ilike', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            if ($request->status === 'completed') {
                $query->where('completed', true);
            }

            if ($request->status === 'pending') {
                $query->where('completed', false);
            }

            if ($request->status === 'overdue') {
                $query->where('completed', false)
                    ->whereNotNull('due_date')
                    ->whereDate('due_date', '<', now()->toDateString());
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Priority Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        $sort = $request->get('sort', 'newest');

        switch ($sort) {

            case 'oldest':
                $query->oldest();
                break;

            case 'due_soon':
                $query
                    ->orderByRaw(
                        'CASE WHEN due_date IS NULL THEN 1 ELSE 0 END'
                    )
                    ->orderBy('due_date', 'asc');
                break;

            case 'due_latest':
                $query
                    ->orderByRaw(
                        'CASE WHEN due_date IS NULL THEN 1 ELSE 0 END'
                    )
                    ->orderBy('due_date', 'desc');
                break;

            case 'priority_high':
                $query->orderByRaw("
                    CASE priority
                        WHEN 'high' THEN 1
                        WHEN 'medium' THEN 2
                        WHEN 'low' THEN 3
                        ELSE 4
                    END
                ");
                break;

            case 'priority_low':
                $query->orderByRaw("
                    CASE priority
                        WHEN 'low' THEN 1
                        WHEN 'medium' THEN 2
                        WHEN 'high' THEN 3
                        ELSE 4
                    END
                ");
                break;

            case 'newest':
            default:
                $query->latest();
                break;
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $tasks = $query
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = auth()->user()
            ->categories()
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $userTasks = auth()->user()->tasks();

        $totalTasks = $userTasks->count();

        $completedTasks = (clone $userTasks)
            ->where('completed', true)
            ->count();

        $pendingTasks = (clone $userTasks)
            ->where('completed', false)
            ->count();

        $overdueTasks = (clone $userTasks)
            ->where('completed', false)
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', now()->toDateString())
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('tasks.index', compact(
            'tasks',
            'categories',
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'overdueTasks'
        ));
    }


    /**
     * Store a new task.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'priority' => 'nullable|in:low,medium,high',

            'due_date' => 'nullable|date',

            'category_id' => 'nullable|exists:categories,id',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Security: category must belong to current user
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['category_id'])) {
            $categoryExists = auth()->user()
                ->categories()
                ->where('id', $validated['category_id'])
                ->exists();

            if (!$categoryExists) {
                abort(403);
            }
        }

        auth()->user()->tasks()->create([
            'title' => $validated['title'],

            'description' => $validated['description'] ?? null,

            'priority' => $validated['priority'] ?? 'medium',

            'due_date' => $validated['due_date'] ?? null,

            'category_id' => $validated['category_id'] ?? null,

            'completed' => false,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                'Task created successfully!'
            );
    }


    /**
     * Display a single task.
     */
    public function show(Task $task)
    {
        Gate::authorize('view', $task);

        $task->load('category');

        return view('tasks.show', compact('task'));
    }


    /**
     * Show the edit form.
     */
    public function edit(Task $task)
    {
        Gate::authorize('update', $task);

        $categories = auth()->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('tasks.edit', compact(
            'task',
            'categories'
        ));
    }


    /**
     * Update an existing task.
     */
    public function update(Request $request, Task $task)
    {
        Gate::authorize('update', $task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'priority' => 'nullable|in:low,medium,high',

            'due_date' => 'nullable|date',

            'category_id' => 'nullable|exists:categories,id',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Security: category must belong to current user
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['category_id'])) {
            $categoryExists = auth()->user()
                ->categories()
                ->where('id', $validated['category_id'])
                ->exists();

            if (!$categoryExists) {
                abort(403);
            }
        }

        $task->update([
            'title' => $validated['title'],

            'description' => $validated['description'] ?? null,

            'priority' => $validated['priority'] ?? $task->priority,

            'due_date' => $validated['due_date'] ?? null,

            'category_id' => $validated['category_id'] ?? null,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                'Task updated successfully!'
            );
    }


    /**
     * Delete a task.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                'Task deleted successfully!'
            );
    }


    /**
     * Toggle task status.
     */
    public function toggle(Task $task)
    {
        Gate::authorize('update', $task);

        $task->update([
            'completed' => !$task->completed,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                $task->completed
                    ? 'Task marked as completed!'
                    : 'Task marked as pending!'
            );
    }
}
