@extends('template.auth-template')

@section('content')

    <div class="form-card" style="width: 380px;">
        <h2 style="font-weight: 700; margin-bottom: 30px; color: var(--text-merah-tua); font-size: 1.8rem;">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Email</label>
                <input type="email" name="email" class="input-field" required />
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Password</label>
                <input type="password" name="password" class="input-field" required />
            </div>

            <div style="display: flex; justify-content: flex-start; align-items: center; margin-bottom: 30px; font-size: 0.85em;">
                <div>
                    <input type="checkbox" name="remember" id="remember-me" style="accent-color: var(--btn-coklat);">
                    <label for="remember-me" style="color: #555;">Remember Me</label>
                </div>
            </div>

            <button type="submit" class="login-btn" style="background-color: var(--btn-coklat);">
                Login
            </button>
        </form>

        <div class="text-center" style="margin-top: 30px; font-size: 0.9em;">
            <a href="{{ route('register') }}" style="color: var(--btn-coklat); text-decoration: none; font-weight: 500;">
                Belum punya akun?
            </a>
        </div>
    </div>

    <div class="right-content" style="max-width: 450px; text-align: left;">
        <span style="color: var(--text-merah-tua);">
            ECOMMERCE
            <br>
            KERAJINAN
            <br>
            LOKAL
            <br>
            INDONESIA
        </span>
    </div>

@endsection
