<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    @include('layout.head')
    @stack('head_scripts')
    @stack('styles')
</head>

<body class="@stack('body-class')">
    @yield('content')

    @stack('scripts')
</body>
</html>