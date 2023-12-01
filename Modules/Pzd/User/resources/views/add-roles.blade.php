@extends('Panel::layouts.master')

@section('title' , 'اضافه کردن مقام به کاربر ' .  $user->name  )

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card-box">

                    <h4 class="header-title mt-0 mb-3">اضافه کردن مقام به کاربر </h4>

                    <form method="POST" action="{{route('users.store.role' , $user->id)}}">
                        @csrf


                        @foreach($roles as $role)
                            <div class="checkbox">
                                <input id="roles[{{$role->name}}]" class="@error('roles') is-invalid @enderror"
                                       type="checkbox" name="roles[{{$role->name}}]" value="{{$role->name}}">
                                <label for="roles[{{$role->name}}]">
                                    @lang($role->name)
                                </label>
                            </div>
                        @endforeach
                        @error('roles')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror

                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">اضافه کردن</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
