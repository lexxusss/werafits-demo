
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('admin.layouts.includes.head')

<body>
    <div id="app">
        @include('admin.layouts.includes.header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('admin.layouts.includes.footer')
</body>
</html>
