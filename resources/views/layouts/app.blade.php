<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@100;200;300;400;600&display=swap" rel="stylesheet">
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-blue text-gray font-code font-extralight text-[14pt] mb-10">
    {{ $slot }}

    @livewireScripts
</body>
</html>
