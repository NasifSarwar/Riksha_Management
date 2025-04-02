<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- NID Number -->
        <div class="mt-4">
            <x-input-label for="nid_number" :value="__('NID Number')" />
            <x-text-input id="nid_number" class="block mt-1 w-full" type="text" name="nid_number" :value="old('nid_number')" required />
            <x-input-error :messages="$errors->get('nid_number')" class="mt-2" />
        </div>

        <!-- Division -->
        <div class="mt-4">
            <x-input-label for="division" :value="__('Division')" />
            <x-text-input id="division" class="block mt-1 w-full" type="text" name="division" :value="old('division')" required />
            <x-input-error :messages="$errors->get('division')" class="mt-2" />
        </div>

        <!-- District -->
        <div class="mt-4">
            <x-input-label for="district" :value="__('District')" />
            <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" required />
            <x-input-error :messages="$errors->get('district')" class="mt-2" />
        </div>

        <!-- Full Address -->
        <div class="mt-4">
            <x-input-label for="full_address" :value="__('Full Address')" />
            <x-text-input id="full_address" class="block mt-1 w-full" type="text" name="full_address" :value="old('full_address')" required />
            <x-input-error :messages="$errors->get('full_address')" class="mt-2" />
        </div>

        <!-- Register As (Role Selection) -->
        <div class="mb-3">
            <x-input-label for="role" :value="__('Register As')" />
            <select class="form-control" name="role" required>
                <option value="owner">Owner</option>
                <option value="puller">Riksha Puller</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
