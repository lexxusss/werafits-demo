<!doctype html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
    @include('frontend.includes.header')

    @yield('content')

    @include('frontend.includes.footer')
</body>

</html>