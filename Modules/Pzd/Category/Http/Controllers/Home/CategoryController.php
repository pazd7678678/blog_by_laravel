<?php

namespace Pzd\Category\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Pzd\Article\Repositories\ArticleRepo;
use Pzd\Category\Repositories\CategoryRepo;

class CategoryController extends Controller
{
    public function detail($slug,CategoryRepo $repo,ArticleRepo $articleRepo)
    {
        $category = $repo->findCategoryBySlug($slug);
        if(is_null($category)) abort(404);
        $articles = $articleRepo->getArticlesByCategoryId($category->id)->paginate(12);
        return view('Category::Home.detail',compact('category','articles'));
    }

}
