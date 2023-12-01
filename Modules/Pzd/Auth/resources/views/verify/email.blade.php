@extends('Auth::layouts.master')

@section('title' , 'تایید ایمیل کاربر')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            @include('Auth::section.logo')
            @if(session()->has('message'))
                <p class="text-success text-center">{{session()->get('message')}}</p>
            @endif
            <div class="card text-center">
                  <div class="card-body p-4">

                    <div class="mb-4">
                        <h4 class="text-uppercase mt-0">تایید ایمیل</h4>
                    </div>
                    <img src="{{asset('admin/images/mail_confirm.png')}}" alt="img" width="86" class="mx-auto d-block" />

                    <p class="text-muted font-14 mt-2"> یک ایمیل به
                        <b>
                            {{auth()->user()->email}}
                        </b> ارسال شده است. لطفا روی لینک موجود در ایمیل کلیک کنید.

                    </p>
                    <form action="{{route('verify.resend')}}" method="POST" id="FormVerifyEmail">
                        @csrf
                    </form>
                    <a onclick="event.preventDefault();document.getElementById('FormVerifyEmail').submit();"   class="btn btn-block btn-pink waves-effect waves-light mt-3 text-white">
                        ارسال مجدد لینک تایید به ایمیل کاربر
                    </a>


                </div>
            </div>

        </div>
    </div>

@endsection
