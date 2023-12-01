@extends('Home::layouts.master')

@section('title' ,'صفحه اصلی')

@section('content')
    @if(session()->has('verify_email'))
        <p class="text-success text-center">{{session()->get('verify_email')}}</p>
    @endif
    <main class="position-relative">
        @include('Home::parts.vip_posts')
        <div class="container">
            @include('Home::parts.advs_top')
            <div class="row">
                @include('Home::parts.sidebar_right')
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        @include('Home::parts.new_posts')
                        @include('Home::parts.sidebar_left')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
