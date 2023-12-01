<?php

namespace Pzd\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify()
    {
        return view('Auth::verify.email');
    }
    public function verification(EmailVerificationRequest $request)
    {
       $request->fulfill();
       return to_route('home.index')->with(['verify_email' => 'ایمیل شما با موفقیت تایید گردید']);
    }
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with(['message'=>'لینک تایید ایمیل با موفقیت برای شما ارسال گردید']);
    }
}
