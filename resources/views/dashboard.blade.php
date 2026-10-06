<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard - Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }


        /*
        |--------------------------------------------------------------------------
        | Navbar
        |--------------------------------------------------------------------------
        */

        .navbar {
            background: #111827;
            color: white;
            padding: 18px 35px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .nav-links .active {
            font-weight: bold;
            text-decoration: underline;
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        .logout-button {
            border: none;
            background: transparent;
            color: white;
            cursor: pointer;
            font-size: 15px;
            padding: 0;
        }

        .logout-button:hover {
            text-decoration: underline;
        }


        /*
        |--------------------------------------------------------------------------
        | Container
        |--------------------------------------------------------------------------
        */

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 25px 60px;
        }


        /*
        |--------------------------------------------------------------------------
        | Welcome
        |--------------------------------------------------------------------------
        */

        .welcome {
            margin-bottom: 35px;
        }

        .welcome h1 {
            margin: 0 0 10px;
            font-size: 36px;
            color: #111827;
        }

        .welcome p {
            margin: 0;
            color: #6b7280;
            font-size: 16px;
        }


        /*
        |--------------------------------------------------------------------------
        | Success Message
        |--------------------------------------------------------------------------
        */

        .success-message {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;

            padding: 14px 18px;
            border-radius: 10px;

            margin-bottom: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | Error Messages
        |--------------------------------------------------------------------------
        */

        .error-message {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;

            padding: 14px 18px;
            border-radius: 10px;

            margin-bottom: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;

            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);

            border: 1px solid #e5e7eb;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #111827;
        }

        .stat-description {
            margin-top: 8px;
            color: #9ca3af;
            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | Main Grid
        |--------------------------------------------------------------------------
        */

        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | Card
        |--------------------------------------------------------------------------
        */

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);

            border: 1px solid #e5e7eb;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .card-title {
            margin: 0;
            font-size: 21px;
            color: #111827;
        }


        /*
        |--------------------------------------------------------------------------
        | Buttons
        |--------------------------------------------------------------------------
        */

        .button {
            display: inline-block;

            border: none;
            border-radius: 9px;

            padding: 10px 16px;

            font-size: 14px;
            font-weight: bold;

            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            background: #2563eb;
            color: white;
        }

        .button-primary:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .button-secondary:hover {
            background: #d1d5db;
        }


        /*
        |--------------------------------------------------------------------------
        | Recent Tasks
        |--------------------------------------------------------------------------
        */

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 17px;

            border: 1px solid #e5e7eb;
            border-radius: 12px;

            background: #f9fafb;
        }

        .task-info {
            min-width: 0;
        }

        .task-title {
            margin: 0 0 6px;

            font-size: 16px;
            font-weight: bold;

            color: #111827;

            word-break: break-word;
        }

        .task-title.completed {
            text-decoration: line-through;
            color: #9ca3af;
        }

        .task-date {
            font-size: 13px;
            color: #6b7280;
        }

        .task-status {
            flex-shrink: 0;
            margin-left: 15px;
        }

        .badge {
            display: inline-block;

            padding: 6px 11px;

            border-radius: 999px;

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


        /*
        |--------------------------------------------------------------------------
        | Empty State
        |--------------------------------------------------------------------------
        */

        .empty-state {
            text-align: center;
            padding: 45px 20px;

            color: #6b7280;
        }

        .empty-state h3 {
            margin: 0 0 8px;

            color: #374151;
        }

        .empty-state p {
            margin: 0 0 20px;
        }


        /*
        |--------------------------------------------------------------------------
        | Quick Actions
        |--------------------------------------------------------------------------
        */

        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .quick-action {
            display: block;

            padding: 15px;

            border: 1px solid #e5e7eb;
            border-radius: 12px;

            color: #111827;
            text-decoration: none;

            background: #f9fafb;
        }

        .quick-action:hover {
            background: #f3f4f6;
        }

        .quick-action-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .quick-action-description {
            color: #6b7280;
            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | Progress
        |--------------------------------------------------------------------------
        */

        .progress-section {
            margin-top: 30px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;

            margin-bottom: 10px;

            font-size: 14px;
        }

        .progress-label {
            color: #374151;
            font-weight: bold;
        }

        .progress-percentage {
            color: #6b7280;
        }

        .progress-bar {
            width: 100%;
            height: 10px;

            background: #e5e7eb;

            border-radius: 999px;

            overflow: hidden;
        }

        .progress-fill {
            height: 100%;

            background: #2563eb;

            border-radius: 999px;

            transition: width 0.3s ease;
        }


        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        .footer {
            text-align: center;

            margin-top: 50px;

            color: #9ca3af;

            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .nav-links {
                flex-wrap: wrap;
                gap: 15px;
            }

            .container {
                padding: 30px 15px 50px;
            }

            .welcome h1 {
                font-size: 30px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .task-item {
                align-items: flex-start;
                gap: 12px;
            }

            .task-status {
                margin-left: 0;
            }

            .card {
                padding: 20px;
            }
        }

    </style>

</head>


<body>


    <!-- ========================================================= -->
    <!-- NAVBAR -->
    <!-- ========================================================= -->

    <nav class="navbar">

        <div class="logo">
            Task Manager
        </div>


        <div class="nav-links">

            <a
                href="{{ route('dashboard') }}"
                class="active"
            >
                Dashboard
            </a>


            <a href="{{ route('tasks.index') }}">
                My Tasks
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



    <!-- ========================================================= -->
    <!-- MAIN CONTAINER -->
    <!-- ========================================================= -->

    <main class="container">


        <!-- ===================================================== -->
        <!-- WELCOME -->
        <!-- ===================================================== -->

        <section class="welcome">

            <h1>
                Welcome, {{ $user->name }} 👋
            </h1>

            <p>
                Here's an overview of your tasks and productivity.
            </p>

        </section>



        <!-- ===================================================== -->
        <!-- SUCCESS MESSAGE -->
        <!-- ===================================================== -->

        @if(session('success'))

            <div class="success-message">

                {{ session('success') }}

            </div>

        @endif



        <!-- ===================================================== -->
        <!-- ERROR MESSAGE -->
        <!-- ===================================================== -->

        @if(session('error'))

            <div class="error-message">

                {{ session('error') }}

            </div>

        @endif



        <!-- ===================================================== -->
        <!-- VALIDATION ERRORS -->
        <!-- ===================================================== -->

        @if($errors->any())

            <div class="error-message">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- ===================================================== -->
        <!-- STATISTICS -->
        <!-- ===================================================== -->

        <section class="stats-grid">


            <!-- Total -->

            <div class="stat-card">

                <div class="stat-label">
                    Total Tasks
                </div>

                <div class="stat-number">
                    {{ $totalTasks }}
                </div>

                <div class="stat-description">
                    All your tasks
                </div>

            </div>


            <!-- Completed -->

            <div class="stat-card">

                <div class="stat-label">
                    Completed
                </div>

                <div class="stat-number">
                    {{ $completedTasks }}
                </div>

                <div class="stat-description">
                    Finished tasks
                </div>

            </div>


            <!-- Pending -->

            <div class="stat-card">

                <div class="stat-label">
                    Pending
                </div>

                <div class="stat-number">
                    {{ $pendingTasks }}
                </div>

                <div class="stat-description">
                    Tasks still to do
                </div>

            </div>


            <!-- High Priority -->

            <div class="stat-card">

                <div class="stat-label">
                    High Priority
                </div>

                <div class="stat-number">
                    {{ $highPriorityTasks }}
                </div>

                <div class="stat-description">
                    Important pending tasks
                </div>

            </div>

        </section>



        <!-- ===================================================== -->
        <!-- MAIN CONTENT -->
        <!-- ===================================================== -->

        <section class="main-grid">


            <!-- ================================================= -->
            <!-- RECENT TASKS -->
            <!-- ================================================= -->

            <div class="card">

                <div class="card-header">

                    <h2 class="card-title">
                        Recent Tasks
                    </h2>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="button button-primary"
                    >
                        View All
                    </a>

                </div>


                @if($recentTasks->count() > 0)

                    <div class="task-list">

                        @foreach($recentTasks as $task)

                            <div class="task-item">


                                <div class="task-info">

                                    <h3
                                        class="task-title {{ $task->completed ? 'completed' : '' }}"
                                    >
                                        {{ $task->title }}
                                    </h3>


                                    <div class="task-date">

                                        Created:
                                        {{ $task->created_at->format('M d, Y') }}

                                        @if($task->due_date)

                                            <br>

                                            Due:
                                            {{ $task->due_date->format('M d, Y') }}

                                        @endif

                                    </div>

                                </div>


                                <div class="task-status">

                                    @if($task->completed)

                                        <span class="badge badge-completed">
                                            Completed
                                        </span>

                                    @else

                                        <span class="badge badge-pending">
                                            Pending
                                        </span>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">

                        <h3>
                            No tasks yet
                        </h3>

                        <p>
                            You haven't created any tasks.
                        </p>

                        <a
                            href="{{ route('tasks.index') }}"
                            class="button button-primary"
                        >
                            Create Your First Task
                        </a>

                    </div>

                @endif

            </div>



            <!-- ================================================= -->
            <!-- QUICK ACTIONS -->
            <!-- ================================================= -->

            <div class="card">

                <div class="card-header">

                    <h2 class="card-title">
                        Quick Actions
                    </h2>

                </div>


                <div class="quick-actions">


                    <a
                        href="{{ route('tasks.index') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-title">
                            📝 Manage Tasks
                        </div>

                        <div class="quick-action-description">
                            Create, edit and organize your tasks.
                        </div>

                    </a>


                    <a
                        href="{{ route('tasks.index') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-title">
                            🔎 Search Tasks
                        </div>

                        <div class="quick-action-description">
                            Find a task quickly using search and filters.
                        </div>

                    </a>


                    <a
                        href="{{ route('profile.edit') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-title">
                            👤 Edit Profile
                        </div>

                        <div class="quick-action-description">
                            Update your name, email or password.
                        </div>

                    </a>


                </div>



                <!-- ============================================= -->
                <!-- PRODUCTIVITY -->
                <!-- ============================================= -->

                <div class="progress-section">

                    @php

                        $completionPercentage = $totalTasks > 0
                            ? round(($completedTasks / $totalTasks) * 100)
                            : 0;

                    @endphp


                    <div class="progress-header">

                        <span class="progress-label">
                            Task Completion
                        </span>

                        <span class="progress-percentage">
                            {{ $completionPercentage }}%
                        </span>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            style="width: {{ $completionPercentage }}%;"
                        ></div>

                    </div>

                </div>

            </div>

        </section>



        <!-- ===================================================== -->
        <!-- FOOTER -->
        <!-- ===================================================== -->

        <div class="footer">

            Task Manager &copy; {{ date('Y') }}

        </div>


    </main>


</body>

</html>
