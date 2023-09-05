<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Edit Tournament - ') . $tournament->name }}
                </h2>
            </div>
            <x-button variant="primary" size="base" class="items-center gap-2" href="{{ url()->previous() }}">
                <x-eos-arrow-back aria-hidden="true" class="w-6 h-6" />
                <span>Go Back</span>
            </x-button>
        </div>
    </x-slot>
    <form action="{{ route('tournaments.update', $tournament) }}" method="post" class="flex flex-col gap-6">
        @csrf
        @method('PUT')
        <fieldset class="border-2 rounded-lg w-6/12">
            <legend class="px-2 ml-2">Name</legend>
            <input type="text" name="name" id="name"
                class="w-full bg-transparent border-none focus:ring-0 outline-none" autofocus="on" autocomplete="off"
                value="{{ old('name') ?? $tournament->name }}">
            @error('name')
                <p class="text-red-500 px-2 py-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="border-2 rounded-lg w-6/12">
            <legend class="px-2 ml-2">Start Date</legend>
            <input type="date" name="start_date" id="start_date"
                class="w-max bg-transparent border-none focus:ring-0 outline-none" value="{{ old('start_date') ?? $tournament->start_date }}">
            @error('start_date')
                <p class="text-red-500 px-2 py-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="border-2 rounded-lg w-6/12">
            <legend class="px-2 ml-2">End Date</legend>
            <input type="date" name="ending" id="ending"
                class="w-max bg-transparent border-none focus:ring-0 outline-none" pattern="\d{4}-\d{2}-\d{2}"
                value="{{ old('ending') ?? $tournament->end_date }}">
            @error('ending')
                <p class="text-red-500 px-2 py-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset class="border-2 rounded-lg w-max p-2">
            <legend class="px-2">Theme Color</legend>
            <input type="color" name="color" id="color"
                class="w-full bg-transparent border-none focus:ring-0 outline-none"
                value="{{ old('color') ?? $tournament->color }}">
        </fieldset>
        <x-button variant="primary" size="base" class="items-center gap-2 w-max">
            <x-eos-add-circle-o aria-hidden="true" class="w-6 h-6" />
            <span>Update</span>
        </x-button>
    </form>
</x-app-layout>