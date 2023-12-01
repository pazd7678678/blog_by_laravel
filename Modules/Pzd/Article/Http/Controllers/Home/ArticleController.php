<?php

namespace Pzd\Article\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Pzd\Article\Repositories\ArticleRepo;
use Pzd\Comment\Repositories\CommentRepo;
use Pzd\Home\Repositories\HomeRepo;

class ArticleController extends Controller
{
    public function __construct(public ArticleRepo $articleRepo,public CommentRepo $commentRepo)
    {
    }

    public function home()
    {
        $articles = $this->articleRepo->home()->paginate(6);
        $viewsArticles = $this->articleRepo->getArticlesByView()->limit(5)->get();
        $latestComment = $this->commentRepo->getLatestComments()->get();

        return view('Article::Home.home', compact('articles', 'viewsArticles','latestComment'));
    }

    public function details($slug , HomeRepo $homeRepo)
    {
        $article = $this->articleRepo->findBySlug($slug);
        if(is_null($article)) abort(404);
        $relatedArticles = $this->articleRepo->getRelatedPosts($article)->get();
        $latestComment = $this->commentRepo->getLatestComments()->get();

        return view('Article::Home.details' , compact('article', 'relatedArticles', 'homeRepo','latestComment'));
    }
}
