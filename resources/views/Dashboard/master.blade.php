<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Dashboard.layouts.head')
</head>
<body>

@include('Dashboard.layouts.preloader')

<div id="main-wrapper">
    @include('Dashboard.layouts.header')

    @include('Dashboard.layouts.Sidebar')

    @yield('page_header')


        <div class="container-fluid">
            @yield('content')
        </div>

        @include('Dashboard.layouts.footer')
    </div>
</div>
@include('Dashboard.layouts.footerjs')
</body>
</html>
