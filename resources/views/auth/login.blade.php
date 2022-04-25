<x-guest-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('login') }}" id="form_login">
            @csrf

            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="error" :errors="$errors" />

            <!-- Email Address -->
            <div class="form_controll">
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Password -->
            <div class="form_controll">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="form_controll">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="form_button">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <x-button>
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
