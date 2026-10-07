<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ 'PlanMyDay - ' . $title ?? 'PlanMyDay' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page">
    {{ $slot }}
</body>
</html>