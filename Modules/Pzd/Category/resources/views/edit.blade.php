@extends('Panel::layouts.master')

@section('title' , 'ویرایش دسته بندی ' . $category->title)


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card-box">

                    <h4 class="header-title mt-0 mb-3">ویرایش دسته بندی   {{$category->title}} </h4>

                    <form method="POST" action="{{route('categories.update', $category->id)}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" value="id" name="{{$category->id}}">
                        <div class="form-group">
                            <label for="userName">عنوان دسته بندی *</label>
                            <input  type="text" name="title"  value="{{$category->title}}"
                                    placeholder="نام دسته بندیی را وارد کنید" class="form-control @error('title') is-invalid @enderror" id="userName">
                            @error('title')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userName">وضعیت دسته بندی *</label>
                            <select  type="text" name="status"
                                     class="form-control @error('status') is-invalid @enderror" >
                                @foreach(\Pzd\Category\Models\Category::$statuses as $status)
                                    <option  value="{{$status}}" @if($category->status == $status)selected @endif>@lang($status)</option>
                                @endforeach

                            </select>
                            @error('status')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userName">زیر دسته</label>
                            <select  type="text" name="parent_id"
                                     class="form-control @error('parent_id') is-invalid @enderror" id="userName">
                                <option value="" selected>زیر دسته دسته بندی را وارد کنید</option>
                             @foreach($categories as $cat)
                                    <option value="{{$cat->id}}"
                                         @if($cat->id == $category->parent_id) selected @endif
                                    >
                                        {{$cat->title}}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userName">توضیحات دسته بندی </label>
                            <input  type="text" name="description"  value="{{$category->description}}"
                                    placeholder="نام دسته بندیی را وارد کنید" class="form-control @error('description') is-invalid @enderror" id="userName">
                            @error('description')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userName">کلمات کلیدی دسته بندی </label>
                            <input  type="text" name="keywords" parsley-trigger="change" value="{{$category->keywords}}"
                                    placeholder="نام دسته بندیی را وارد کنید" class="form-control @error('keywords') is-invalid @enderror" id="userName">
                            @error('keywords')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>











                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit"> ویرایش</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
