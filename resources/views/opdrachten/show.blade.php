<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $opdracht->titel }} - PlanMyDay</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="opdracht-page">
    <main class="opdracht-container">
        <div class="opdracht-card">
            <a href="{{ route('agenda.index') }}" class="agenda-button">
                Terug naar agenda
            </a>
            <h1>{{ $opdracht->titel }}</h1>

            <p>
                <strong>Datum:</strong>
                {{ $opdracht->datum->format('d-m-Y') }}
            </p>

            <p>
                <strong>Tijd:</strong>
                {{ $opdracht->datum->format('H:i') }}
            </p>

            <p>
                <strong>Duur:</strong>
                {{ $opdracht->duratie }} minuten
            </p>

            <p>
                <strong>Opdrachtomschrijving:</strong><br>
                {{ $opdracht->opdrachtomschrijving }}
            </p>
        </div>
    </main>
</body>
</html>