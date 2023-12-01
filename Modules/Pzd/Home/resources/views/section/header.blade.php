<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="{{route('home.index')}}">
                            <img class="logo-img d-inline" src="{{asset('assets/imgs/logo.svg')}}" alt="logo main page">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="{{route('home.index')}}">
                            <img class="logo-img d-inline" src="{{asset('assets/imgs/logo.svg')}}" alt="logo main page">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="{{route('home.index')}}">
                            <img class="logo-img d-inline" src="{{asset('assets/imgs/favicon.svg')}}" alt="logo main page">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <!-- Main-menu -->
                    <div class="main-nav text-right float-lg-right float-md-left">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="{{route('home.index')}}">صفحه اصلی</a></li>
                            <li class="cat-item cat-item-3"><a href="#">مقالات</a></li>
                            <li class="cat-item cat-item-4"><a href="{{route('users.authors')}}">نویسندگان </a></li>
                            <li class="cat-item cat-item-5"><a href="#">دسته بندی ها</a></li>
                            <li class="cat-item cat-item-6"><a href="#">ویدیو</a></li>
                            <li class="cat-item cat-item-7"><a href="#"> تماس با ما</a></li>


                        </ul>
                        <nav>
                            <ul class="main-menu d-none d-lg-inline">
                                <li>
                                    <a href="{{route('home.index')}}">
                                        صفحه اصلی
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('articles.home')}}">
                                       مقالات
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('users.authors')}}">
                                        نویسندگان
                                    </a>
                                </li>

                                <li class="mega-menu-item ">
                                    <a href="#">
                                        دسته بندی ها
                                    </a>
                                    <div class="sub-mega-menu sub-menu-list row text-muted font-small ">
                                         @foreach($categories->chunk(7) as $category)
                                                <ul class="col-md-2">
                                                   @foreach($category as $cat)
                                                        <li>
                                                            <a target="_blank" href="{{ $cat->path() }}">
                                                                {{\Illuminate\Support\Str::limit($cat->title , 17)}}
                                                                </a>
                                                        </li>
                                                   @endforeach
                                                </ul>
                                         @endforeach
                                    </div>
                                </li>

                                <li>
                                    <a href="category-metro.html">
                                                <span class="ml-15">
                                                    <ion-icon name="film-outline"></ion-icon>
                                                </span>
                                        ویدیو
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.create">
                                                <span class="ml-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>  {{--TODO--}}
                                                </span>
                                        تماس با ما
                                    </a>
                                </li>

                               @auth
                                    <li>
                                        <a href="{{route('profile')}}">
                                                    <span class="ml-15">
                                                        <ion-icon name="mail-unread-outline"></ion-icon>
                                                    </span>
                                            پروفایل
                                        </a>

                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                                    <span class="ml-15">
                                                        <ion-icon name="mail-unread-outline"></ion-icon>
                                                    </span>
                                            خروج
                                        </a>

                                    </li>
                                @endauth

                                 @guest
                                        <li>
                                            <a href="{{route('login')}}">
                                                    <span class="ml-15">
                                                        <ion-icon name="mail-unread-outline"></ion-icon>
                                                    </span>
                                                ورود
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{route('register')}}">
                                                    <span class="ml-15">
                                                        <ion-icon name="mail-unread-outline"></ion-icon>
                                                    </span>
                                                ثبت نام
                                            </a>
                                        </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                    <!-- Search -->
                    <form action="#" method="get" class="search-form d-lg-inline float-left position-relative ml-30 d-none">
                        <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
