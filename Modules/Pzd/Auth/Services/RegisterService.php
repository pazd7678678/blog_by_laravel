<?php

namespace Pzd\Auth\Services;

use Pzd\User\Models\User;

class RegisterService
{
    public function store($request)
    {
        return User::query()->create([
           'name'=> $request->name ,
           'email' => $request->email ,
           'password' => bcrypt($request->password) ,
        ]);
    }

}
