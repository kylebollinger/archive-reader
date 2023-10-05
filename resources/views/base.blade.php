<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    @include('layouts.head')
    <link rel="stylesheet" type="text/css" href="{{url('/dist/css/main.css')}}">
    @stack('styles')
    <script type="text/javascript" src="{{url('/dist/js/app.js')}}" defer></script>
    @stack('head_scripts')
</head>

<body class="@stack('body-class')">
    @include('layouts.header')
    <main>
        @yield('content')
    </main>
    {{-- @include('layouts.footer') --}}
    @stack('scripts')
</body>
</html>