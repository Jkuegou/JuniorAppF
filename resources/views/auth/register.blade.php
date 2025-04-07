{{-- <x-guest-layout>
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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <!-- CSS personnalisé pour le formulaire d'enregistrement -->
    <style>
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            background-image: linear-gradient(135deg, #fffbf4 0%, #fff8ee 100%);
            padding: 20px;
        }
        
        .register-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid #f97316;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .register-subtitle {
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
        }
        
        .form-input {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: #ffffff;
            color: #1f2937;
            font-size: 0.875rem;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        
        .form-input:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
            outline: none;
        }
        
        .form-error {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }
        
        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .login-link {
            font-size: 0.875rem;
            color: #f97316;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.15s ease;
        }
        
        .login-link:hover {
            color: #ea580c;
            text-decoration: underline;
        }
        
        .register-button {
            display: inline-flex;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            background-color: #f97316;
            color: white;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.15s ease, transform 0.15s ease;
        }
        
        .register-button:hover {
            background-color: #ea580c;
            transform: translateY(-1px);
        }
        
        .register-button:active {
            transform: translateY(1px);
        }
        
        .register-footer {
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* Animation pour le formulaire */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-card {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .register-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }
            
            .register-button {
                width: 100%;
            }
        }
    </style>

    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h2 class="register-title">{{ __('Créer un compte') }}</h2>
                <p class="register-subtitle">{{ __('Rejoignez DeliveryHub pour profiter de nos services de livraison') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Nom complet') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                           class="form-input" placeholder="Entrez votre nom complet">
                    @error('name')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                           class="form-input" placeholder="exemple@email.com">
                    @error('email')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="form-input" placeholder="••••••••">
                    @error('password')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="form-input" placeholder="••••••••">
                    @error('password_confirmation')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-footer">
                    <a class="login-link" href="{{ route('login') }}">
                        {{ __('Déjà inscrit?') }}
                    </a>

                    <button type="submit" class="register-button">
                        {{ __('S\'inscrire') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>