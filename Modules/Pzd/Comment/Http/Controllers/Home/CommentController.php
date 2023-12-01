<?php

namespace Pzd\Comment\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Pzd\Comment\Http\Requests\CommentRequest;
use Pzd\Comment\Services\CommentService;
use Pzd\Share\Repositories\ShareRepo;

class CommentController extends Controller
{
    public function __construct(public CommentService  $service)
    {
    }

    public function store(CommentRequest $request)
    {
         $this->service->store($request);

         ShareRepo::successAlert();

         return back();
    }

}
