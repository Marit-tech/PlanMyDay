<x-layout>
    <x-slot:title>
        Agenda
    </x-slot>
    <x-header />
    <main class="container">
        <div class="agenda-card">
            <h1>Agenda</h1>
            <div id="calendar" data-events='@json($events)'></div>
        </div>
    </main>
</x-layout>