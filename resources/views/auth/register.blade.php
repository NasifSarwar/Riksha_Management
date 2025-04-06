<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Riksha Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body class="bg-image">
    <div class="bg-overlay">
        <div class="auth-container">
            <h2>Create an Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Phone Number -->
                <div class="input-group">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
                    <x-input-error :messages="$errors->get('phone_number')" />
                </div>

                <!-- NID Number -->
                <div class="input-group">
                    <label for="nid_number">NID Number</label>
                    <input id="nid_number" type="text" name="nid_number" value="{{ old('nid_number') }}" required>
                    <x-input-error :messages="$errors->get('nid_number')" />
                </div>

                <!-- Division -->
                <div class="input-group">
                    <label for="division">Division</label>
                    <input id="division" type="text" name="division" value="{{ old('division') }}" required>
                    <x-input-error :messages="$errors->get('division')" />
                </div>

                <!-- District -->
                <div class="input-group">
                    <label for="district">District</label>
                    <input id="district" type="text" name="district" value="{{ old('district') }}" required>
                    <x-input-error :messages="$errors->get('district')" />
                </div>

                <!-- Full Address -->
                <div class="input-group">
                    <label for="full_address">Full Address</label>
                    <input id="full_address" type="text" name="full_address" value="{{ old('full_address') }}" required>
                    <x-input-error :messages="$errors->get('full_address')" />
                </div>

                <!-- Register As (Role Selection) -->
                <div class="input-group">
                    <label for="role">Register As</label>
                    <select name="role" required>
                        <option value="owner">Owner</option>
                        <option value="puller">Riksha Puller</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <a href="{{ route('login') }}" class="forgot-password">Already registered?</a>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    {{-- <script src="{{ asset('js/register.js') }}"></script> --}}
</body>
</html>
