<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Tasks - Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .welcome {
            margin: 0;
            color: #666;
        }

        .logout-button {
            display: block !important;
            background: #dc3545 !important;
            color: white !important;
            border: none;
            padding: 12px 22px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            min-width: 90px;
        }

        .logout-button:hover {
            background: #bb2d3b !important;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat {
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #777;
            font-size: 14px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .add-form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .add-form input,
        .add-form textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .add-form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .add-button {
            background: #198754;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
            width: fit-content;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        .search-button {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
        }

        .clear-button {
            background: #6c757d;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
        }

        .filter-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .filter-form select {
            flex: 1;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
            background: white;
        }

        .filter-button {
            background: #6f42c1;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
        }

        .task {
            border: 1px solid #ddd;
            padding: 18px;
            border-radius: 9px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .task-title {
            font-size: 17px;
            font-weight: bold;
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }

        .task-description {
            margin-top: 8px;
            color: #666;
            line-height: 1.5;
        }

        .status {
            font-size: 13px;
            margin-top: 6px;
            color: #777;
        }

        .task-actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .task-actions form {
            margin: 0;
        }

        .button {
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            display: inline-block;
        }

        .toggle-button {
            background: #ffc107;
            color: #212529;
        }

        .edit-button {
            background: #0dcaf0;
            color: #000;
        }

        .delete-button {
            background: #dc3545;
            color: white;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        @media (max-width: 700px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .statistics {
                grid-template-columns: 1fr;
            }

            .search-form,
            .filter-form {
                flex-direction: column;
            }

            .task {
                flex-direction: column;
                align-items: flex-start;
            }

            .task-actions {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>My Tasks</h1>

            <p class="welcome">
                Welcome, {{ auth()->user()->name }}!
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </div>


    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    @if ($errors->any())
        <div class="error">

            <ul style="margin: 0; padding-left: 20px;">

                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach

            </ul>

        </div>
    @endif


    <div class="statistics">

        <div class="stat">
            <div class="stat-number">
                {{ $total }}
            </div>

            <div class="stat-label">
                Total Tasks
            </div>
        </div>


        <div class="stat">
            <div class="stat-number">
                {{ $pending }}
            </div>

            <div class="stat-label">
                Pending
            </div>
        </div>


        <div class="stat">
            <div class="stat-number">
                {{ $completed }}
            </div>

            <div class="stat-label">
                Completed
            </div>
        </div>

    </div>


    <div class="card">

        <h2>Add New Task</h2>

        <form
            action="{{ route('tasks.store') }}"
            method="POST"
            class="add-form"
        >

            @csrf

            <input
                type="text"
                name="title"
                placeholder="Enter a new task..."
                value="{{ old('title') }}"
                required
            >

            <textarea
                name="description"
                placeholder="Enter task description (optional)..."
            >{{ old('description') }}</textarea>

            <button type="submit" class="add-button">
                Add Task
            </button>

        </form>

    </div>


    <div class="card">

        <h2>Search Tasks</h2>

        <form
            action="{{ route('tasks.index') }}"
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                placeholder="Search by title or description..."
                value="{{ $search }}"
            >

            <button type="submit" class="search-button">
                Search
            </button>

            @if ($search)

                <a
                    href="{{ route('tasks.index') }}"
                    class="clear-button"
                >
                    Clear
                </a>

            @endif

        </form>


        <form
            action="{{ route('tasks.index') }}"
            method="GET"
            class="filter-form"
        >

            <input
                type="hidden"
                name="search"
                value="{{ $search }}"
            >

            <select name="filter">

                <option
                    value="all"
                    {{ $filter === 'all' ? 'selected' : '' }}
                >
                    All Tasks
                </option>

                <option
                    value="pending"
                    {{ $filter === 'pending' ? 'selected' : '' }}
                >
                    Pending
                </option>

                <option
                    value="completed"
                    {{ $filter === 'completed' ? 'selected' : '' }}
                >
                    Completed
                </option>

            </select>

            <button type="submit" class="filter-button">
                Apply Filter
            </button>

        </form>

    </div>


    <div class="card">

        <h2>Your Tasks</h2>

        @forelse ($tasks as $task)

            <div class="task">

                <div>

                    <div class="task-title {{ $task->completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </div>

                    @if ($task->description)

                        <div class="task-description">
                            {{ $task->description }}
                        </div>

                    @endif

                    <div class="status">

                        @if ($task->completed)
                            Completed
                        @else
                            Pending
                        @endif

                    </div>

                </div>


                <div class="task-actions">

                    <form
                        action="{{ route('tasks.toggle', $task) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="button toggle-button"
                        >

                            @if ($task->completed)
                                Mark Pending
                            @else
                                Complete
                            @endif

                        </button>

                    </form>


                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="button edit-button"
                    >
                        Edit
                    </a>


                    <form
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this task?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="button delete-button"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="empty">

                @if ($search)

                    No tasks found for
                    "<strong>{{ $search }}</strong>".

                @elseif ($filter === 'pending')

                    No pending tasks.

                @elseif ($filter === 'completed')

                    No completed tasks.

                @else

                    No tasks yet. Add your first task!

                @endif

            </div>

        @endforelse

    </div>

</div>

</body>
</html>