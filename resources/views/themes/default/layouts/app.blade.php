<!doctype html>
<html lang="en">
    <x-themes.head :data="$data"/>
<body>
    <div class="click-capture d-lg-none"></div>
    <x-themes.header :data="$data"/>
    @yield('pageContents')
    <x-themes.footer :data="$data"/>
    <x-themes.scripts :data="$data"/>
</body>
</html>
