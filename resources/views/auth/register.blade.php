<x-guest-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('register') }}" id="form_login">
            @csrf

            <!-- Validation Errors -->
            <x-auth-validation-errors class="error" :errors="$errors" />

            <!-- Name -->
            <div class="form_controll">
                <x-label for="name" :value="__('Nom')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Password -->
            <div class="form_controll">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form_controll">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation"
                        type="password"
                        name="password_confirmation" required />
            </div>

            <div class="form_button">
                <a href="{{ route('login') }}">
                    {{ __('Déjà enregistrer ?') }}
                </a>

                <x-button>
                    {{ __('S\'enregistrer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
