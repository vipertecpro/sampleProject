@extends(Request::get('appThemeLayout'))
@section('pageContents')
    <main id="home" class="masthead jarallax" style="background-image:url({{ publicAsset('img/bg/personal.jpg') }});" id="content" role="main">
        <div class="opener">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <h1>Hey, I am {{ env('APP_NAME') }}.</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-themes.default-theme.news-row :data="$data"/>
@endsection
