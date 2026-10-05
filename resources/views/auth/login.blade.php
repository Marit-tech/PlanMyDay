<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inloggen - PlanMyDay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-page">

    <main class="login-container">

        <div class="login-card">

            <h1>Inloggen</h1>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email">E-mail</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Inloggen
                </button>

            </form>

        </div>

    </main>

</body>
</html>