<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="w-[1920px] h-[1080px] bg-transparent p-10 relative" id="app">
    <div class="absolute top-10 left-0 flex items-center h-32 overflow-hidden bg-black/50" id="details">
        <div class="w-5 h-full" style="background-color: @{{ tournament.color }} ;" id="span">
        </div>
        {{-- <h1 class="font-bold text-6xl text-white px-10" id="update">{{ $tournament->name ?? 'No Name Set' }}</h1> --}}
        <h1 class="font-bold text-6xl text-white px-10" id="update">@{{ tournament.name }}</h1>
    </div>

    <script type="module">
        window.Echo.channel('tournament.{{ $tournament->id }}').listen('FetchDetails', (tournament) => {
            console.log(tournament);
            $("#update").html(tournament.tournament.name);
            $("#span").css('background', tournament.tournament.color)
        })
        const app = new Vue({
            el: "#app",
            data: {
                tournament: {!! $tournament->toJson() !!},
            },
            methods: {
                listen() {
                    window.Echo.channel('tournament.{{ $tournament->id }}').listen('FetchDetails', (tournament) => {
                        console.log(tournament);
                        this.tournament.name = tournament.name;
                        this.tournament.color = tournament.color;
                    })
                }
            },
            mounted: function() {
                console.log('hi there');
                this.listen();
            },
        });
        // app.mount('#app');
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.cjs.js"
        integrity="sha512-Om0T2d9tl4H2ShSsEkWjJeQOlXGJg4OZvXKZw075refp2RNZ1avQDbqd6WhwGbWhqpcn2oPmExCEa/lSLzZaJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

</body>

</html>
