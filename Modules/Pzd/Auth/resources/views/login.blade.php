@extends('Auth::layouts.master')

@section('title' , 'ورود کاربر')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
           @include('Auth::section.logo')
                @error('problem_data')
                    <p class="text-danger text-center">{{ $message  }}</p>
                @enderror
            <div class="card">

                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="text-uppercase mt-0"> ورود به حساب کاربری</h4>
                    </div>
                    @if(session()->has('success_reset_password'))
                        <p class="text-success text-center">{{session()->get('success_reset_password')}}</p>
                    @endif

                    <form method="POST" action="{{route('login.store')}}">
                      @csrf
                        <div class="form-group mb-3">
                            <label for="emailaddress">ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror"
                                   type="email" id="emailaddress" name="email" placeholder="ایمیل خود را وارد کنید">
                            @error('email')
                                 <p class="text-danger">
                                     {{$message}}
                                 </p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">رمز عبور</label>
                            <input class="form-control @error('password') is-invalid @enderror"
                                   type="password" name="password" id="password" placeholder="رمز عبور خود را وارد کنید">
                            @error('password')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                <label class="custom-control-label" for="checkbox-signin">من را به خاطر بسپار</label>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> ورود </button>
                        </div>

                    </form>

                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p> <a href="{{route('password.resend')}}" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>رمز عبور خود را فراموش کرده اید؟</a></p>
                    <p class="text-muted">حساب کاربری ندارید؟ <a href="{{route('register')}}" class="text-dark ml-1"><b>ثبت نام کنید</b></a></p>
                </div>
            </div>


        </div>
    </div>
@endsection
