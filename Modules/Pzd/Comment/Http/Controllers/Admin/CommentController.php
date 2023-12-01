<?php

namespace Pzd\Comment\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pzd\Comment\Repositories\CommentRepo;
use Pzd\Share\Repositories\ShareRepo;

class CommentController extends Controller
{

    public function __construct(public CommentRepo $repo)
    {
    }

    public function index()
    {
        $comments = $this->repo->index()->paginate(10);
       return view('Comment::Admin.index', compact('comments'));
    }

    public function changeStatus($id, $status)
    {
        $this->repo->changeStatus($id, $status);
        ShareRepo::successAlert();

        return to_route('comments.index');


    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        ShareRepo::successAlert();
        return to_route('comments.index');
    }


}
