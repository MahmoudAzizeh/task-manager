<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register - Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, Helvetica, sans-serif;

            background: #f4f7fb;
        }

        .container {
            width: 90%;
            max-width: 430px;
        }

        .card {
            background: white;

            padding: 35px;

            border-radius: 15px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;

            font-size: 28px;
            font-weight: bold;

            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;

            color: #6b7280;

            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            font-weight: bold;
        }

        input {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            font-size: 15px;

            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .button {
            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 8px;

            background: #2563eb;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .error-box {
            background: #fee2e2;

            color: #991b1b;

            padding: 13px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .footer {
            text-align: center;

            margin-top: 25px;

            color: #6b7280;
        }

        .footer a {
            color: #2563eb;

            text-decoration: none;

            font-weight: bold;
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="card">

            <div class="logo">
                Task Manager
            </div>

            <div class="subtitle">
                Create your account
            </div>


            @if ($errors->any())

                <div class="error-box">

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form
                action="{{ route('register.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-group">

                    <label for="name">
                        Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimum 8 characters"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repeat your password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="button"
                >
                    Create Account
                </button>

            </form>


            <div class="footer">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

</body>

</html>