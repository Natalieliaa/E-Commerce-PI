<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat'     => 'required|string',
            'email'      => 'required|email|unique:customers,email',
            'password'   => 'required|min:6',
        ]);

        $customer = Customer::create([
            'nama'       => $request->nama,
            'no_telepon' => $request->no_telepon,
            'alamat'     => $request->alamat,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        Auth::login($customer);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::guard('customer')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/')->with('success', 'Berhasil logout!');
    }
}
