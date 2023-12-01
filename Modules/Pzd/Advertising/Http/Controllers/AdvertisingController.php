<?php

namespace Pzd\Advertising\Http\Controllers;

use App\Http\Controllers\Controller;
use Pzd\Advertising\Http\Requests\AdvertisingRequest;
use Pzd\Advertising\Repositories\AdvertisingRepo;
use Pzd\Advertising\Services\AdvertisingService;
use Pzd\Share\Repositories\ShareRepo;
use Pzd\Share\Services\ShareService;

class AdvertisingController extends Controller
{

    public function __construct(public AdvertisingRepo $repo, public AdvertisingService $service)
    {
    }

    public function index()
    {
      $advertisings =  $this->repo->index()->paginate(10);

      return view('Advertising::index',compact('advertisings'));
    }


    public function create()
    {
        return view('Advertising::create');
    }


    public function store(AdvertisingRequest $request)
    {
       [$imageName , $imagePath] = ShareService::uploadImage($request->file('image'));
       $this->service->store($request,$imageName,$imagePath);

       ShareRepo::successAlert();
       return to_route('advertisings.index');

    }


    public function edit($id)
    {
       $advertising = $this->repo->findById($id);
        return view('Advertising::edit' , compact('advertising'));
    }


    public function update(AdvertisingRequest $request, $id)
    {

        if($request->file('image'))
        {
            [$imageName , $imagePath] = ShareService::uploadImage($request->file('image'));

        }else{
            $advertising = $this->repo->findById($id);

            $imageName = $advertising->imageName;
            $imagePath = $advertising->imagePath;
        }

        $this->service->update($request, $id , $imageName ,$imagePath);

        ShareRepo::successAlert();
        return to_route('advertisings.index');

    }

    public function destroy($id)
    {
        $advertising = $this->repo->findById($id);
        ShareService::deleteImage($advertising);
        $this->repo->delete($id);

        ShareRepo::successAlert();
        return to_route('advertisings.index');
    }
}
