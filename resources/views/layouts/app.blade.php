<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monoalphabetic Cipher</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    @stack('styles')
</head>
<body class="flex flex-col items-center justify-center w-screen h-screen text-white bg-slate-800">
    {{ $slot }}
    @livewireScripts()
    @stack('scripts')
</body>
</html>