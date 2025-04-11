{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Adresse e-mail') }}</label>
            <div class="mt-1">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <span class="text-red-600 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Mot de passe') }}</label>
            <div class="mt-1">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <span class="text-red-600 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">{{ __('Se souvenir de moi') }}</label>
            </div>
    
            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                </div>
            @endif
        </div>
    
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Connexion') }}
            </button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- CSS personnalisé pour le formulaire de connexion -->
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            background-image: linear-gradient(135deg, #fffbf4 0%, #fff8ee 100%);
            padding: 20px;
        }
        
        .login-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid #f97316;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
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
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .remember-checkbox {
            height: 1rem;
            width: 1rem;
            color: #f97316;
            border-color: #d1d5db;
            border-radius: 0.25rem;
        }
        
        .remember-label {
            margin-left: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
        }
        
        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .forgot-link {
            font-size: 0.875rem;
            color: #f97316;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.15s ease;
        }
        
        .forgot-link:hover {
            color: #ea580c;
            text-decoration: underline;
        }
        
        .login-button {
            display: flex;
            justify-content: center;
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: #f97316;
            color: white;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.15s ease, transform 0.15s ease;
        }
        
        .login-button:hover {
            background-color: #ea580c;
            transform: translateY(-1px);
        }
        
        .login-button:active {
            transform: translateY(1px);
        }
        
        .register-container {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }
        
        .register-text {
            color: #6b7280;
        }
        
        .register-link {
            color: #f97316;
            font-weight: 500;
            margin-left: 0.25rem;
            text-decoration: none;
            transition: color 0.15s ease;
        }
        
        .register-link:hover {
            color: #ea580c;
            text-decoration: underline;
        }

        /* Animation pour le formulaire */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2 class="login-title">{{ __('Connexion') }}</h2>
                <p class="login-subtitle">{{ __('Accédez à votre compte JuniorMarket') }}</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                        class="form-input" placeholder="exemple@email.com">
                    @error('email')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="form-input" placeholder="••••••••">
                    @error('password')
                        <span class="form-error" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="flex-between form-group">
                    <div class="checkbox-container">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="remember-checkbox">
                        <label for="remember" class="remember-label">{{ __('Se souvenir de moi') }}</label>
                    </div>
            
                    @if (Route::has('password.request'))
                        <div>
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        </div>
                    @endif
                </div>
            
                <div class="form-group">
                    <button type="submit" class="login-button">
                        {{ __('Connexion') }}
                    </button>
                </div>

                <div class="register-container">
                    <span class="register-text">{{ __('Nouveau sur JuniorMarket?') }}</span>
                    <a href="{{ route('register') }}" class="register-link">
                        {{ __('Créer un compte') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>