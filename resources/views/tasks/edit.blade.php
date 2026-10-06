<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Task - Task Manager</title>

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
           CONTAINER
        ========================================================= */

        .container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .page-header {
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
        }


        /* =========================================================
           ALERTS
        ========================================================= */

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
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
           FORM
        ========================================================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        label {
            display: block;

            font-weight: bold;

            margin-bottom: 8px;

            font-size: 14px;
        }

        input,
        textarea,
        select {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            font-size: 15px;

            background: white;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        /* =========================================================
           CURRENT CATEGORY
        ========================================================= */

        .current-category {
            margin-top: 8px;
            font-size: 13px;
            color: #6b7280;
        }


        /* =========================================================
           CHECKBOX
        ========================================================= */

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-wrapper input {
            width: auto;
        }

        .checkbox-wrapper label {
            margin: 0;
            cursor: pointer;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .actions {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-top: 25px;

            padding-top: 25px;

            border-top: 1px solid #e5e7eb;
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

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }


        /* =========================================================
           TASK INFO
        ========================================================= */

        .task-info {
            background: #f9fafb;

            border: 1px solid #e5e7eb;

            border-radius: 8px;

            padding: 15px;

            margin-bottom: 25px;

            color: #6b7280;

            font-size: 13px;
        }

        .task-info strong {
            color: #374151;
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

            .form-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions .btn {
                width: 100%;
                text-align: center;
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
     MAIN CONTAINER
============================================================ -->

<div class="container">


    <!-- ========================================================
         PAGE HEADER
    ========================================================= -->

    <div class="page-header">

        <h1>
            Edit Task
        </h1>

        <p>
            Update your task information.
        </p>

    </div>


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
         EDIT CARD
    ======================================================== -->

    <div class="card">


        <!-- TASK INFORMATION -->

        <div class="task-info">

            <strong>Task ID:</strong>
            #{{ $task->id }}

            &nbsp;&nbsp; | &nbsp;&nbsp;

            <strong>Created:</strong>
            {{ $task->created_at->format('M d, Y H:i') }}

        </div>


        <!-- ====================================================
             FORM
        ==================================================== -->

        <form
            action="{{ route('tasks.update', $task) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- =================================================
                 TITLE
            ================================================= -->

            <div class="form-group">

                <label for="title">
                    Task Title
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $task->title) }}"
                    placeholder="Enter task title"
                    required
                >

            </div>


            <!-- =================================================
                 DESCRIPTION
            ================================================= -->

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description..."
                >{{ old('description', $task->description) }}</textarea>

            </div>


            <!-- =================================================
                 CATEGORY + PRIORITY
            ================================================= -->

            <div class="form-row">


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
                                {{ (string) old('category_id', $task->category_id) === (string) $category->id ? 'selected' : '' }}
                            >

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>


                    @if ($task->category)

                        <div class="current-category">

                            Current category:
                            <strong>
                                {{ $task->category->name }}
                            </strong>

                        </div>

                    @endif

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
                            {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}
                        >
                            Low
                        </option>


                        <option
                            value="medium"
                            {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}
                        >
                            Medium
                        </option>


                        <option
                            value="high"
                            {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}
                        >
                            High
                        </option>

                    </select>

                </div>


            </div>


            <!-- =================================================
                 DUE DATE
            ================================================= -->

            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}"
                >

            </div>


            <!-- =================================================
                 COMPLETED
            ================================================= -->

            <div class="form-group">

                <div class="checkbox-wrapper">

                    <input
                        type="checkbox"
                        id="completed"
                        name="completed"
                        value="1"
                        {{ old('completed', $task->completed) ? 'checked' : '' }}
                    >

                    <label for="completed">
                        Mark this task as completed
                    </label>

                </div>

            </div>


            <!-- =================================================
                 ACTIONS
            ================================================= -->

            <div class="actions">


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Changes
                </button>


                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>


            </div>


        </form>


    </div>


</div>


</body>

</html>
