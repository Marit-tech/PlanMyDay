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
            @if(auth()->user()->role === 'lid')
                @php
                $eindtijd = $opdracht->datum->copy()
                ->addMinutes((int) $opdracht->duratie);
                @endphp
                    
                @if(now()->gte($eindtijd))
                    @if($errors->has('beschrijving'))
                        <div class="error-message">
                            {{ $errors->first('beschrijving') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('opdracht.beschrijving.update', $opdracht) }}">
                        @csrf
                        @method('PATCH')
                        <div class="beschrijving-header">
                            <label for="beschrijving">Beschrijving</label>
                            <button type="submit" class="beschrijving-button">Beschrijving opslaan</button>
                        </div>
                        <textarea id="beschrijving" name="beschrijving" required>{{ old('beschrijving', $opdracht->beschrijving) }}</textarea>
                    </form>
                @else
                    <p>
                        <strong>Beschrijving:</strong><br>
                        Je kunt pas na afloop van de opdracht een beschrijving toevoegen.
                    </p>
                @endif
            @endif
        </div>
    </main>
</body>
</html>