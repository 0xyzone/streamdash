<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="w-[1920px] h-[1080px] bg-transparent p-10 relative" id="app">
    <div class="absolute top-10 left-0 flex items-center h-32 overflow-hidden bg-black/50" id="details">
        <div class="w-5 h-full" style="background-color: @{{ tournament.color }};">
        </div>
        {{-- <h1 class="font-bold text-6xl text-white px-10" id="update">{{ $tournament->name ?? 'No Name Set' }}</h1> --}}
        <h1 class="font-bold text-6xl text-white px-10" id="update">@{{ tournament.name }}</h1>
    </div>

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                tournament: {!! $tournament->toJson() !!},
                details: {},
            },
            mounted() {
                this.getDetails();
                this.listen();
            },
            methods: {
                getDetails() {
                    axios.get(`/api/tournaments/${this.tournament.id}/details`)
                        .then((response) => {
                            this.details = response.data
                        })
                        .catch(function(error) {
                            console.log(error);
                        })
                },
                listen() {
                    Echo.channel('tournament.'+this.tournament.id)
                    .listen('FetchDetails', (tournament) => {
                        this.tournament.name = tournament.name
                    });
                }
            }
        });
    </script>

</body>

</html>
