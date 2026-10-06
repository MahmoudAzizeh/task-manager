<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Categories - Task Manager</title>


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
            max-width: 1200px;

            margin: 40px auto;

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
           CREATE FORM
        ========================================================= */

        .form-grid {
            display: grid;

            grid-template-columns:
                1fr 2fr auto;

            gap: 15px;

            align-items: end;
        }


        .form-group {
            margin-bottom: 0;
        }


        label {
            display: block;

            font-weight: bold;

            margin-bottom: 7px;

            font-size: 14px;
        }


        input,
        textarea {
            width: 100%;

            padding: 11px 13px;

            border:
                1px solid #d1d5db;

            border-radius: 8px;

            font-size: 14px;

            background: white;
        }


        textarea {
            min-height: 45px;

            resize: vertical;
        }


        input:focus,
        textarea:focus {
            outline: none;

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.10);
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .btn {
            display: inline-block;

            border: none;

            border-radius: 8px;

            padding: 10px 16px;

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


        .btn-view {
            background: #4f46e5;

            color: white;
        }


        .btn-view:hover {
            background: #4338ca;
        }


        /* =========================================================
           CATEGORY GRID
        ========================================================= */

        .category-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        .category-card {
            background: white;

            border-radius: 12px;

            padding: 24px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);

            border-left:
                5px solid #2563eb;
        }


        .category-name {
            margin: 0 0 8px;

            font-size: 22px;
        }


        .category-description {
            color: #6b7280;

            line-height: 1.6;

            min-height: 48px;

            margin-bottom: 18px;
        }


        .category-description.empty {
            font-style: italic;

            color: #9ca3af;
        }


        /* =========================================================
           CATEGORY META
        ========================================================= */

        .category-meta {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-top: 15px;

            border-top:
                1px solid #e5e7eb;

            margin-bottom: 18px;
        }


        .task-count {
            color: #6b7280;

            font-size: 14px;
        }


        .task-count strong {
            color: #111827;

            font-size: 18px;
        }


        /* =========================================================
           CATEGORY ACTIONS
        ========================================================= */

        .category-actions {
            display: flex;

            flex-wrap: wrap;

            gap: 8px;
        }


        .delete-form {
            margin: 0;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            background: white;

            border-radius: 12px;

            padding: 60px 30px;

            text-align: center;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);
        }


        .empty-state h2 {
            margin: 0 0 10px;
        }


        .empty-state p {
            color: #6b7280;

            margin-bottom: 25px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .category-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            nav {
                padding: 15px 20px;

                flex-direction: column;

                align-items: flex-start;
            }


            .nav-right {
                width: 100%;
            }


            .form-grid {
                grid-template-columns: 1fr;
            }


            .category-grid {
                grid-template-columns: 1fr;
            }


            .page-header {
                flex-direction: column;

                align-items: flex-start;
            }


            .card {
                padding: 20px;
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
     MAIN CONTAINER
============================================================ -->

<div class="container">


    <!-- ========================================================
         PAGE HEADER
    ======================================================== -->

    <div class="page-header">


        <div>

            <h1>

                Categories

            </h1>


            <p>

                Organize your tasks into categories.

            </p>

        </div>


        <a
            href="{{ route('tasks.index') }}"
            class="btn btn-secondary"
        >

            ← My Tasks

        </a>


    </div>


    <!-- ========================================================
         SUCCESS MESSAGE
    ======================================================== -->

    @if (session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <!-- ========================================================
         ERROR MESSAGES
    ======================================================== -->

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
         CREATE CATEGORY
    ======================================================== -->

    <div class="card">


        <h2>

            Create New Category

        </h2>


        <form
            action="{{ route('categories.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-grid">


                <!-- NAME -->

                <div class="form-group">

                    <label for="name">

                        Category Name

                    </label>


                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Work"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="description">

                        Description

                    </label>


                    <input
                        type="text"
                        id="description"
                        name="description"
                        value="{{ old('description') }}"
                        placeholder="Optional description"
                    >

                </div>


                <!-- BUTTON -->

                <div class="form-group">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        + Create Category

                    </button>

                </div>


            </div>


        </form>


    </div>


    <!-- ========================================================
         CATEGORIES
    ======================================================== -->

    @if ($categories->count())


        <div class="category-grid">


            @foreach ($categories as $category)


                <div class="category-card">


                    <!-- NAME -->

                    <h2 class="category-name">

                        {{ $category->name }}

                    </h2>


                    <!-- DESCRIPTION -->

                    @if ($category->description)

                        <div class="category-description">

                            {{ $category->description }}

                        </div>

                    @else

                        <div
                            class="category-description empty"
                        >

                            No description added.

                        </div>

                    @endif


                    <!-- META -->

                    <div class="category-meta">


                        <div class="task-count">

                            <strong>

                                {{ $category->tasks_count }}

                            </strong>

                            {{ $category->tasks_count === 1 ? 'Task' : 'Tasks' }}

                        </div>


                    </div>


                    <!-- ACTIONS -->

                    <div class="category-actions">


                        <!-- VIEW -->

                        <a
                            href="{{ route('categories.show', $category) }}"
                            class="btn btn-view"
                        >

                            View

                        </a>


                        <!-- EDIT -->

                        <a
                            href="{{ route('categories.edit', $category) }}"
                            class="btn btn-secondary"
                        >

                            Edit

                        </a>


                        <!-- DELETE -->

                        <form
                            action="{{ route('categories.destroy', $category) }}"
                            method="POST"
                            class="delete-form"
                            onsubmit="return confirm('Are you sure you want to delete this category? The category will be removed from its tasks.');"
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


        <!-- ====================================================
             EMPTY STATE
        ==================================================== -->

        <div class="empty-state">


            <h2>

                No Categories Yet

            </h2>


            <p>

                Create your first category to organize your tasks.

            </p>


            <a
                href="#name"
                class="btn btn-primary"
            >

                + Create Your First Category

            </a>


        </div>


    @endif


</div>


</body>

</html>
