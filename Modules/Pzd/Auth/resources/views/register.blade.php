@extends('Auth::layouts.master')

@section('title','ثبت نام کاربر')



@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            @include('Auth::section.logo')
            <div class="card">

                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="text-uppercase mt-0">ثبت نام</h4>
                    </div>

                    <form method="POST" action="{{route('register.store')}}" >
                        @csrf
                        <div class="form-group">
                            <label for="name">نام و نام خانوادگی</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                 value="{{old('name')}}"  id="name" name="name" placeholder="نام خود را وارد کنید">
                            @error('name')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress"
                                 value="{{old('email')}}"   name="email" placeholder="ایمیل خود را وارد کنید">
                            @error('email')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">رمز عبور</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                   id="password" name="password" placeholder="رمز عبور خود را وارد کنید">
                            @error('password')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input @error('accept') is-invalid @enderror"
                                       value="1" name="accept" id="checkbox-signup">
                                <label class="custom-control-label" for="checkbox-signup">
                                    <a href="javascript: void(0);" class="text-dark">شرابط و قوانین را می پذیرم
                                    </a>
                                </label>
                                @error('accept')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> ثبت نام </button>
                        </div>

                    </form>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">حساب کاربری دارید؟  <a href="{{route('login')}}" class="text-dark ml-1">
                            <b>
                                وارد شوید
                            </b>
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
