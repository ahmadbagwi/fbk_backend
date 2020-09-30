<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/storage/files/logo_kemdikbud.png" class="object-contain img-fluid">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Nama Lengkap (huruf tanpa angka dan karakter) ')}}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Pandu Wijaya" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password (huruf angka minimal 6 karakter) ')}}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
              <x-jet-label value="Kegiatan" />
              <input type="radio" id="FBK" name="kegiatan" value="FBK" required>
              <label for="FBK">FASILITASI BIDANG KEBUDAYAAN (FBK)</label><br>
              <input type="radio" id="FKBM" name="kegiatan" value="FKBM">
              <label for="FKBM">FASILITASI KOMUNITAS BUDAYA DI MASYARAKAT (FKBM)</label><br>
              <input type="radio" id="FKK" name="kegiatan" value="FKK">
              <label for="FKK">FASILITASI KEGIATAN KESENIAN (FKK)</label><br>
              <input type="radio" id="FSK" name="kegiatan" value="FSK">
              <label for="FSK">FASILITASI SARANA KESENIAN (FSK)</label><br>

                <!-- <select id="kegiatan" class="block mt-1 w-full" name="kegiatan" required>
                  <option value="FBK">FASILITASI BIDANG KEBUDAYAAN (FBK)</option>
                  <option value="FKBM">FASILITASI KOMUNITAS BUDAYA DI MASYARAKAT (FKBM)</option>
                  <option value="FKK">FASILITASI KEGIATAN KESENIAN (FKK)</option>
                  <option value="FSK">FASILITASI SARANA KESENIAN (FSK)</option>
                </select> -->
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
