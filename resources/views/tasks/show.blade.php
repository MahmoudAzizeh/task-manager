<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $task->title }} - Task Manager
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
           HEADER
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
           TASK TITLE
        ========================================================= */

        .task-title {

            margin: 0 0 15px;

            font-size: 32px;
        }


        .task-title.completed {

            text-decoration: line-through;

            color: #6b7280;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status {

            display: inline-block;

            padding: 7px 13px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: bold;

            margin-bottom: 25px;
        }


        .status.completed {

            background: #dcfce7;

            color: #166534;
        }


        .status.pending {

            background: #fef3c7;

            color: #92400e;
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
           PRIORITY
        ========================================================= */

        .priority {

            display: inline-block;

            padding: 6px 11px;

            border-radius: 6px;

            font-size: 13px;

            font-weight: bold;
        }


        .priority-high {

            background: #fee2e2;

            color: #991b1b;
        }


        .priority-medium {

            background: #fef3c7;

            color: #92400e;
        }


        .priority-low {

            background: #dcfce7;

            color: #166534;
        }


        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .section-title {

            margin-top: 0;

            margin-bottom: 12px;

            font-size: 20px;
        }


        .description {

            color: #4b5563;

            line-height: 1.7;

            white-space: pre-line;
        }


        .no-description {

            color: #9ca3af;

            font-style: italic;
        }


        /* =========================================================
           CATEGORY
        ========================================================= */

        .category {

            display: inline-block;

            padding: 7px 12px;

            background: #eef2ff;

            color: #3730a3;

            border-radius: 7px;

            font-size: 14px;

            font-weight: bold;
        }


        .no-category {

            color: #9ca3af;

            font-style: italic;
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


        .btn {

            display: inline-block;

            border: none;

            border-radius: 8px;

            padding: 11px 18px;

            cursor: pointer;

            text-decoration: none;

            font-size: 14px;

            font-weight: bold;
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

            background: #b91c1c;
        }


        .btn-secondary {

            background: #6b7280;

            color: white;
        }


        .btn-secondary:hover {

            background: #4b5563;
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


            .info-grid {

                grid-template-columns: 1fr;
            }


            .card {

                padding: 20px;
            }


            .task-title {

                font-size: 27px;
            }


            .actions {

                flex-direction: column;

                align-items: stretch;
            }


            .actions .btn {

                width: 100%;

                text-align: center;
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

                Task Details

            </h1>


            <p>

                View all information about this task.

            </p>

        </div>


        <a
            href="{{ route('tasks.index') }}"
            class="btn btn-secondary"
        >

            ← Back to Tasks

        </a>


    </div>


    <!-- ========================================================
         MAIN TASK CARD
    ======================================================== -->

    <div class="card">


        <!-- TASK TITLE -->

        <h2
            class="task-title
            {{ $task->completed ? 'completed' : '' }}"
        >

            {{ $task->title }}

        </h2>


        <!-- STATUS -->

        @if ($task->completed)

            <span class="status completed">

                ✓ Completed

            </span>

        @else

            <span class="status pending">

                ● Pending

            </span>

        @endif


        <!-- ====================================================
             DESCRIPTION
        ==================================================== -->

        <h3 class="section-title">

            Description

        </h3>


        @if ($task->description)

            <div class="description">

                {{ $task->description }}

            </div>

        @else

            <div class="no-description">

                No description added.

            </div>

        @endif


        <!-- ====================================================
             INFORMATION
        ==================================================== -->

        <div class="info-grid">


            <!-- PRIORITY -->

            <div class="info-item">

                <div class="info-label">

                    Priority

                </div>


                <div class="info-value">


                    @if ($task->priority === 'high')

                        <span class="priority priority-high">

                            High

                        </span>

                    @elseif ($task->priority === 'low')

                        <span class="priority priority-low">

                            Low

                        </span>

                    @else

                        <span class="priority priority-medium">

                            Medium

                        </span>

                    @endif


                </div>

            </div>


            <!-- CATEGORY -->

            <div class="info-item">

                <div class="info-label">

                    Category

                </div>


                <div class="info-value">


                    @if ($task->category)

                        <span class="category">

                            {{ $task->category->name }}

                        </span>

                    @else

                        <span class="no-category">

                            No Category

                        </span>

                    @endif


                </div>

            </div>


            <!-- DUE DATE -->

            <div class="info-item">

                <div class="info-label">

                    Due Date

                </div>


                <div class="info-value">


                    @if ($task->due_date)

                        {{ $task->due_date->format('M d, Y') }}

                    @else

                        <span class="no-category">

                            No due date

                        </span>

                    @endif


                </div>

            </div>


            <!-- CREATED -->

            <div class="info-item">

                <div class="info-label">

                    Created

                </div>


                <div class="info-value">

                    {{ $task->created_at->format('M d, Y H:i') }}

                </div>

            </div>


            <!-- UPDATED -->

            <div class="info-item">

                <div class="info-label">

                    Last Updated

                </div>


                <div class="info-value">

                    {{ $task->updated_at->format('M d, Y H:i') }}

                </div>

            </div>


            <!-- TASK ID -->

            <div class="info-item">

                <div class="info-label">

                    Task ID

                </div>


                <div class="info-value">

                    #{{ $task->id }}

                </div>

            </div>


        </div>


        <!-- ====================================================
             ACTIONS
        ==================================================== -->

        <div class="actions">


            <!-- EDIT -->

            <a
                href="{{ route('tasks.edit', $task) }}"
                class="btn btn-primary"
            >

                Edit Task

            </a>


            <!-- TOGGLE -->

            <form
                action="{{ route('tasks.toggle', $task) }}"
                method="POST"
            >

                @csrf

                @method('PATCH')


                <button
                    type="submit"
                    class="btn btn-success"
                >

                    @if ($task->completed)

                        Mark as Pending

                    @else

                        Mark as Completed

                    @endif

                </button>

            </form>


            <!-- DELETE -->

            <form
                action="{{ route('tasks.destroy', $task) }}"
                method="POST"
                class="delete-form"
                onsubmit="return confirm('Are you sure you want to delete this task?');"
            >

                @csrf

                @method('DELETE')


                <button
                    type="submit"
                    class="btn btn-danger"
                >

                    Delete Task

                </button>

            </form>


        </div>


    </div>


</div>


</body>

</html>
