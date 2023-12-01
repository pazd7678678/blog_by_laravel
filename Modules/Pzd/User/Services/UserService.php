<?php

namespace Pzd\User\Services;

use Pzd\User\Models\User;

class UserService
{
    public function store($request)
    {
        return User::query()->create([
           'name' => $request->name ,
           'email' => $request->email ,
           'password' => bcrypt($request->password)
        ]);
    }
    public function update($request, $id)
    {
        return User::query()->where('id' , $id)->update([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => bcrypt($request->password)
        ]);
    }

    public function addRole($roles , $user)
    {

        return $user->assignRole($roles);
    }

    public function destroyRole( $user,$role)
    {
        return $user->removeRole($role);
    }
    public function updateProfile($request, $id)
    {
        return User::query()->where('id' , $id)->update([

            'name' => $request->name ,
            'email' => $request->email ,
            'password' =>bcrypt( $request->password) ,
            'telegram' => $request->telegram ,
            'linkedin' => $request->linkedin ,
            'twitter' => $request->twitter ,
            'instagram' => $request->instagram ,
            'bio' => $request->bio ,
            'imageName' => $request->imageName ,
            'imagePath' => $request->imagePath ,

        ]);
    }

}
