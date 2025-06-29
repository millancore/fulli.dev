<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Session::put('admin_id', $admin->id);
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials or not an admin.',
        ])->withInput();
    }

    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('login');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6',
        ]);

        try {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->save();
            return back()->with('admin_register_success', 'Admin registered successfully!');
        } catch (\Exception $e) {
            return back()->with('admin_register_error', 'Error registering admin.');
        }
    }

    public function createTestAdmin()
    {
        $exists = Admin::where('email', 'admin@example.com')->first();
        if (!$exists) {
            Admin::create([
                'name' => 'Test Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
            ]);
            return response('Test admin created: admin@example.com / password123');
        } else {
            return response('Test admin already exists.');
        }
    }
}
