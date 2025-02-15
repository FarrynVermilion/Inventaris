<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;


class forgotPasswordController extends Controller
{
    public function forgotPasswordForm(){
        Auth::logout();
        return view('auth.passwords.email');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            $status = Password::sendResetLink($request->only('email'));
            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);
        }
        return back()->withErrors(['email' => 'Email Tidak Ditemukan']);
    }

    public function resetPasswordForm(string $token){
        Auth::logout();
        return view('auth.passwords.reset',['token' => $token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

}
