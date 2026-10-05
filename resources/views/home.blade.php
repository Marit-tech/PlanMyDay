<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PlanMyDay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <h1>PlanMyDay</h1>

    <p>Welkom gebruiker</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Uitloggen
        </button>
    </form>

</body>
</html>