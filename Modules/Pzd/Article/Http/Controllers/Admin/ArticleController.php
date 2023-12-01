<?php

namespace Pzd\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pzd\Article\Http\Requests\ArticleRequest;
use Pzd\Article\Models\Article;
use Pzd\Article\Repositories\ArticleRepo;
use Pzd\Article\Services\ArticleService;
use Pzd\Category\Repositories\CategoryRepo;
use Pzd\Share\Repositories\ShareRepo;
use Pzd\Share\Services\ShareService;

class ArticleController extends Controller
{

    private string $class = Article::class;
    public function __construct(public ArticleRepo $repo , public ArticleService $service)
    {
    }

    public function index()
    {
        $this->authorize('index' , $this->class);
        $articles = $this->repo->index()->paginate(10);

        return view('Article::Admin.index' , compact('articles'));
    }


    public function create(CategoryRepo $categoryRepo)
    {
        $this->authorize('index' , $this->class);
        $categories = $categoryRepo->getActiveCategories()->get();
        return view('Article::Admin.create', compact('categories'));
    }


    public function store(ArticleRequest $request)
    {
        $this->authorize('index' , $this->class);
        [$imageName , $imagePath] =  ShareService::uploadImage($request->file('image'));

       $this->service->store($request, auth()->id(),$imageName , $imagePath);
        ShareRepo::successAlert();
       return to_route('articles.index');
    }



    public function edit($id, CategoryRepo $categoryRepo)
    {
        $this->authorize('index' , $this->class);
        $article = $this->repo->findById($id);
        $categories = $categoryRepo->getActiveCategories()->get();


        return view('Article::Admin.edit' , compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->authorize('index' , $this->class);
        $article = $this->repo->findById($id);

        if($request->file('image'))
        {
            [$imageName , $imagePath] =  ShareService::uploadImage($request->file('image'));
        }
        else{
            $imageName = $article->imageName;
            $imagePath = $article->imagePath;
        }


        $this->service->update($request, $id,$imageName , $imagePath);
        ShareRepo::successAlert();

       return to_route('articles.index');

    }


    public function destroy($id)
    {
        $this->authorize('index' , $this->class);
        $article = $this->repo->findById($id);
        ShareService::deleteImage($article);
        ShareRepo::successAlert();
        $this->repo->delete($id);
       return to_route('articles.index');
    }
}
