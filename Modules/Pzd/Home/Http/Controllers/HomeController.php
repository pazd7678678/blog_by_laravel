<?php

namespace Pzd\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Pzd\Comment\Repositories\CommentRepo;
use Pzd\Home\Repositories\HomeRepo;

class HomeController extends Controller
{
    public function index(HomeRepo $homeRepo,CommentRepo $commentRepo)
    {

        $latestComment = $commentRepo->getLatestComments()->get();
        return view('Home::index' , compact('homeRepo','latestComment'));
    }
}
