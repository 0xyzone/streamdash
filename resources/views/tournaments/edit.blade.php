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

        <div class="logo">
            <img src="{{ $tournament->logo ? asset('storage/' . $tournament->logo) : '' }}" alt="logo"
                class="w-32 rounded-lg aspect-square object-cover">
        </div>
        <fieldset class="border-2 rounded-lg w-6/12">
            <legend class="px-2 ml-2">Name</legend>
            <input type="text" name="name" id="name"
                class="w-full bg-transparent border-none focus:ring-0 outline-none" autofocus="on" autocomplete="off"
                value="{{ old('name') ?? $tournament->name }}">
            @error('name')
                <p class="text-red-500 px-2 py-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <div date-rangepicker class="flex items-center">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input name="start_date" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('ending') ?? date('M-d-Y', strtotime($tournament->start_date)) }}"
                    placeholder="Select date start">
                @error('start_date')
                    <p class="text-red-500 px-2 py-1">{{ $message }}</p>
                @enderror
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input name="ending" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('ending') ?? date('M-d-Y', strtotime($tournament->end_date)) }}"
                    placeholder="Select date end">
                @error('ending')
                    <p class="text-red-500 px-2 py-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

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
