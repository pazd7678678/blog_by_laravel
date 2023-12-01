<?php

namespace Pzd\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Pzd\Auth\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth::login');
    }

    public function store(LoginRequest $request)
    {
         if(Auth::attempt(['email' => $request->email , 'password' => $request->password]))
         {
             return redirect()->route('home.index');
         }
         return  redirect()->back()->withErrors(['problem_data' => 'اطلاعات وارد شده با اطلاعات ما سازگاری ندارد']);
    }
}
