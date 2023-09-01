<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-[1920px] h-[1080px] bg-transparent p-10 relative">
    <div class="absolute top-10 left-0 flex items-center h-32 overflow-hidden bg-black/50">
        <div class="w-5 h-full" style="background-color: {{ $tournament->color }};">
        </div>
        <h1 class="font-bold text-6xl text-white px-10">{{ $tournament->name ?? 'No Name Set' }}</h1>
    </div>
</body>

</html>
