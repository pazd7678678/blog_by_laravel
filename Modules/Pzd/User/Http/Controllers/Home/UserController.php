<?php

namespace Pzd\User\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Pzd\Share\Repositories\ShareRepo;
use Pzd\User\Http\Requests\Home\ProfileUpdateRequest;
use Pzd\User\Repositories\Home\UserRepo;
use Pzd\User\Services\UserService;

class UserController extends Controller
{

    public function __construct(public UserRepo $userRepo)
    {
    }

    public function authors()
    {
        $authors = $this->userRepo->getAllAuthours()->paginate(50);
        return view('User::Home.authors', compact('authors'));
    }

    public function author($id)
    {
        $author = $this->userRepo->findAuthorById($id);
        return view('User::Home.author', compact('author'));
    }

    public function profile()
    {
        return view('User::Home.profile');

    }
    public function updateProfile(ProfileUpdateRequest $request,UserService $service)
    {
        $service->updateProfile($request, auth()->id());

        ShareRepo::successAlert();
        return back();
    }

}
