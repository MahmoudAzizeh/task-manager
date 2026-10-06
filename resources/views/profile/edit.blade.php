<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Profile - Task Manager</title>

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
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 25px 60px;
        }


        /*
        |--------------------------------------------------------------------------
        | Header
        |--------------------------------------------------------------------------
        */

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0 0 10px;
            font-size: 36px;
            color: #111827;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
            font-size: 16px;
        }


        /*
        |--------------------------------------------------------------------------
        | Messages
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

        .error-message {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;

            padding: 14px 18px;
            border-radius: 10px;

            margin-bottom: 25px;
        }

        .error-message ul {
            margin: 10px 0 0;
            padding-left: 20px;
        }


        /*
        |--------------------------------------------------------------------------
        | Cards
        |--------------------------------------------------------------------------
        */

        .card {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 16px;

            padding: 30px;

            margin-bottom: 25px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .card-title {
            margin: 0 0 8px;

            font-size: 22px;

            color: #111827;
        }

        .card-description {
            margin: 0 0 25px;

            color: #6b7280;
            font-size: 14px;
        }


        /*
        |--------------------------------------------------------------------------
        | Profile Information
        |--------------------------------------------------------------------------
        */

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;

            margin-bottom: 30px;

            padding-bottom: 25px;

            border-bottom: 1px solid #e5e7eb;
        }

        .avatar {
            width: 75px;
            height: 75px;

            border-radius: 50%;

            background: #2563eb;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            font-weight: bold;

            flex-shrink: 0;
        }

        .profile-name {
            margin: 0 0 5px;

            font-size: 24px;
            color: #111827;
        }

        .profile-email {
            margin: 0;

            color: #6b7280;
            font-size: 14px;
        }


        /*
        |--------------------------------------------------------------------------
        | Form
        |--------------------------------------------------------------------------
        */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 14px;
            font-weight: bold;

            color: #374151;
        }

        .form-input {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d1d5db;
            border-radius: 9px;

            font-size: 15px;

            outline: none;

            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: #2563eb;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

        .form-error {
            margin-top: 6px;

            color: #dc2626;

            font-size: 13px;
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

            padding: 11px 18px;

            font-size: 14px;
            font-weight: bold;

            cursor: pointer;
            text-decoration: none;
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

        .button-danger {
            background: #dc2626;
            color: white;
        }


        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-top: 25px;
        }


        /*
        |--------------------------------------------------------------------------
        | Account Information
        |--------------------------------------------------------------------------
        */

        .info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 15px;
        }

        .info-box {
            background: #f9fafb;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 18px;
        }

        .info-label {
            color: #6b7280;

            font-size: 13px;

            margin-bottom: 6px;
        }

        .info-value {
            color: #111827;

            font-size: 15px;

            font-weight: bold;

            word-break: break-word;
        }


        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        .footer {
            text-align: center;

            margin-top: 40px;

            color: #9ca3af;

            font-size: 13px;
        }


        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

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

            .page-header h1 {
                font-size: 30px;
            }

            .card {
                padding: 22px;
            }

            .profile-header {
                align-items: flex-start;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;

                align-items: stretch;
            }

            .form-actions .button {
                text-align: center;
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

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>


            <a href="{{ route('tasks.index') }}">
                My Tasks
            </a>


            <a
                href="{{ route('profile.edit') }}"
                class="active"
            >
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
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main class="container">


        <!-- ===================================================== -->
        <!-- PAGE HEADER -->
        <!-- ===================================================== -->

        <div class="page-header">

            <h1>
                My Profile
            </h1>

            <p>
                Manage your account information and password.
            </p>

        </div>



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
        <!-- PROFILE CARD -->
        <!-- ===================================================== -->

        <div class="card">


            <div class="profile-header">

                <div class="avatar">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <div>

                    <h2 class="profile-name">
                        {{ $user->name }}
                    </h2>

                    <p class="profile-email">
                        {{ $user->email }}
                    </p>

                </div>

            </div>



            <h2 class="card-title">
                Personal Information
            </h2>

            <p class="card-description">
                Update your name and email address.
            </p>



            <!-- ================================================= -->
            <!-- UPDATE PROFILE FORM -->
            <!-- ================================================= -->

            <form
                action="{{ route('profile.update') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- Name -->

                <div class="form-group">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        value="{{ old('name', $user->name) }}"
                        required
                    >


                    @error('name')

                        <div class="form-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <!-- Email -->

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email', $user->email) }}"
                        required
                    >


                    @error('email')

                        <div class="form-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <div class="form-actions">

                    <button
                        type="submit"
                        class="button button-primary"
                    >
                        Save Changes
                    </button>


                    <a
                        href="{{ route('dashboard') }}"
                        class="button button-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>



        <!-- ===================================================== -->
        <!-- PASSWORD CARD -->
        <!-- ===================================================== -->

        <div class="card">

            <h2 class="card-title">
                Change Password
            </h2>

            <p class="card-description">
                Make sure your new password is at least 8 characters long.
            </p>


            <form
                action="{{ route('profile.password') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- Current Password -->

                <div class="form-group">

                    <label
                        for="current_password"
                        class="form-label"
                    >
                        Current Password
                    </label>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        class="form-input"
                        required
                    >


                    @error('current_password')

                        <div class="form-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <!-- New Password -->

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        New Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        required
                    >


                    @error('password')

                        <div class="form-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <!-- Confirm Password -->

                <div class="form-group">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        required
                    >

                </div>



                <div class="form-actions">

                    <button
                        type="submit"
                        class="button button-primary"
                    >
                        Change Password
                    </button>

                </div>

            </form>

        </div>



        <!-- ===================================================== -->
        <!-- ACCOUNT INFORMATION -->
        <!-- ===================================================== -->

        <div class="card">

            <h2 class="card-title">
                Account Information
            </h2>

            <p class="card-description">
                Information about your Task Manager account.
            </p>


            <div class="info-grid">


                <div class="info-box">

                    <div class="info-label">
                        User ID
                    </div>

                    <div class="info-value">
                        #{{ $user->id }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Account Created
                    </div>

                    <div class="info-value">
                        {{ $user->created_at->format('F d, Y') }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Last Updated
                    </div>

                    <div class="info-value">
                        {{ $user->updated_at->format('F d, Y') }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Total Tasks
                    </div>

                    <div class="info-value">
                        {{ $user->tasks()->count() }}
                    </div>

                </div>


            </div>

        </div>



        <!-- ===================================================== -->
        <!-- FOOTER -->
        <!-- ===================================================== -->

        <div class="footer">

            Task Manager &copy; {{ date('Y') }}

        </div>


    </main>


</body>

</html>
