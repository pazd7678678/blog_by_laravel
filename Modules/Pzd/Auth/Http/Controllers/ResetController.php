<?php

namespace Pzd\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Pzd\Auth\Http\Requests\PasswordChangeRequest;
use Pzd\Auth\Http\Requests\sendEmailPasswordRecoveryRequest;

class ResetController extends Controller
{
    public function reset()
    {
        return view('Auth::reset.password');
    }

    public function sendEmail(sendEmailPasswordRecoveryRequest $request)
    {
      $reset = Password::sendResetLink($request->only('email'));

      return $reset == Password::RESET_LINK_SENT ?
          back()->with(['message' => 'لینک بازیابی رمز عبور با موفقیت برای شما ارسال گردید'])
          :
          back()->withErrors(['error' => 'مشکلی در سیستم بوجود آمده است لطفا بعدا مجدد سعی نمایید']);
    }
    public function resetPassword(Request $request)
    {
      return view('Auth::reset.reset-password' , ['token'=>$request->token , 'email'=> $request->email]);
    }
    public function changePassword(PasswordChangeRequest $request)
    {
       $reset = Password::reset($request->only('email' , 'password' , 'token', 'password_confirmation'),
       static function($user , $password){
            $user->forceFill(['password' => bcrypt($password)])->setRememberToken(Str::random(60));

            $user->save();

            event(new ResetPassword($user));
       });
      return   $reset == Password::PASSWORD_RESET ?
          redirect()->route('login')->with(['success_reset_password'=>'رمز عبور شما با موفقیت تغییر کرد'])
      :
        redirect()->back()->withErrors(['error' => 'مشکلی در سیستم بوجود آمده است لطفا بعدا مجدد سعی نمایید']);
    }
}
