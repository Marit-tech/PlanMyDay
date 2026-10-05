<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht inplannen - PlanMyDay</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="opdracht-page">
    <main class="opdracht-container">
        <div class="opdracht-card">
            <h1>Opdracht inplannen</h1>
            @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            @endif
        
            @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        
            <form method="POST" action="{{ route('opdracht.store') }}">
                @csrf
                <div>
                    <label for="titel">Titel</label>
                    <input
                        type="text"
                        id="titel"
                        name="titel"
                        value="{{ old('titel') }}"
                        required
                    >
                </div>
                <div>
                    <label for="datum">Datum</label>
                    <input
                        type="date"
                        id="datum"
                        name="datum"
                        value="{{ old('datum') }}"
                        required
                    >
                </div>
                <div>
                    <label for="tijd">Tijd</label>
                    <input
                        type="time"
                        id="tijd"
                        name="tijd"
                        value="{{ old('tijd') }}"
                        required
                    >
                </div>
                <div>
                    <label for="duratie">Duur in minuten</label>
                    <input
                        type="number"
                        id="duratie"
                        name="duratie"
                        value="{{ old('duratie') }}"
                        min="1"
                        required
                    >
                </div>
                <div>
                    <label for="opdrachtomschrijving">Opdrachtomschrijving</label>
                    <textarea
                        id="opdrachtomschrijving"
                        name="opdrachtomschrijving"
                        required
                    >{{ old('opdrachtomschrijving') }}</textarea>
                </div>
                <button type="submit" class="opdracht-button">
                    Opdracht inplannen
                </button>
            </form>
        </div>
    </main>
</body>
</html>