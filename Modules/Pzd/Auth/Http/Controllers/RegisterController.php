<?php

namespace Pzd\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Pzd\Auth\Http\Requests\RegisterRequest;
use Pzd\Auth\Services\RegisterService;

class RegisterController extends Controller
{
    public function register()
    {
        return view('Auth::register');
    }
    public function store(RegisterRequest $request , RegisterService $service)
    {
       $user =  $service->store($request);

       if($user)
       {
           auth()->loginUsingId($user->id);
       }
       event(new  Registered($user));
       return to_route('home.index');

    }
}
