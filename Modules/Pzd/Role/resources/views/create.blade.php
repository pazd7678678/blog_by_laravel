@extends('Panel::layouts.master')

@section('title' , 'ایجاد مقام جدید')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card-box">

                    <h4 class="header-title mt-0 mb-3">ایجاد مقام جدید </h4>
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>

                    @endif

                    <form method="POST" action="{{route('roles.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="userName">عنوان مقام *</label>
                            <input  type="text" name="name"  value="{{old('name')}}"
                            placeholder="نام مقام را وارد کنید" class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        @foreach($permissions as $permission)
                            <div class="checkbox">
                                <input id="permissions[{{$permission->name}}]" class="@error('permissions') is-invalid @enderror"
                                type="checkbox" name="permissions[{{$permission->name}}]" value="{{$permission->name}}">
                                <label for="permissions[{{$permission->name}}]">
                                   @lang($permission->name)
                                </label>
                            </div>
                        @endforeach
                        @error('permissions')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror






                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit"> ایجاد</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
