<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Change Password - Task Manager</title>

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

        /*
        |--------------------------------------------------------------------------
        | NAVBAR
        |--------------------------------------------------------------------------
        */

        nav {
            background: #111827;
            color: white;
            padding: 18px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .user-name {
            color: #d1d5db;
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
        }

        .logout-button:hover {
            text-decoration: underline;
        }


        /*
        |--------------------------------------------------------------------------
        | CONTAINER
        |--------------------------------------------------------------------------
        */

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 36px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
        }


        /*
        |--------------------------------------------------------------------------
        | CARD
        |--------------------------------------------------------------------------
        */

        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .card-description {
            color: #6b7280;
            margin-bottom: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | ALERTS
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | FORM
        |--------------------------------------------------------------------------
        */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 14px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 15px;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .input-help {
            margin-top: 6px;
            color: #6b7280;
            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | BUTTONS
        |--------------------------------------------------------------------------
        */

        .actions {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 10px;
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


        /*
        |--------------------------------------------------------------------------
        | RESPONSIVE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 700px) {

            nav {
                padding: 16px 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-right {
                flex-wrap: wrap;
            }

            .container {
                margin: 30px auto;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .card {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                text-align: center;
            }
        }

    </style>

</head>


<body>


    {{-- =========================================================
         NAVBAR
    ========================================================== --}}

    <nav>

        <div class="logo">
            Task Manager
        </div>

        <div class="nav-right">

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('tasks.index') }}">
                Tasks
            </a>

            <a href="{{ route('categories.index') }}">
                Categories
            </a>

            <a href="{{ route('profile.edit') }}">
                Profile
            </a>

            @auth

                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>

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

            @endauth

        </div>

    </nav>


    {{-- =========================================================
         MAIN
    ========================================================== --}}

    <main class="container">


        <div class="page-header">

            <h1>
                Change Password
            </h1>

            <p>
                Update your account password.
            </p>

        </div>


        {{-- =====================================================
             SUCCESS MESSAGE
        ====================================================== --}}

        @if (session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- =====================================================
             VALIDATION ERRORS
        ====================================================== --}}

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


        {{-- =====================================================
             PASSWORD FORM
        ====================================================== --}}

        <div class="card">

            <h2>
                Password Security
            </h2>

            <p class="card-description">
                Enter your current password and choose a new password.
            </p>


            <form
                action="{{ route('profile.password.update') }}"
                method="POST"
            >

                @csrf

                @method('PATCH')


                {{-- Current Password --}}

                <div class="form-group">

                    <label for="current_password">
                        Current Password
                    </label>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    >

                </div>


                {{-- New Password --}}

                <div class="form-group">

                    <label for="password">
                        New Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >

                    <div class="input-help">
                        Password must be at least 8 characters.
                    </div>

                </div>


                {{-- Confirm Password --}}

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >

                </div>


                {{-- Actions --}}

                <div class="actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Password
                    </button>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>

</html>
