<?php

namespace App\Http\Controllers\Auth;

use App\Models\OTP;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendOTP;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RestPasswordController extends Controller
{
    public function resetView(){
        return view('auth.send_email');
    }
    public function otpView(){
        return view('auth.send_otp');
    }
    public function resetPasswordView(){
        return view('auth.reset_password');
    }
    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $user= User::where("id",Session::get('user_id'))->first();
        $user->update([
            "password"=>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect("/");
    }
    public function postReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:table,column',
        ]);
        $user= User::where("email",$request->email)->first();
        if(!$user){
            return redirect()->back();;
        }
        $otp= rand(100000, 999999);
        $user->notify(new SendOTP($otp));

        OTP::create([
            'user_id'=>$user->id,
            'otp'=>$otp
        ]);
        return redirect()->route('otp');
    }
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $user= User::where("id",Session::get('user_id'))->first();
        $otp= OTP::where('otp',$request->otp)->where("user_id",Session::get('user_id'))->first();
        if($otp){
            $otp->delete();
            Auth::login($user);
            return redirect()->route('reset-password');
        }
        return back()->withErrors(['otp'=>'Invalid OTP']);
    }
}
