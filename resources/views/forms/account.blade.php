<section class="flex flex-col">
    <form action="{{ route('account.update') }}" method="POST" class="flex-1">
        @csrf

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Account</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your account details.</p>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="email" :value="__('Email Address')" />
                        <x-input id="email" type="email" name="email" :value="old('email', auth()->user()->email)" required />
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="password" :value="__('Passphrase')" />

                        <x-input id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password" />
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <x-label for="password_confirmation" :value="__('Confirm Passphrase')" />

                        <x-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" />
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