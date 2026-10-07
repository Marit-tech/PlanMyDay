<header class="main-header">
    <div class="main-header-content">
        <a href="{{ route('agenda') }}" class="main-logo">
            <strong>PlanMyDay</strong>
        </a>
        <nav class="main-nav">
            <a href="{{ route('agenda') }}">
                Agenda
            </a>

            @if(auth()->user()->role === 'klant')
                <a href="{{ route('opdracht.create') }}">
                    Opdracht inplannen
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    Uitloggen
                </button>
            </form>`
        </nav>
    </div>
</header>