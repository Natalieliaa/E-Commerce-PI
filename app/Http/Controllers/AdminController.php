<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    // Halaman dashboard admin
    public function index()
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.dashboard', compact('users', 'products'));
    }

    // Menampilkan semua seller
    public function sellers()
    {
        $sellers = User::where('role', 'seller')->get();
        return view('admin.sellers.index', compact('sellers'));
    }

    // Menampilkan semua customer
    public function customers()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }
}
