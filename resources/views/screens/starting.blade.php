<x-screens>
    <div class="absolute top-10 left-0 flex items-center h-32 overflow-hidden bg-black/50" id="details">
        <div class="w-5 h-full" style="background-color: @{{ tournament.color }} ;" id="span">
        </div>
        {{-- <h1 class="font-bold text-6xl text-white px-10" id="update">{{ $tournament->name ?? 'No Name Set' }}</h1> --}}
        <h1 class="font-bold text-6xl text-white px-10" id="update">@{{ tournament.name }}</h1>
    </div>
    <div>
        @if ($tournament->logo != '')
            <img src="{{ asset('/storage/' . $tournament->logo) }}" alt=""
                class="w-4/12 aspect-square object-cover absolute top-44 left-12" id="logo">
        @endif
    </div>
    <div class="w-10/12 h-screen absolute top-[100%] left-[50%] rotate-[-25deg] "
        style="background-color: @{{ tournament.color }} ;" id="span2">
    </div>
    <div class="w-10/12 h-screen absolute top-[95%] left-[52%] rotate-[-10deg] opacity-50 animate-pulse"
        style="background-color: @{{ tournament.color }} ;" id="span3">

    </div>

    <script type="module">
        window.Echo.channel('tournament.{{ $tournament->id }}').listen('FetchDetails', (tournament) => {
            console.log(tournament);
            $("#update").html(tournament.tournament.name);
            $("#span").css('background', tournament.tournament.color);
            $("#span2").css('background', tournament.tournament.color);
            $("#span3").css('background', tournament.tournament.color);
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
