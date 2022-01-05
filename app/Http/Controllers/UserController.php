<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('pages/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function generate_administrator()
    {

        $user_obj['username'] = 'administrator_1';
        $user_obj['password'] = Hash::make('admin123');
        $user_obj['role'] = 'administrator';
        $user = User::create($user_obj);

        $admin_obj['user_id'] = $user->id;
        $admin_obj['name'] = 'Winda Amelia';
        $admin_obj['phone_number'] = '08976512121';
        Administrator::create($admin_obj);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
