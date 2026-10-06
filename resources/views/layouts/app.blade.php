<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $pageTitle ?? 'Task Manager' }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .top-bar {
            background: #111827;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-title {
            margin: 0;
            font-size: 26px;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            font-size: 15px;
        }

        .logout-button {
            background: #ef4444;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 7px;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #dc2626;
        }

        .page-title {
            max-width: 1000px;
            margin: 35px auto 0;
            padding: 0 20px;
        }

        .page-title h1 {
            margin: 0 0 8px;
            font-size: 36px;
        }

        .page-title p {
            margin: 0;
            color: #6b7280;
        }

        .page-content {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="top-bar">

        <h2 class="top-title">
            Task Manager
        </h2>

        @auth
            <div class="top-right">

                <span class="user-name">
                    Hello, {{ auth()->user()->name }}
                </span>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
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
        @endauth

    </nav>


    <div class="page-title">

        <h1>
            {{ $pageTitle ?? 'Task Manager' }}
        </h1>

        @if(isset($pageSubtitle))
            <p>
                {{ $pageSubtitle }}
            </p>
        @endif

    </div>


    <main class="page-content">

        @if(session('success'))
            <div
                id="success-message"
                style="
                    background:#dcfce7;
                    color:#166534;
                    padding:14px 18px;
                    border-radius:8px;
                    margin-bottom:20px;
                    border:1px solid #bbf7d0;
                "
            >
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div
                id="error-message"
                style="
                    background:#fee2e2;
                    color:#991b1b;
                    padding:14px 18px;
                    border-radius:8px;
                    margin-bottom:20px;
                    border:1px solid #fecaca;
                "
            >
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>


    <script>
        setTimeout(function () {

            const successMessage =
                document.getElementById('success-message');

            const errorMessage =
                document.getElementById('error-message');

            if (successMessage) {
                successMessage.style.display = 'none';
            }

            if (errorMessage) {
                errorMessage.style.display = 'none';
            }

        }, 3000);
    </script>

    @stack('scripts')

</body>

</html>
