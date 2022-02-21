<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layout.head')
    @stack('addhead')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')
        @include('admin.layout.content')
        @include('admin.layout.controlSidebar')
        @include('admin.layout.footer')
    </div>
    @include('admin.layout.jsfooter')
    @stack('addfooter')
</body>
</html>
