<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- roles -->
        <div class="mt-4">
            <x-input-label for="roles" :value="__('Roles')" />
            <select id="roles" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="roles">
                <option value="">Choose Roles</option>
                <option value="manager">Manager</option>
                <option value="purchasing">Purchasing</option>
                <option value="kadept">Kepala Departement</option>
                <option value="dept">Admin Departement</option>
            </select>
            <x-input-error :messages="$errors->get('roles')" class="mt-2" />
        </div>

        <!-- departement -->
        <div class="mt-4">
            <x-input-label for="departement" :value="__('Departement')" />
            <select id="departement" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="departement" :value="old('departement')"
                required autofocus autocomplete="name">
                <option value="">Choose Departement</option>
                <option value="manager">General Manager</option>
                <option value="FA & TAX">FA & TAX</option>
                <option value="sales">Sales</option>
                <option value="Produksi">Produksi</option>
                <option value="QC">QC</option>
                <option value="Purchasing">Purchasing</option>
                <option value="Logistik">Logistik</option>
                <option value="Prodev">Prodev</option>
                <option value="HRGA">HRGA</option>
                <option value="PPIC RM">PPIC RM</option>
                <option value="PPIC SM">PPIC SM</option>
            </select>
            <x-input-error :messages="$errors->get('departement')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
