<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Tasks - Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #1f2937;
        }

        /* =========================================================
           NAVBAR
        ========================================================= */

        nav {
            background: #111827;
            color: white;
            padding: 18px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .user-name {
            color: #d1d5db;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 15px;
            padding: 0;
        }

        .logout-button:hover {
            text-decoration: underline;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 36px;
        }

        .page-header p {
            margin: 8px 0 0;
            color: #6b7280;
        }


        /* =========================================================
           ALERTS
        ========================================================= */

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }


        /* =========================================================
           STATISTICS
        ========================================================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6b7280;
        }


        /* =========================================================
           CARD
        ========================================================= */

        .card {
            background: white;
            border-radius: 12px;

            padding: 28px;
            margin-bottom: 30px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-grid {
            display: grid;

            grid-template-columns:
                2fr
                1fr
                1fr;

            gap: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;

            font-weight: bold;
            margin-bottom: 7px;

            font-size: 14px;
        }

        input,
        textarea,
        select {
            width: 100%;

            padding: 11px 13px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 14px;
            background: white;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .btn {
            display: inline-block;

            border: none;
            border-radius: 8px;

            padding: 11px 17px;

            cursor: pointer;
            text-decoration: none;

            font-size: 14px;
            font-weight: bold;

            text-align: center;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .btn-success:hover {
            background: #15803d;
        }

        .btn-warning {
            background: #d97706;
            color: white;
        }

        .btn-warning:hover {
            background: #b45309;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-view {
            background: #4f46e5;
            color: white;
        }

        .btn-view:hover {
            background: #4338ca;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }


        /* =========================================================
           FILTERS
        ========================================================= */

        .filters {
            display: grid;

            grid-template-columns:
                2fr
                1fr
                1fr
                1fr
                1fr
                auto;

            gap: 12px;

            align-items: end;
        }

        .filter-group {
            margin: 0;
        }

        .filter-buttons {
            display: flex;
            gap: 8px;
        }


        /* =========================================================
           TASK HEADER
        ========================================================= */

        .tasks-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 15px;

            gap: 15px;
        }

        .tasks-header h2 {
            margin: 0;
        }

        .task-count {
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================================================
           TASK LIST
        ========================================================= */

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .task-card {
            background: white;

            border-radius: 12px;
            padding: 22px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);

            display: flex;

            justify-content: space-between;

            gap: 20px;

            border-left: 5px solid #2563eb;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 22px rgba(0, 0, 0, 0.09);
        }

        .task-card.task-completed {
            border-left-color: #16a34a;
        }

        .task-card.task-overdue {
            border-left-color: #dc2626;
        }

        .task-main {
            flex: 1;
            min-width: 0;
        }

        .task-title {
            margin: 0 0 8px;
            font-size: 21px;
        }

        .task-title.completed-title {
            text-decoration: line-through;
            color: #6b7280;
        }

        .task-description {
            margin: 0 0 15px;

            color: #6b7280;

            line-height: 1.6;

            white-space: pre-wrap;

            overflow-wrap: anywhere;
        }


        /* =========================================================
           BADGES
        ========================================================= */

        .badges {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;

            margin-bottom: 12px;
        }

        .badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;
        }

        .badge-completed {
            background: #dcfce7;
            color: #166534;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-low {
            background: #dcfce7;
            color: #166534;
        }

        .badge-medium {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-high {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-overdue {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-category {
            color: white;
        }


        /* =========================================================
           TASK META
        ========================================================= */

        .task-meta {
            display: flex;

            flex-wrap: wrap;

            gap: 18px;

            color: #6b7280;

            font-size: 13px;
        }

        .due-overdue {
            color: #dc2626;
            font-weight: bold;
        }

        .due-normal {
            color: #4b5563;
        }


        /* =========================================================
           TASK ACTIONS
        ========================================================= */

        .task-actions {
            display: flex;

            flex-direction: column;

            gap: 8px;

            min-width: 110px;
        }

        .task-actions form {
            margin: 0;
        }

        .task-actions .btn {
            width: 100%;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            background: white;

            border-radius: 12px;

            padding: 50px 20px;

            text-align: center;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .empty-state h3 {
            margin-top: 0;
        }

        .empty-state p {
            color: #6b7280;
            margin-bottom: 20px;
        }


        /* =========================================================
           PAGINATION
        ========================================================= */

        .pagination-wrapper {
            margin-top: 25px;

            display: flex;

            justify-content: center;
        }

        .pagination-wrapper nav {
            background: transparent;
            padding: 0;
        }

        .pagination-wrapper nav a,
        .pagination-wrapper nav span {
            display: inline-block;

            padding: 8px 12px;

            margin: 2px;

            border-radius: 6px;

            text-decoration: none;
        }

        .pagination-wrapper nav a {
            background: white;
            color: #2563eb;
        }

        .pagination-wrapper nav span {
            background: #2563eb;
            color: white;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .filters {
                grid-template-columns: repeat(3, 1fr);
            }

        }


        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .filters {
                grid-template-columns: repeat(2, 1fr);
            }

            .filters .filter-group:first-child {
                grid-column: 1 / -1;
            }

        }


        @media (max-width: 750px) {

            nav {
                padding: 15px 20px;

                flex-direction: column;

                align-items: flex-start;
            }

            .nav-right {
                width: 100%;
            }

            .page-header {
                flex-direction: column;

                align-items: flex-start;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .task-card {
                flex-direction: column;
            }

            .task-actions {
                flex-direction: row;

                flex-wrap: wrap;

                min-width: auto;
            }

            .task-actions .btn {
                width: auto;
            }

        }


        @media (max-width: 550px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .filters .filter-group:first-child {
                grid-column: auto;
            }

            .container {
                margin: 25px auto;
            }

            .card {
                padding: 20px;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .task-actions {
                flex-direction: column;
            }

            .task-actions .btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<!-- ============================================================
     NAVBAR
============================================================ -->

<nav>

    <div class="logo">
        Task Manager
    </div>


    <div class="nav-right">

        <span class="user-name">
            Hello, {{ auth()->user()->name }}
        </span>


        <a href="{{ route('dashboard') }}">
            Dashboard
        </a>


        <a href="{{ route('tasks.index') }}">
            My Tasks
        </a>


        <a href="{{ route('categories.index') }}">
            Categories
        </a>


        <a href="{{ route('profile.edit') }}">
            Profile
        </a>


        <form
            action="{{ route('logout') }}"
            method="POST"
            class="logout-form"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
            >
                Logout
            </button>

        </form>

    </div>

</nav>


<!-- ============================================================
     MAIN
============================================================ -->

<div class="container">


    <!-- ========================================================
         PAGE HEADER
    ========================================================= -->

    <div class="page-header">

        <div>

            <h1>
                My Tasks
            </h1>

            <p>
                Manage your tasks and stay organized.
            </p>

        </div>

    </div>


    <!-- ========================================================
         SUCCESS MESSAGE
    ========================================================= -->

    @if (session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <!-- ========================================================
         VALIDATION ERRORS
    ========================================================= -->

    @if ($errors->any())

        <div class="alert alert-error">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- ========================================================
         STATISTICS
    ========================================================= -->

    <div class="stats">


        <div class="stat-card">

            <div class="stat-number">
                {{ $totalTasks }}
            </div>

            <div class="stat-label">
                Total Tasks
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-number">
                {{ $completedTasks }}
            </div>

            <div class="stat-label">
                Completed
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-number">
                {{ $pendingTasks }}
            </div>

            <div class="stat-label">
                Pending
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-number">
                {{ $overdueTasks }}
            </div>

            <div class="stat-label">
                Overdue
            </div>

        </div>


    </div>


    <!-- ========================================================
         ADD NEW TASK
    ========================================================= -->

    <div class="card">

        <h2>
            Add New Task
        </h2>


        <form
            action="{{ route('tasks.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-grid">


                <!-- TITLE -->

                <div class="form-group">

                    <label for="title">
                        Task Title
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter task title"
                        required
                    >

                </div>


                <!-- CATEGORY -->

                <div class="form-group">

                    <label for="category_id">
                        Category
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                    >

                        <option value="">
                            No Category
                        </option>


                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- PRIORITY -->

                <div class="form-group">

                    <label for="priority">
                        Priority
                    </label>

                    <select
                        id="priority"
                        name="priority"
                    >

                        <option
                            value="low"
                            {{ old('priority') === 'low' ? 'selected' : '' }}
                        >
                            Low
                        </option>


                        <option
                            value="medium"
                            {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}
                        >
                            Medium
                        </option>


                        <option
                            value="high"
                            {{ old('priority') === 'high' ? 'selected' : '' }}
                        >
                            High
                        </option>

                    </select>

                </div>


                <!-- DUE DATE -->

                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group full">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter task description..."
                    >{{ old('description') }}</textarea>

                </div>


                <!-- SUBMIT -->

                <div class="form-group full">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        + Add Task
                    </button>

                </div>


            </div>

        </form>

    </div>


    <!-- ========================================================
         SEARCH & FILTER
    ========================================================= -->

    <div class="card">

        <h2>
            Search & Filter
        </h2>


        <form
            action="{{ route('tasks.index') }}"
            method="GET"
        >

            <div class="filters">


                <!-- SEARCH -->

                <div class="filter-group">

                    <label for="search">
                        Search
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search title or description..."
                    >

                </div>


                <!-- STATUS -->

                <div class="filter-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                    >

                        <option value="">
                            All Statuses
                        </option>


                        <option
                            value="pending"
                            {{ request('status') === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>


                        <option
                            value="completed"
                            {{ request('status') === 'completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>


                        <option
                            value="overdue"
                            {{ request('status') === 'overdue' ? 'selected' : '' }}
                        >
                            Overdue
                        </option>

                    </select>

                </div>


                <!-- PRIORITY -->

                <div class="filter-group">

                    <label for="filter_priority">
                        Priority
                    </label>

                    <select
                        name="priority"
                        id="filter_priority"
                    >

                        <option value="">
                            All Priorities
                        </option>


                        <option
                            value="low"
                            {{ request('priority') === 'low' ? 'selected' : '' }}
                        >
                            Low
                        </option>


                        <option
                            value="medium"
                            {{ request('priority') === 'medium' ? 'selected' : '' }}
                        >
                            Medium
                        </option>


                        <option
                            value="high"
                            {{ request('priority') === 'high' ? 'selected' : '' }}
                        >
                            High
                        </option>

                    </select>

                </div>


                <!-- CATEGORY FILTER -->

                <div class="filter-group">

                    <label for="filter_category">
                        Category
                    </label>

                    <select
                        name="category"
                        id="filter_category"
                    >

                        <option value="">
                            All Categories
                        </option>


                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ (string) request('category') === (string) $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- SORT -->

                <div class="filter-group">

                    <label for="sort">
                        Sort By
                    </label>

                    <select
                        name="sort"
                        id="sort"
                    >

                        <option
                            value="newest"
                            {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}
                        >
                            Newest
                        </option>


                        <option
                            value="oldest"
                            {{ request('sort') === 'oldest' ? 'selected' : '' }}
                        >
                            Oldest
                        </option>


                        <option
                            value="due_soon"
                            {{ request('sort') === 'due_soon' ? 'selected' : '' }}
                        >
                            Due Date: Soonest
                        </option>


                        <option
                            value="due_latest"
                            {{ request('sort') === 'due_latest' ? 'selected' : '' }}
                        >
                            Due Date: Latest
                        </option>


                        <option
                            value="priority_high"
                            {{ request('sort') === 'priority_high' ? 'selected' : '' }}
                        >
                            Priority: High → Low
                        </option>


                        <option
                            value="priority_low"
                            {{ request('sort') === 'priority_low' ? 'selected' : '' }}
                        >
                            Priority: Low → High
                        </option>

                    </select>

                </div>


                <!-- BUTTONS -->

                <div class="filter-buttons">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Apply
                    </button>


                    <a
                        href="{{ route('tasks.index') }}"
                        class="btn btn-secondary"
                    >
                        Reset
                    </a>

                </div>


            </div>

        </form>

    </div>


    <!-- ========================================================
         TASKS HEADER
    ========================================================= -->

    <div class="tasks-header">

        <h2>
            Tasks
        </h2>


        <span class="task-count">

            Showing
            {{ $tasks->count() }}
            of
            {{ $tasks->total() }}
            tasks

        </span>

    </div>


    <!-- ========================================================
         TASKS
    ========================================================= -->

    @if ($tasks->count() > 0)


        <div class="task-list">


            @foreach ($tasks as $task)


                @php

                    $isOverdue =
                        !$task->completed &&
                        $task->due_date &&
                        $task->due_date->isPast();

                @endphp


                <div
                    class="task-card
                    {{ $task->completed ? 'task-completed' : '' }}
                    {{ $isOverdue ? 'task-overdue' : '' }}"
                >


                    <!-- ==================================================
                         TASK INFORMATION
                    ================================================== -->

                    <div class="task-main">


                        <h3
                            class="task-title
                            {{ $task->completed ? 'completed-title' : '' }}"
                        >

                            {{ $task->title }}

                        </h3>


                        <!-- BADGES -->

                        <div class="badges">


                            @if ($task->completed)

                                <span class="badge badge-completed">
                                    ✓ Completed
                                </span>

                            @else

                                <span class="badge badge-pending">
                                    Pending
                                </span>

                            @endif


                            @if ($task->priority)

                                <span
                                    class="badge badge-{{ $task->priority }}"
                                >

                                    {{ ucfirst($task->priority) }}
                                    Priority

                                </span>

                            @endif


                            @if ($task->category)

                                <span
                                    class="badge badge-category"
                                    style="background-color: {{ $task->category->color ?? '#6b7280' }};"
                                >

                                    🏷 {{ $task->category->name }}

                                </span>

                            @endif


                            @if ($isOverdue)

                                <span class="badge badge-overdue">
                                    ⚠ Overdue
                                </span>

                            @endif


                        </div>


                        <!-- DESCRIPTION -->

                        @if ($task->description)

                            <p class="task-description">

                                {{ $task->description }}

                            </p>

                        @endif


                        <!-- TASK META -->

                        <div class="task-meta">


                            <!-- DUE DATE -->

                            @if ($task->due_date)

                                <span
                                    class="{{ $isOverdue ? 'due-overdue' : 'due-normal' }}"
                                >

                                    @if ($isOverdue)

                                        ⚠ Overdue:

                                    @else

                                        📅 Due:

                                    @endif

                                    {{ $task->due_date->format('M d, Y') }}

                                </span>

                            @else

                                <span>
                                    📅 No due date
                                </span>

                            @endif


                            <!-- CREATED DATE -->

                            <span>

                                Created:
                                {{ $task->created_at->format('M d, Y') }}

                            </span>


                            <!-- CATEGORY META -->

                            @if ($task->category)

                                <span>

                                    🏷
                                    {{ $task->category->name }}

                                </span>

                            @endif


                        </div>


                    </div>


                    <!-- ==================================================
                         TASK ACTIONS
                    ================================================== -->

                    <div class="task-actions">


                        <!-- VIEW -->

                        <a
                            href="{{ route('tasks.show', $task) }}"
                            class="btn btn-view"
                        >
                            View
                        </a>


                        <!-- TOGGLE -->

                        <form
                            action="{{ route('tasks.toggle', $task) }}"
                            method="POST"
                        >

                            @csrf

                            @method('PATCH')


                            @if ($task->completed)

                                <button
                                    type="submit"
                                    class="btn btn-warning"
                                >
                                    Mark Pending
                                </button>

                            @else

                                <button
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Complete
                                </button>

                            @endif

                        </form>


                        <!-- EDIT -->

                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="btn btn-primary"
                        >
                            Edit
                        </a>


                        <!-- DELETE -->

                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Delete
                            </button>

                        </form>


                    </div>


                </div>


            @endforeach


        </div>


        <!-- ======================================================
             PAGINATION
        ====================================================== -->

        @if ($tasks->hasPages())

            <div class="pagination-wrapper">

                {{ $tasks->links() }}

            </div>

        @endif


    @else


        <!-- ======================================================
             EMPTY STATE
        ====================================================== -->

        <div class="empty-state">


            <h3>
                No tasks found
            </h3>


            @if (
                request()->filled('search') ||
                request()->filled('status') ||
                request()->filled('priority') ||
                request()->filled('category') ||
                request()->filled('sort')
            )

                <p>
                    No tasks match your current search or filters.
                </p>


                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-secondary"
                >
                    Clear Filters
                </a>

            @else

                <p>
                    You don't have any tasks yet.
                    Create your first task above!
                </p>

            @endif


        </div>


    @endif


</div>


</body>

</html>
