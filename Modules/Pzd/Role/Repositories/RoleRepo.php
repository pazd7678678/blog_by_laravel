<?php

namespace Pzd\Role\Repositories;

use Spatie\Permission\Models\Role as SpatieRole;

class RoleRepo
{
   public function findById($id)
   {
       return $this->query()->findOrFail($id);
   }

   public function index()
   {
       return $this->query()->latest();
   }

   public function delete($id)
   {
       return $this->query()->where('id' , $id)->delete();
   }

   public function query()
   {
       return SpatieRole::query();
   }

}
