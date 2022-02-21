<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layout.head')
    @stack('addhead')
</head>
<body class="hold-transition login-page">
    @yield('content')
    @include('admin.layout.jsfooter')
    @stack('addfooter')
</body>
</html>
