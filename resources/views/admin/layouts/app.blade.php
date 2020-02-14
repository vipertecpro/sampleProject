<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.includes.head')
<body class="bg-primary bg-pattern">
@yield('page_content')
@include('admin.includes.scripts')
</body>
</html>
