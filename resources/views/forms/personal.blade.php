<section class="flex flex-col">
    <form action="{{ route('personal.update') }}" method="POST" class="flex-1">
        @csrf

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Personal</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your personal details.</p>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" type="text" name="name" :value="old('name', auth()->user()->name)" autofocus required />
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="nickname" :value="__('Nickname')" />
                        <x-input id="nickname" type="text" name="nickname" :value="old('nickname', auth()->user()->nickname)" />
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <x-button type="submit">
                    {{ __('Save') }}
                </x-button>
            </div>
        </div>
    </form>
</section>