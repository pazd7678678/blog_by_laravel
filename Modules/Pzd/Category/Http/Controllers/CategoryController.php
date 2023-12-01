<?php

namespace Pzd\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Pzd\Category\Http\Requests\CategoryRequest;
use Pzd\Category\Models\Category;
use Pzd\Category\Repositories\CategoryRepo;
use Pzd\Category\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $service, public  CategoryRepo $repo , public  Category $category)
    {
    }

    public function index()
    {
        $this->authorize('index' , $this->category);
        $categories = $this->repo->index()->paginate(10);

        return view('Category::index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('index' , $this->category);
        $categories = $this->repo->index()->get();

        return view('Category::create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('index' , $this->category);
        $this->service->store($request);

        return to_route('categories.index');
    }




    public function edit($id)
    {
        $this->authorize('index' , $this->category);
        $category =  $this->repo->query()->where('id', $id)->first();
        $categories = $this->repo->index()->where('id', '!=', $category->id)->get();

        return view('Category::edit' , compact('category' , 'categories'));

    }


    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('index' , $this->category);
        $this->service->update($request , $id);

        return to_route('categories.index');
    }


    public function destroy($id)
    {
        $this->authorize('index' , $this->category);
        $this->repo->delete($id);

        return to_route('categories.index');
    }

    public function setStatus($id)
    {
        $this->authorize('index' , $this->category);
        $category = $this->repo->findById($id);

        if($category->status != 'active')
        {
            $this->repo->query()->where('id', $id)->update([
                'status' => 'active'
            ]);
        }
       if($category->status == 'active')
       {
           $this->repo->query()->where('id', $id)->update([
               'status' =>'inactive'
           ]);
       }
        return back();
    }
}
