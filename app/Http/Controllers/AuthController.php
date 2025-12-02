<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Product;
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
        'email'      => [
            'required',
            'email',
            'unique:customers,email',
            'unique:sellers,email',
            'unique:admins,email',
        ],
        'password'   => 'required|min:6',
        'role'       => 'required|in:customer,seller,admin',
    ]);

    $data = [
        'nama'       => $request->nama,
        'no_telepon' => $request->no_telepon,
        'alamat'     => $request->alamat,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
    ];

    // Simpan ke tabel sesuai role
    switch ($request->role) {
        case 'admin':
            $user = Admin::create($data);
            Auth::guard('admin')->login($user);
            return redirect()->route('admin.dashboard');

        case 'seller':
            $user = Seller::create($data);
            Auth::guard('seller')->login($user);
            return redirect()->route('seller.dashboard');

        case 'customer':
            $user = Customer::create($data);
            Auth::guard('customer')->login($user);
            return redirect()->route('customer.dashboard');

        default:
            return back()->withErrors(['role' => 'Role tidak valid']);
    }
}

 public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // =============================
        // 1. Cek ROLE ADMIN
        // =============================
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // =============================
        // 2. Cek ROLE SELLER
        // =============================
        if (Auth::guard('seller')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('seller.dashboard');
        }

        // =============================
        // 3. Cek ROLE CUSTOMER
        // =============================
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }

        // =============================
        // Jika semua gagal
        // =============================
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil logout!');
    }
}
