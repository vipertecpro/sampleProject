<!DOCTYPE html>
<html lang="en">
    <x-themes.head :data="$data"/>
<body data-spy="scroll" data-target=".navbar" data-offset="100">
    <div class="loader">
        <div class="loaders">
            <div class="l" id="l-1"><i></i></div>
            <div class="l" id="l-2"><i></i></div>
            <div class="l" id="l-3"><i></i></div>
            <div class="l" id="l-4"><i></i></div>
            <div class="l" id="l-5"><i></i></div>
            <div class="l" id="l-6"><i></i></div>
            <div class="l" id="l-7"><i></i></div>
            <div class="l" id="l-8"><i></i></div>
        </div>
    </div>
    <div class="bottom-arr scroll-top-arrow">
        <i class="las la-angle-up"></i>
    </div>
    <x-themes.header :data="$data"/>
    @yield('pageContents')
    <x-themes.contact-us :data="$data"/>
    <x-themes.footer :data="$data"/>
    <x-themes.scripts :data="$data"/>
</body>
</html>
