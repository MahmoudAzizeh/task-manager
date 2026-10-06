<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display all categories for the logged-in user.
     */
    public function index()
    {
        $categories = auth()->user()
            ->categories()
            ->withCount('tasks')
            ->orderBy('name')
            ->get();

        return view(
            'categories.index',
            compact('categories')
        );
    }


    /**
     * Store a new category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>
                'required|string|max:255',

            'description' =>
                'nullable|string|max:1000',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate category names for the current user
        |--------------------------------------------------------------------------
        */

        $exists = auth()->user()
            ->categories()
            ->where('name', $validated['name'])
            ->exists();


        if ($exists) {

            return redirect()
                ->route('categories.index')
                ->withErrors([
                    'name' =>
                        'You already have a category with this name.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Create Category
        |--------------------------------------------------------------------------
        */

        auth()->user()
            ->categories()
            ->create([
                'name' =>
                    $validated['name'],

                'description' =>
                    $validated['description'] ?? null,
            ]);


        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category created successfully!'
            );
    }


    /**
     * Display a single category.
     */
    public function show(Category $category)
    {
        Gate::authorize(
            'view',
            $category
        );


        $category->load([
            'tasks' => function ($query) {
                $query->latest();
            }
        ]);


        return view(
            'categories.show',
            compact('category')
        );
    }


    /**
     * Show the edit form.
     */
    public function edit(Category $category)
    {
        Gate::authorize(
            'update',
            $category
        );


        return view(
            'categories.edit',
            compact('category')
        );
    }


    /**
     * Update a category.
     */
    public function update(
        Request $request,
        Category $category
    ) {
        Gate::authorize(
            'update',
            $category
        );


        $validated = $request->validate([
            'name' =>
                'required|string|max:255',

            'description' =>
                'nullable|string|max:1000',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate names
        |--------------------------------------------------------------------------
        */

        $exists = auth()->user()
            ->categories()
            ->where(
                'name',
                $validated['name']
            )
            ->where(
                'id',
                '!=',
                $category->id
            )
            ->exists();


        if ($exists) {

            return redirect()
                ->back()
                ->withErrors([
                    'name' =>
                        'You already have another category with this name.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */

        $category->update([
            'name' =>
                $validated['name'],

            'description' =>
                $validated['description'] ?? null,
        ]);


        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category updated successfully!'
            );
    }


    /**
     * Delete a category.
     */
    public function destroy(Category $category)
    {
        Gate::authorize(
            'delete',
            $category
        );


        /*
        |--------------------------------------------------------------------------
        | Remove category from its tasks first
        |--------------------------------------------------------------------------
        */

        $category->tasks()->update([
            'category_id' => null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Delete category
        |--------------------------------------------------------------------------
        */

        $category->delete();


        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category deleted successfully!'
            );
    }
}
