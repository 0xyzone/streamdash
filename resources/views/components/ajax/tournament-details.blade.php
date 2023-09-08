<div class="absolute top-10 left-0 flex items-center h-32 overflow-hidden bg-black/50">
    <div class="w-5 h-full" style="background-color: {{ $tournament->color }};">
    </div>
    <h1 class="font-bold text-6xl text-white px-10" id="update">{{ $tournament->name ?? 'No Name Set' }}</h1>
</div>