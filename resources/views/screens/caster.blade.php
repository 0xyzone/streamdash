<x-screens>
    <div class="absolute top-20 left-0 flex items-center h-32 overflow-visible bg-black/50" id="details">
        <div class="w-5 h-full" style="background-color: @{{ tournament.color }} ;" id="span">
        </div>
        @if ($tournament->logo != '')
            <img src="{{ asset('/storage/' . $tournament->logo) }}" alt=""
                class="h-64 aspect-square object-cover mx-4 -py-4" id="logo">
        @endif
        {{-- <h1 class="font-bold text-6xl text-white px-10" id="update">{{ $tournament->name ?? 'No Name Set' }}</h1> --}}
        <h1 class="font-bold text-6xl text-white pr-10" id="update">@{{ tournament.name }}</h1>
    </div>
    <script type="module">
        window.Echo.channel('tournament.{{ $tournament->id }}').listen('FetchDetails', (tournament) => {
            console.log(tournament);
            $("#update").html(tournament.tournament.name);
            $("#span").css('background', tournament.tournament.color);
            $("#logo").attr('src', '{{ asset('/storage/') }}/' + tournament.tournament.logo);
        });
        const app = new Vue({
            el: "#app",
            data: {
                tournament: {!! $tournament->toJson() !!},
            },
        });
    </script>
</x-screens>
