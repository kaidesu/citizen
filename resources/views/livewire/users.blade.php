<div class="flex-col space-y-4">
    <x-table>
        <x-slot name="head">
            <x-table.heading>Name</x-table.heading>
            <x-table.heading><span class="sr-only">Actions</span></x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ($users as $user)
                <x-table.row>
                    <x-table.cell>
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $user->name }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </x-table.cell>

                    <x-table.cell>
                        <div class="flex space-x-3 justify-end">
                            <a href="#" class="text-indigo-500 hover:text-indigo-700 font-medium">Edit</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 font-medium">Delete</a>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    <div>
        {{ $users->links('partials._pagination') }}
    </div>
</div>