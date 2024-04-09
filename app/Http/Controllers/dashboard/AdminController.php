<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginView()
    {
        return view('dashboard.admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('admins')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('status', 'Invalid login details');
    }
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
    public function changePasswordView()
    {
        return view('dashboard.admin.change-password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        if (Auth::guard('admins')->attempt($request->only('email', 'old_password'))) {
            $request->user()->password = Hash::make($request->password);
            $request->user()->save();
            return back()->with('status', 'Password changed successfully');
        }
        return back()->with('status', 'Invalid password');
    }
}
