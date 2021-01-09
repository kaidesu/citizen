<section class="flex flex-col">
    <form action="{{ route('avatar.update') }}" method="POST" class="flex-1">
        @csrf

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Avatar</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your avatar.</p>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-6">
                    <div class="col-span-4 sm:col-span-2 flex justify-center">
                        <span class="w-36 h-36 text-6xl font-bold text-gray-600 rounded-full bg-gray-200 flex items-center justify-center">{{ auth()->user()->letter }}</span>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="avatar" :value="__('Upload')" />
                        <x-input id="avatar" type="file" name="avatar" />
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