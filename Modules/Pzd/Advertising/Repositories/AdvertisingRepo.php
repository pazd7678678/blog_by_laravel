<?php

namespace Pzd\Advertising\Repositories;

use Pzd\Advertising\Models\Advertising;

class AdvertisingRepo
{

    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function query()
    {
        return Advertising::query();
    }


}
