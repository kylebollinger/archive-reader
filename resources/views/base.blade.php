<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    @include('layout.head')
    <link rel="stylesheet" type="text/css" href="{{url('/dist/css/main.css')}}">
    @stack('head_scripts')
    @stack('styles')
    <script type="text/javascript" src="{{url('/dist/js/app.js')}}" defer></script>
</head>

<body class="@stack('body-class')">
    {{-- @include('layouts.header') --}}
    <main>
        @yield('content')
    </main>
    {{-- @include('layouts.footer') --}}
    @stack('scripts')
</body>
</html>