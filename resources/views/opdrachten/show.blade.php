<x-layout>
    <x-slot:title>
        Opdracht details
    </x-slot>
    <x-header />
    <main class="container">
        <div class="card">
            <a href="{{ route('agenda') }}" class="button">
                <strong>< Terug</strong>
            </a>
            <h1>{{ $opdracht->titel }}</h1>
            <table>
                <tr>
                    <th>Datum:</th>
                    <td>{{ $opdracht->datum->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Tijd:</th>
                    <td>{{ $opdracht->datum->format('H:i') }}</td>
                </tr>
                <tr>
                    <th>Duur:</th>
                    <td>{{ $opdracht->duratie }} minuten</td>
                </tr>
                <tr>
                    <th>Opdrachtomschrijving:</th>
                    <td>{{ $opdracht->opdrachtomschrijving }}</td>
                </tr>
            </table>
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
                        <table class="beschrijving-table">
                            <tr>
                                <th><label for="beschrijving">Beschrijving:</label></th>
                                <td><button type="submit" class="beschrijving-button">Beschrijving opslaan</button></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea id="beschrijving" name="beschrijving" required>{{ old('beschrijving', $opdracht->beschrijving) }}</textarea></td>
                            </tr>
                        </table>
                    </form>
                @else
                <p>
                    <strong>Beschrijving:</strong><br>
                    Je kunt pas na afloop van de opdracht een beschrijving toevoegen.
                </p>
                @endif
            @endif
            
            @if(auth()->user()->role === 'klant')
                @php
                $eindtijd = $opdracht->datum->copy()
                ->addMinutes((int) $opdracht->duratie);
                @endphp
                @if(now()->gte($eindtijd))
                    <p>
                        <strong>Beschrijving:</strong><br>
                        {{ $opdracht->beschrijving ?? 'Er is nog geen beschrijving toegevoegd.' }}
                    </p>
                @endif
            @endif
            
        </div>
    </main>
</x-layout>