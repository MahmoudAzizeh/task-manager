<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Category - Task Manager</title>

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

        /* NAVBAR */

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


        /* CONTAINER */

        .container {
            max-width: 700px;
            margin: 45px auto;
            padding: 0 20px;
        }


        /* BACK */

        .back-link {
            display: inline-block;
            margin-bottom: 20px;

            color: #2563eb;
            text-decoration: none;

            font-size: 14px;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }


        /* CARD */

        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;

            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .card h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .card-description {
            margin: 0 0 28px;
            color: #6b7280;
        }


        /* ALERT */

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;

            padding: 14px 18px;
            border-radius: 8px;

            margin-bottom: 20px;
        }

        .alert-error ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }


        /* FORM */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;

            font-weight: bold;
            font-size: 14px;

            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 15px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #2563eb;
        }


        /* COLOR */

        .color-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        input[type="color"] {
            width: 60px;
            height: 45px;

            padding: 3px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            cursor: pointer;
            background: white;
        }

        .color-value {
            color: #6b7280;
            font-size: 14px;
            font-family: monospace;
        }


        /* BUTTONS */

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;

            border: none;
            border-radius: 8px;

            padding: 12px 18px;

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


        /* RESPONSIVE */

        @media (max-width: 700px) {

            nav {
                padding: 18px 20px;

                flex-direction: column;
                align-items: flex-start;
            }

            .nav-right {
                flex-wrap: wrap;
                gap: 14px;
            }

            .container {
                margin: 30px auto;
                padding: 0 15px;
            }

            .card {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                text-align: center;
            }

        }

    </style>

</head>

<body>


    {{-- NAVBAR --}}

    <nav>

        <div class="logo">
            Task Manager
        </div>

        <div class="nav-right">

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


    {{-- MAIN --}}

    <main class="container">


        <a
            href="{{ route('categories.index') }}"
            class="back-link"
        >
            ← Back to Categories
        </a>


        <div class="card">

            <h1>
                Edit Category
            </h1>

            <p class="card-description">
                Update the name and color of this category.
            </p>


            {{-- ERRORS --}}

            @if($errors->any())

                <div class="alert-error">

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


            {{-- FORM --}}

            <form
                action="{{ route('categories.update', $category) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- NAME --}}

                <div class="form-group">

                    <label for="name">
                        Category Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        maxlength="100"
                        required
                    >

                </div>


                {{-- COLOR --}}

                <div class="form-group">

                    <label for="color">
                        Category Color
                    </label>

                    <div class="color-row">

                        <input
                            type="color"
                            id="color"
                            name="color"
                            value="{{ old('color', $category->color) }}"
                            required
                        >

                        <span
                            id="colorValue"
                            class="color-value"
                        >
                            {{ old('color', $category->color) }}
                        </span>

                    </div>

                </div>


                {{-- ACTIONS --}}

                <div class="actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Save Changes
                    </button>

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>


    {{-- JAVASCRIPT --}}

    <script>

        const colorInput = document.getElementById('color');

        const colorValue = document.getElementById('colorValue');

        if (colorInput && colorValue) {

            colorInput.addEventListener('input', function () {

                colorValue.textContent = this.value;

            });

        }

    </script>

</body>

</html>
