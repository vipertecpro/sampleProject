<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-admin-panel.includes.head :data="$data"/>
<body data-topbar="colored">
    <div id="layout-wrapper">
        <x-admin-panel.includes.header :data="$data"/>
        <x-admin-panel.includes.left-side-bar :data="$data"/>
        <div class="main-content">
            <div class="page-content">
                <x-admin-panel.includes.page-title-box :data="$data"/>
                @yield('page_content')
            </div>
            <x-admin-panel.includes.footer :data="$data"/>
        </div>
    </div>
    <x-admin-panel.includes.right-side-bar :data="$data"/>
    <div class="rightbar-overlay"></div>
    <x-admin-panel.includes.scripts :data="$data"/>
</body>
</html>
