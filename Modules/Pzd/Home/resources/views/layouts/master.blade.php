
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('Home::section.meta')
        <title>@yield("title") | {{config('app.name')}}</title>
    @include('Home::section.css')
</head>

<body>

      @include('Home::section.preloader')  {{--preloader--}}
        <div class="main-wrap">
            @include('Home::section.sidebar')  {{--sidebar--}}
            @include('Home::section.header')   {{--header--}}
            @yield('content') {{--main--}}
            @include('Home::section.footer') {{--footer--}}
        </div>
      @include('Home::section.js')
 </body>

</html>
