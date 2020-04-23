@extends(Request::get('appThemeLayout'))
@section('pageContents')
    <main id="home" class="masthead jarallax" style="background-image:url({{ Request::get('themeComponents')['text']['headerImageUrl'] }});" id="content" role="main">
        <div class="opener">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <h1>{!! Request::get('themeComponents')['text']['headerText'] !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-themes.news-row :data="$data"/>
@endsection
