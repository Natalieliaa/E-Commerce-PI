@extends('template.auth-template')

@section('content')

    <div class="form-card" style="width: 450px;">
        <h2 style="font-weight: 700; margin-bottom: 30px; color: var(--text-merah-tua); font-size: 1.8rem;">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Nama</label>
                <input type="text" name="nama" class="input-field" value="{{ old('nama') }}" required autofocus />
                @error('nama')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Email</label>
                <input type="email" name="email" class="input-field" value="{{ old('email') }}" required />
                @error('email')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Password</label>
                <input type="password" name="password" class="input-field" required />
                @error('password')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="input-field" required />
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">No Telepon</label>
                <input type="text" name="no_telepon" class="input-field" value="{{ old('no_telepon') }}" />
                @error('no_telepon')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Alamat</label>
                <textarea name="alamat" class="input-field" rows="3" style="min-height: 80px;">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-size: 0.9em; margin-bottom: 8px; font-weight: 500;">Role</label>
                <select name="role" class="input-field" required>
                    <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>Seller</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <span style="color: red; font-size: 0.8em; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="login-btn" style="background-color: var(--btn-coklat);">
                Daftar
            </button>
        </form>

        <div class="text-center" style="margin-top: 30px; font-size: 0.9em;">
            <a href="{{ route('login') }}" style="color: var(--btn-coklat); text-decoration: none; font-weight: 500;">
                Sudah punya akun? Login
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
