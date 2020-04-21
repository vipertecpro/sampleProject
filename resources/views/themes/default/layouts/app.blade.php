<!doctype html>
<html lang="en">
    <x-themes.default-theme.head :data="$data"/>
<body>
    <div class="click-capture d-lg-none"></div>
    <x-themes.default-theme.header :data="$data"/>
    @yield('pageContents')
    <x-themes.default-theme.footer :data="$data"/>
    <x-themes.default-theme.scripts :data="$data"/>
</body>
</html>
