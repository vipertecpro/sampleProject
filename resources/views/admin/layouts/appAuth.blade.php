<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.includes.head')
<body data-topbar="colored">
    <div id="layout-wrapper">
        @include('admin.includes.header')
        @include('admin.includes.leftBar')
        <div class="main-content">
            <div class="page-content">
                @include('admin.includes.pageTitleBox')
                @yield('page_content')
            </div>
            @include('admin.includes.footer')
        </div>
    </div>
    @include('admin.includes.rightBar')

    <div class="rightbar-overlay"></div>
    @include('admin.includes.scripts')
</body>
</html>
