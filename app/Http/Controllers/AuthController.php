<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsrUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = UsrUser::where('username', $username)->orWhere('phone_number', $username)->first();

        if ($user) {
            // Check password (support both legacy md5/plain or bcrypt)
            $authenticated = false;
            if (Hash::check($password, $user->password)) {
                $authenticated = true;
            } elseif ($user->password === md5($password) || $user->password === sha1($password) || $user->password === $password) {
                // Upgrade password hash to bcrypt automatically
                $user->password = Hash::make($password);
                $user->save();
                $authenticated = true;
            }

            if ($authenticated) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->away('http://acc.brr.gov.gh/');
            }
        }

        return redirect()->back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('username'));
    }

    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_fullname' => 'required|string|max:150',
            'username' => 'required|string|max:100|unique:usr_users,username',
            'phone_number' => 'required|string|max:25',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = UsrUser::create([
            'user_fullname' => $request->input('user_fullname'),
            'username' => $request->input('username'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
            'user_date' => date('Y-m-d H:i:s'),
            'user_cat' => 2,
            'sid' => 0,
            'status' => 1,
            'created_by' => 0,
            'userType' => $request->input('userType', 'Citizen'),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Registration successful! Welcome to the BRR Portal.');
    }

    public function showResetPassword()
    {
        return view('pages.auth.password_reset');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        return redirect()->back()->with('success', 'If an account matches that number, an OTP code has been sent.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out safely.');
    }
}
