<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    // =========================
    // PROFILE
    // =========================
    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // upload foto
        if($request->hasFile('photo')){

            $photo = $request->file('photo')->store('admin','public');

            $data['photo'] = $photo;
        }

        $admin->update($data);

        return back()->with('success','Profil berhasil diperbarui');
    }

    // =========================
    // SETTINGS
    // =========================
    public function settings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'password' => 'nullable|min:6|confirmed'
        ]);

        if($request->password){

            $admin->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return back()->with('success','Pengaturan berhasil disimpan');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout()
{
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/admin/login');
}
public function pengaturan()
{
    return view('admin.pengaturan');
}
}