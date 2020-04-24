<nav id="navbar-desctop" class="navbar navbar-desctop">
    <div class="d-flex position-relative w-100">
        <a class="navbar-brand" href="{!! route('front.home') !!}">{!! env('APP_NAME') !!}</a>
        <ul class="navbar-nav-desctop mr-auto d-none d-lg-block">
            <li><a class="nav-link" href="{!! route('front.home') !!}">Home</a></li>
            <li><a class="nav-link" href="{!! route('front.show',['blog']) !!}">News</a></li>
        </ul>
        <ul class="social-icons mr-auto mr-lg-0 d-none d-sm-block">
            <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['twitter'] }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['linkedIn'] }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['instagram'] }}" target="_blank"> <i class="fa fa-instagram"></i></a></li>
        </ul>
        <button class="toggler d-lg-none ml-auto">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </button>
    </div>
</nav>
<nav id="navbar-mobile" class="navbar navbar-mobile d-lg-none">
    <i class="close fa fa-times" ></i>
    <ul class="social-icons mr-auto mr-lg-0">
        <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['facebook'] }}" target="_blank"><i class="logo-facebook"></i></a></li>
        <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['twitter'] }}" target="_blank"><i class="logo-twitter"></i></a></li>
        <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['linkedIn'] }}" target="_blank"><i class="logo-linkedin"></i></a></li>
        <li><a href="{{ @Request::get('themeComponents')['text']['socialLinks']['instagram'] }}" target="_blank"> <i class="logo-instagram"></i></a></li>
    </ul>
    <ul class="navbar-nav navbar-nav-mobile">
        <li><a class="nav-link" href="{!! route('front.home') !!}">Home</a></li>
        <li><a class="nav-link" href="{!! route('front.show',['blog']) !!}">News</a></li>
    </ul>
    <div class="navbar-mobile-footer">
        <p>© {!! date('Y').' '.env('APP_NAME') !!}. All Rights Reserved.</p>
    </div>
</nav>
