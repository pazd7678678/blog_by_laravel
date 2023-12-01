<?php

namespace Pzd\Role\Http\Controllers;

use App\Http\Controllers\Controller;
use Pzd\Role\Http\Requests\RoleRequest;
use Pzd\Role\Models\Role;
use Pzd\Role\Repositories\PermissionRepo;
use Pzd\Role\Repositories\RoleRepo;
use Pzd\Role\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(public  RoleRepo $repo , public RoleService $service, public Role $role)
    {
    }

    public function index()
    {
        $this->authorize('index' , $this->role);
       $roles = $this->repo->index()->with('permissions')->paginate(10);

       return view('Role::index' , compact('roles'));
    }


    public function create(PermissionRepo $permissionRepo)
    {
        $this->authorize('index' , $this->role);
        $permissions = $permissionRepo->all();

        return view('Role::create' , compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('index' , $this->role);
        $this->service->store($request);
        toast('ساخت مقام','success','bottom-right')->timerProgressBar();
        return to_route('roles.index');
    }

    public function edit($id, PermissionRepo  $permissionRepo)
    {
        $this->authorize('index' , $this->role);
        $role = $this->repo->findById($id) ;
        $permissions = $permissionRepo->all();

        return view('Role::edit' , compact('role', 'permissions'));
    }


    public function update(RoleRequest $request, $id)
    {
        $this->authorize('index' , $this->role);
        $this->service->update($request, $id);

        return to_route('roles.index');
    }


    public function destroy($id)
    {
        $this->authorize('index' , $this->role);
        $this->repo->delete($id);

        return to_route('roles.index');
    }
}
