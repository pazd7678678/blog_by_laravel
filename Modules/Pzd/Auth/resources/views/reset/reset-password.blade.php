@extends('Auth::layouts.master')

@section('title' , 'رمز عبور جدید')


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
                        <h4 class="text-uppercase mt-0">ایجاد رمز عبور جدید</h4>
                    </div>

                    @if(session()->has('error'))
                        <p class="text-danger text-center">{{ session()->get('error') }}</p>
                    @endif

                    <form method="POST" action="{{route('password.reset.change')}}">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="form-group mb-3">
                            <label for="emailaddress">ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror "
                                   type="email" id="emailaddress" value="{{$email}}" name="email" placeholder="ایمیل خود را وارد کنید">
                         @error('email')
                            <p class="text-danger">{{$message}}</p>
                         @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="password">رمز عبور</label>
                            <input class="form-control @error('password') is-invalid @enderror "
                                   type="password" name="password"  id="password" placeholder="رمز عبور خود را وارد کنید">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">تایید رمز عبور</label>
                            <input class="form-control"
                                   type="password" name="password-confirmation" id="password_confirmation"
                                   placeholder="تایید رمز عبور خود را وارد کنید ">
                        </div>



                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> ذخیره </button>
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
