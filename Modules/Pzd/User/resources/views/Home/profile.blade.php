@extends('Home::layouts.master')

@section('title', 'پروفایل کاربری ' . auth()->user()->name)

@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <div class="col-lg-8 col-md-12">
                    <div class="entry-main-content mt-50">
                        <h1 class="mt-30">بروزرسانی پروفایل کاربری</h1>
                        <hr class="wp-block-separator is-style-wide">
                        @if(count($errors) > 0)
                            <ul>
                            @foreach($error->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                            </ul>
                        @endif
                        <form class="form-contact comment_form" action="{{ route('profile.update') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                               type="text" placeholder="نام" value="{{ auth()->user()->name }}">
                                        @error('name')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                               type="email" placeholder="ایمیل" value="{{ auth()->user()->email }}">
                                        @error('email')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                               id="password" type="password" placeholder="رمز عبور">
                                        @error('password')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('telegram') is-invalid @enderror" name="telegram" id="telegram"
                                               type="text" placeholder="تلگرام" value="{{ auth()->user()->telegram }}">
                                        @error('telegram')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin"
                                               type="text" placeholder="لینکدین" value="{{ auth()->user()->linkedin }}">
                                        @error('linkedin')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter"
                                               type="text" placeholder="توییتر" value="{{ auth()->user()->twitter }}">
                                        @error('twitter')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram"
                                               type="text" placeholder="اینستاگرام" value="{{ auth()->user()->instagram }}">
                                        @error('instagram')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                                               type="file">
                                    </div>
                                    @error('image')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100 @error('bio') is-invalid @enderror"
                                                  name="bio" id="bio" cols="30" rows="9" placeholder="بیوگرافی">{{ auth()->user()->bio }}</textarea>
                                        @error('bio')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
