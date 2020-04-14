<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-admin-panel.includes.head :data="$data"/>
<body class="bg-primary bg-pattern">
@yield('page_content')
<x-admin-panel.includes.scripts :data="$data"/>
</body>
</html>
