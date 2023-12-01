<?php

namespace Pzd\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pzd\Role\Repositories\RoleRepo;
use Pzd\User\Http\Requests\AddRoleRequest;
use Pzd\User\Http\Requests\UserRequest;
use Pzd\User\Models\User;
use Pzd\User\Repositories\UserRepo;
use Pzd\User\Services\UserService;


class UserController extends Controller
{

    public function __construct(public UserRepo $repo , public UserService $service,public User $user)
    {
    }

    public function index()
    {
        $this->authorize('index' , $this->user);
        $users = $this->repo->index();
        return view('User::index' , compact('users'));
    }


    public function create()
    {
        $this->authorize('index' , $this->user);
        return view('User::create');
    }

    public function store(UserRequest $request)
    {
        $this->authorize('index' , $this->user);
        $this->service->store($request);

        return to_route('users.index');
    }



    public function edit($id)
    {
        $this->authorize('index' , $this->user);
        $user = $this->repo->findById($id);
        return view('User::edit' , compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->authorize('index' , $this->user);
        $this->service->update($request , $id);
        return to_route('users.index');
    }

    public function destroy($id)
    {
        $this->authorize('index' , $this->user);
        $this->repo->delete($id);

        return to_route('users.index');
    }
  public function addRole($userId , RoleRepo $roleRepo)
  {
      $this->authorize('index' , $this->user);
      $user = $this->repo->findById($userId);
      $roles = $roleRepo->index()->get();
      return view('User::add-roles' , compact('user', 'roles'));
  }
  public function storeRole(AddRoleRequest  $request,$userId)
  {
      $this->authorize('index' , $this->user);
      $user = $this->repo->findById($userId);

      $this->service->addRole($request->roles, $user);

      return to_route('users.index');
  }

  public function destroyRole($userId, $RoleId, RoleRepo $roleRepo)
      {
          $this->authorize('index' , $this->user);
          $user = $this->repo->findById($userId);
          $role = $roleRepo->findById($RoleId);

          $this->service->destroyRole($user,$role);

          return to_route('users.index');

      }
}
