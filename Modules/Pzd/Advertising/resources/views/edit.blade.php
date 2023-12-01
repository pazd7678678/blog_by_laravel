@extends('Panel::layouts.master')

@section('title', 'ویرایش تبلیغ ' .$advertising->title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش تبلیغ {{$advertising->title}}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('advertisings.update',$advertising->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{$advertising->id}}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{$advertising->title}}" id="title" name="title" >
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="link">لینک تبلیغ (اجباری نیست)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                                   value="{{$advertising->link }}" id="link" name="link">
                                            @error('link')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">لوکیشن تبلیغ</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('location') is-invalid @enderror" name="location">
                                                <option selected>توکیشن تبلیغ را وارد کنید...</option>
                                                @foreach (\Pzd\Advertising\Models\Advertising::$locations as $location)
                                                    <option value="{{ $location }}"@if($advertising->location == $location )selected @endif>@lang($location)</option>
                                                @endforeach
                                            </select>
                                            @error('location')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image">عکس</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                   id="image" name="image">
                                            @error('image')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group text-right mb-0">
                                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit"> ویرایش</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


