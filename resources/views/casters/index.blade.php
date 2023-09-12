<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Casters') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <table class="table w-full">
        <thead>
            <tr class="dark:bg-gray-800 bg-gray-400">
                <th class="w-1/12 py-2">#</th>
                <th class="w-5/12 text-left">Caster Name</th>
                <th class="w-2/12">Created At</th>
                <th class="w-2/12">Updated On</th>
                <th class="w-2/12">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($casters as $caster)
                <tr class="odd:dark:bg-gray-600 even:dark:bg-gray-700 odd:bg-gray-200 even:bg-gray-300">
                    <td class="text-center py-2">{{ $caster->id }}</td>
                    <td>{{ $caster->name }}</td>
                    <td class="text-center">{{ date('jS M, Y', strtotime($caster->created_at)) }}</td>
                    <td class="text-center">{{ date('jS M, Y', strtotime($caster->updated_at)) }}</td>
                    <td>
                        <div class="flex justify-center items-center gap-2">
                            <a href="{{ route('tournaments.edit', $caster->id) }}">
                                <x-eos-edit-o class="w-6 h-6 hover:cursor-pointer hover:text-purple-500" />
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $casters->links() }}

</x-app-layout>
