@extends('Auth::layouts.master')

@section('title' , 'بازیابی رمز عبور')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            @include('Auth::section.logo')
            @if(session()->has('message'))
                <p class="text-success text-center">{{ session()->get('message') }}</p>
            @endif
            @error('error')
                 <p class="text-danger text-center">
                     {{$message}}
                 </p>
            @enderror
            <div class="card">


                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="text-uppercase mt-0 mb-3">بازنشانی رمز عبور</h4>
                        <p class="text-muted mb-0 font-13">ایمیل خود را وارد کنید. ما راهنمای بازنشانی رمز عبور را برای شما ارسال می کنیم.  </p>
                    </div>

                    <form action="{{route('password.resend.email')}}" method="POST">
                      @csrf
                        <div class="form-group mb-3">
                            <label for="emailaddress">ایمیل</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                   id="emailaddress" placeholder="ایمیل خود را وارد کنید">
                            @error('email')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> بازنشانی رمز عبور </button>
                        </div>

                    </form>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">بازگشت به <a href="{{route('login')}}" class="text-dark ml-1"><b>صفحه ورود</b></a></p>
                </div>
            </div>


        </div>
    </div>

@endsection
