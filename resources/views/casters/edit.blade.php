<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Edit Caster - ') . $caster->name }}
                </h2>
            </div>
            <x-button variant="primary" size="base" class="items-center gap-2" href="{{ url()->previous() }}">
                <x-eos-arrow-back aria-hidden="true" class="w-6 h-6" />
                <span>Go Back</span>
            </x-button>
        </div>
    </x-slot>
</x-app-layout>