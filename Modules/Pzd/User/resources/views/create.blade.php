@extends('Panel::layouts.master')

@section('title' , 'ایجاد کاربر جدید')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card-box">

                    <h4 class="header-title mt-0 mb-3">ایجاد کاربر جدید </h4>

                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="userName">نام و نام خانوادگی *</label>
                            <input  type="text" name="name" parsley-trigger="change" value="{{old('name')}}"
                            placeholder="نام کاربری را وارد کنید" class="form-control @error('name') is-invalid @enderror" id="userName">
                            @error('name')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">ایمیل *</label>
                            <input type="email" name="email" parsley-trigger="change" value="{{ old('email') }}"
                            placeholder="ایمیل را وارد کنید" class="form-control @error('email') is-invalid @enderror" id="emailAddress">
                            @error('email')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass1">رمز عبور *</label>
                            <input id="pass1" type="password" placeholder="رمز عبور" name="password"
                            class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>


                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">ثبت نام</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
