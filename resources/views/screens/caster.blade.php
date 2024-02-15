<x-screens title="Caster Screen">
    <div class="absolute bottom-20 left-0 flex items-center h-32 overflow-visible bg-black/50" id="details">
        <div class="w-5 h-full" style="background-color: @{{ tournament.color }} ;" id="span">
        </div>
        @if ($tournament->logo != '')
        <img src="{{ asset('/storage/' . $tournament->logo) }}" alt="" class="h-64 aspect-square object-cover mx-4 -py-4" id="logo">
        @endif
        <h1 class="font-bold text-6xl text-white pr-10" id="name">@{{ tournament.name }}</h1>
    </div>
    <div class="flex w-full absolute top-10 ">
        <div class="w-6/12">
            <div class="caster w-6/12 py-4 pl-4 flex items-center font-esports text-3xl font-bold" style="background-color: @{{ tournament.color }} ;">
                {{ $casters[0]['name'] }}
            </div>
            <div class="w-full aspect-video bg-green-500 border-4"></div>
        </div>
        <div class="w-6/12 flex flex-col items-end">
            <div class="caster w-6/12 py-4 pr-4 flex items-center justify-end font-esports text-3xl font-bold" style="background-color: @{{ tournament.color }} ;">
                {{ $casters[1]['name'] }}
            </div>
            <div class="w-full aspect-video bg-green-500 border-4"></div>
        </div>
    </div>
    <script type="module">
        window.Echo.channel('tournament.{{ $tournament->id }}').listen('FetchDetails', (tournament, caster) => {
            console.log(tournament);
            $("#name").html(tournament.tournament.name);
            $("#span").css('background', tournament.tournament.color);
            $(".caster").css('background', tournament.tournament.color);
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
