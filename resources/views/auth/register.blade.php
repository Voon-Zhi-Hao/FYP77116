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

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Programme -->
        <div class="mt-4">
            <x-input-label for="programme" :value="__('Programme')" />
                <select id="programme" name="programme" class="block mt-1 w-full rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Select Programme --</option> <option value="software-engineering">Software Engineering</option>
                    <option value="computational-science">Computational Science</option>
                    <option value="network-computing">Network Computing</option>
                    <option value="information-system">Information System</option>
                    <option value="multimedia-computing">Multimedia Computing</option>
                </select>
            <x-input-error :messages="$errors->get('programme')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Select Role --</option> <option value="0">Student</option>
                    <option value="1">Supervisor</option>
                </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
