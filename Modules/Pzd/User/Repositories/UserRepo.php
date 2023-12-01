<?php

namespace Pzd\User\Repositories;

use Pzd\User\Models\User;

class UserRepo
{
    public function index()
    {
        return $this->query()->where('id' , '!=' , auth()->id())->latest()->paginate(12);
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->query()->where('id' , $id)->delete();
    }

    public function query()
    {
        return User::query();
    }


}
