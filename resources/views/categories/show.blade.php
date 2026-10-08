<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $category->name }} - Task Manager
    </title>

    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

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
           CONTAINER
        ========================================================= */

        .container {

            max-width: 950px;

            margin: 45px auto;

            padding: 0 20px;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
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
           CARD
        ========================================================= */

        .card {

            background: white;

            border-radius: 12px;

            padding: 30px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);

            margin-bottom: 25px;
        }


        /* =========================================================
           CATEGORY HEADER
        ========================================================= */

        .category-header {

            display: flex;

            align-items: center;

            gap: 18px;

            margin-bottom: 25px;
        }


        .category-color {

            width: 60px;

            height: 60px;

            border-radius: 12px;

            flex-shrink: 0;
        }


        .category-name {

            margin: 0;

            font-size: 32px;
        }


        .category-color-text {

            margin-top: 7px;

            color: #6b7280;

            font-size: 14px;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .category-status {

            display: inline-block;

            padding: 7px 13px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: bold;

            background: #eef2ff;

            color: #3730a3;
        }


        /* =========================================================
           INFO GRID
        ========================================================= */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 18px;

            margin-top: 25px;
        }


        .info-item {

            background: #f9fafb;

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            padding: 18px;
        }


        .info-label {

            color: #6b7280;

            font-size: 13px;

            margin-bottom: 7px;
        }


        .info-value {

            font-size: 16px;

            font-weight: bold;
        }


        /* =========================================================
           SECTION
        ========================================================= */

        .section-title {

            margin-top: 0;

            margin-bottom: 18px;

            font-size: 22px;
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


        .task-card.completed {

            border-left-color: #16a34a;
        }


        .task-card.overdue {

            border-left-color: #dc2626;
        }


        .task-main {

            flex: 1;

            min-width: 0;
        }


        .task-title {

            margin: 0 0 10px;

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

            white-space: pre-line;
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


        .badge-high {

            background: #fee2e2;

            color: #991b1b;
        }


        .badge-medium {

            background: #fef3c7;

            color: #92400e;
        }


        .badge-low {

            background: #dcfce7;

            color: #166534;
        }


        .badge-overdue {

            background: #fee2e2;

            color: #991b1b;
        }


        .badge-category {

            color: white;
        }


        /* =========================================================
           META
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
           ACTIONS
        ========================================================= */

        .actions {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 25px;

            padding-top: 25px;

            border-top:
                1px solid #e5e7eb;
        }


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


        .btn {

            display: inline-block;

            border: none;

            border-radius: 8px;

            padding: 11px 18px;

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


        .btn-danger {

            background: #dc2626;

            color: white;
        }


        .btn-danger:hover {

            background: #b91c1b;
        }


        .btn-secondary {

            background: #6b7280;

            color: white;
        }


        .btn-secondary:hover {

            background: #4b5563;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {

            text-align: center;

            padding: 45px 20px;
        }


        .empty-state h3 {

            margin-top: 0;

            font-size: 22px;
        }


        .empty-state p {

            color: #6b7280;

            margin-bottom: 20px;
        }


        /* =========================================================
           DELETE FORM
        ========================================================= */

        .delete-form {

            margin: 0;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 650px) {


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


            .category-header {

                align-items: flex-start;
            }


            .info-grid {

                grid-template-columns: 1fr;
            }


            .card {

                padding: 20px;
            }


            .category-name {

                font-size: 27px;
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


            .actions {

                flex-direction: column;

                align-items: stretch;
            }


            .actions .btn {

                width: 100%;
            }


            .delete-form {

                width: 100%;
            }


            .delete-form button {

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

            Hello,
            {{ auth()->user()->name }}

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

                Category Details

            </h1>


            <p>

                View all information and tasks in this category.

            </p>

        </div>


        <a
            href="{{ route('categories.index') }}"
            class="btn btn-secondary"
        >

            ← Back to Categories

        </a>


    </div>


    <!-- ========================================================
         CATEGORY CARD
    ========================================================= -->

    <div class="card">


        <div class="category-header">


            <div
                class="category-color"
                style="
                    background-color:
                    {{ $category->color ?? '#6b7280' }};
                "
            >
            </div>


            <div>


                <h2 class="category-name">

                    {{ $category->name }}

                </h2>


                <div class="category-color-text">

                    Color:
                    {{ $category->color ?? '#6b7280' }}

                </div>


            </div>


        </div>


        <span class="category-status">

            {{ $category->tasks->count() }}

            {{ $category->tasks->count() === 1 ? 'Task' : 'Tasks' }}

        </span>


        <!-- ====================================================
             INFORMATION
        ==================================================== -->

        <div class="info-grid">


            <!-- CATEGORY ID -->

            <div class="info-item">


                <div class="info-label">

                    Category ID

                </div>


                <div class="info-value">

                    #{{ $category->id }}

                </div>


            </div>


            <!-- TASK COUNT -->

            <div class="info-item">


                <div class="info-label">

                    Total Tasks

                </div>


                <div class="info-value">

                    {{ $category->tasks->count() }}

                </div>


            </div>


            <!-- CREATED -->

            <div class="info-item">


                <div class="info-label">

                    Created

                </div>


                <div class="info-value">

                    {{ $category->created_at->format('M d, Y H:i') }}

                </div>


            </div>


            <!-- UPDATED -->

            <div class="info-item">


                <div class="info-label">

                    Last Updated

                </div>


                <div class="info-value">

                    {{ $category->updated_at->format('M d, Y H:i') }}

                </div>


            </div>


        </div>


        <!-- ====================================================
             CATEGORY ACTIONS
        ==================================================== -->

        <div class="actions">


            <a
                href="{{ route('categories.edit', $category) }}"
                class="btn btn-primary"
            >

                Edit Category

            </a>


            <form
                action="{{ route('categories.destroy', $category) }}"
                method="POST"
                class="delete-form"
                onsubmit="
                    return confirm(
                        'Are you sure you want to delete this category?'
                    );
                "
            >

                @csrf

                @method('DELETE')


                <button
                    type="submit"
                    class="btn btn-danger"
                >

                    Delete Category

                </button>

            </form>


        </div>


    </div>


    <!-- ========================================================
         TASKS
    ========================================================= -->

    <div class="card">


        <div class="tasks-header">


            <h2 class="section-title">

                Tasks in this category

            </h2>


            <span class="task-count">

                {{ $category->tasks->count() }}

                {{ $category->tasks->count() === 1 ? 'task' : 'tasks' }}

            </span>


        </div>


        @if ($category->tasks->count() > 0)


            <div class="task-list">


                @foreach ($category->tasks as $task)


                    @php

                        $isOverdue =
                            !$task->completed &&
                            $task->due_date &&
                            $task->due_date->isPast();

                    @endphp


                    <div
                        class="task-card

                        {{ $task->completed ? 'completed' : '' }}

                        {{ $isOverdue ? 'overdue' : '' }}"
                    >


                        <!-- TASK INFORMATION -->

                        <div class="task-main">


                            <h3
                                class="task-title

                                {{ $task->completed
                                    ? 'completed-title'
                                    : ''
                                }}"
                            >

                                {{ $task->title }}

                            </h3>


                            <!-- BADGES -->

                            <div class="badges">


                                @if ($task->completed)

                                    <span
                                        class="badge badge-completed"
                                    >

                                        ✓ Completed

                                    </span>

                                @else

                                    <span
                                        class="badge badge-pending"
                                    >

                                        Pending

                                    </span>

                                @endif


                                @if ($task->priority)

                                    <span
                                        class="
                                            badge
                                            badge-{{ $task->priority }}
                                        "
                                    >

                                        {{ ucfirst($task->priority) }}

                                        Priority

                                    </span>

                                @endif


                                <span
                                    class="badge badge-category"
                                    style="
                                        background-color:
                                        {{ $category->color ?? '#6b7280' }};
                                    "
                                >

                                    🏷

                                    {{ $category->name }}

                                </span>


                                @if ($isOverdue)

                                    <span
                                        class="badge badge-overdue"
                                    >

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


                            <!-- META -->

                            <div class="task-meta">


                                @if ($task->due_date)

                                    <span
                                        class="
                                            {{
                                                $isOverdue
                                                    ? 'due-overdue'
                                                    : 'due-normal'
                                            }}
                                        "
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


                                <span>

                                    Created:

                                    {{ $task->created_at->format('M d, Y') }}

                                </span>


                            </div>


                        </div>


                        <!-- TASK ACTIONS -->

                        <div class="task-actions">


                            <!-- VIEW -->

                            <a
                                href="{{ route('tasks.show', $task) }}"
                                class="btn btn-secondary"
                            >

                                View

                            </a>


                            <!-- COMPLETE / PENDING -->

                            <form
                                action="{{ route('tasks.toggle', $task) }}"
                                method="POST"
                            >

                                @csrf

                                @method('PATCH')


                                @if ($task->completed)

                                    <button
                                        type="submit"
                                        class="btn btn-secondary"
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
                                onsubmit="
                                    return confirm(
                                        'Are you sure you want to delete this task?'
                                    );
                                "
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


        @else


            <!-- EMPTY -->

            <div class="empty-state">


                <h3>

                    No tasks in this category

                </h3>


                <p>

                    You don't have any tasks assigned to

                    <strong>
                        {{ $category->name }}
                    </strong>

                    yet.

                </p>


                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-primary"
                >

                    + Create Task

                </a>


            </div>


        @endif


    </div>


</div>


</body>

</html>
