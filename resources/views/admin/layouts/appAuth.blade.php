<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-admin-panel.includes.head />
<body data-topbar="colored">
    <div id="layout-wrapper">
        <x-admin-panel.includes.header />
        <x-admin-panel.includes.left-side-bar />
        <div class="main-content">
            <div class="page-content">
                <x-admin-panel.includes.page-title-box :data="$data"/>
                @yield('page_content')
            </div>
            <x-admin-panel.includes.footer />
        </div>
    </div>
    <x-admin-panel.includes.right-side-bar />
    <div class="rightbar-overlay"></div>
    <x-admin-panel.includes.scripts />
</body>
</html>
