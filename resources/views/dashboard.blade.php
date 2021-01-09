<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        {{-- <div class="sm:px-6 lg:px-0 lg:col-span-9 grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-6"> --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div>
                @include('forms.avatar')
            </div>

            <div class="md:col-span-2 lg:col-span-3 grid gap-6">
                @include('forms.personal')
                @include('forms.account')
            </div>
        </div>
    </div>
</x-app-layout>
