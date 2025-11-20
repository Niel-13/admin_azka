<x-auth-layout>
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Daftar Akun Baru</h2>
    <p class="text-gray-600 text-center mb-6">Buat akun Anda untuk memulai</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="relative mb-4">
            <x-text-input id="name" class="block w-full pl-10 pr-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Lengkap" />
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="relative mb-4">
            <x-text-input id="email" class="block w-full pl-10 pr-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="relative mb-4">
            <x-text-input id="password" class="block w-full pl-10 pr-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3h8z" />
                </svg>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="relative mb-6">
            <x-text-input id="password_confirmation" class="block w-full pl-10 pr-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password" />
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3h8z" />
                </svg>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center bg-[#D4BE7F] hover:bg-[#C2AA6B] text-gray-900 font-bold py-2 px-4 rounded-md focus:ring-amber-500 focus:border-amber-500">
            {{ __('Daftar') }}
        </x-primary-button>

        <p class="text-center text-sm text-gray-600 mt-4">
            Sudah punya akun? 
            <a class="underline text-[#D4BE7F] hover:text-[#C2AA6B]" href="{{ route('login') }}">Masuk Disini</a>
        </p>
    </form>
</x-auth-layout>