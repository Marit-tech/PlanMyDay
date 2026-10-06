<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agenda - PlanMyDay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main>
        <h1>Agenda</h1>

        <div id="calendar" data-events='@json($events)'></div>
    </main>

</body>
</html>