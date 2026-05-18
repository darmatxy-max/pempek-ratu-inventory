<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // halaman login
    public function login()
    {
        return view('admin.auth.login');
    }

    // proses login
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if($admin && Hash::check($request->password, $admin->password)){

            session([
                'admin_id' => $admin->id,
                'admin_username' => $admin->username
            ]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // logout
    public function logout()
    {
        session()->forget('admin_id');
        session()->forget('admin_username');

        return redirect('/admin/login');
    }
}