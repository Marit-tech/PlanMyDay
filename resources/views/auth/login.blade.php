<x-layout>
    <x-slot:title>
        Login
    </x-slot>
    <main class="container">
        <div class="card">
            <h1>Inloggen</h1>
            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div>
                    <label for="email">E-mail</label>
                    <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    >
                </div>
                
                <div>
                    <label for="password">Wachtwoord</label>
                    <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    >
                </div>
                
                <button type="submit" class="save-button">
                    Inloggen
                </button>
            </form>
        </div>
    </main>
</x-layout>