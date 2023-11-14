<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <section class="flex min-h-screen w-full">
        <div class="max-w-[250px] p-6 w-full h-full">
            @livewire('components.navbar')
        </div>
        <div class="w-full p-6">
            <div class="w-full h-full bg-white border border-gray-200 rounded-2xl p-6">
                {{ $slot }}
            </div>
        </div>
    </section>
    @livewireScripts
</body>
</html>