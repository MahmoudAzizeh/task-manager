<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $user = auth()->user();

        $totalTasks = $user->tasks()->count();

        $completedTasks = $user->tasks()
            ->where('completed', true)
            ->count();

        $pendingTasks = $user->tasks()
            ->where('completed', false)
            ->count();

        $highPriorityTasks = $user->tasks()
            ->where('priority', 'high')
            ->where('completed', false)
            ->count();

        $recentTasks = $user->tasks()
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'user',
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'highPriorityTasks',
            'recentTasks'
        ));
    }
}
