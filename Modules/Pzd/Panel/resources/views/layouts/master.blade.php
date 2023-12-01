<!DOCTYPE html>
<html lang="en">

<head>

    @include('Panel::section.meta')
    <title>@yield('title') | {{config('app.name')}}</title>
    @include('Panel::section.css')

</head>

<body>

<div id="wrapper">

    @include('Panel::section.navbar')
    @include('Panel::section.side-bar')
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
        @include('Panel::section.footer')

    </div>
</div>

@include('Panel::section.js')
@include('sweetalert::alert')

</body>

</html>
