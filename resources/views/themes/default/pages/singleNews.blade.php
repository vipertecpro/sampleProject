@extends(Request::get('appThemeLayout'))
@section('pageContents')
    <section id="news" class="section bg-light">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-8" data-aos="fade-up">
                    <h2 class="mb-3 mb-md-0">
                        {!! @$data['pageData']->title !!}
                    </h2>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <strong class="mb-3 mb-md-0  pull-right">
                        {!! @$data['pageData']->created_at->format('d.m.Y') !!}
                    </strong>
                </div>
            </div>
            <div class="mt-2 pt-2">
                <div class="row">
                    <div class="col-md-12 mt-4 text-justify">
                        <p><strong>Summary</strong></p>
                        <p>{!! @$data['pageData']->summary !!}</p>
                    </div>
                    <div class="col-md-12 mt-4 text-justify">
                        <p><strong>Description</strong></p>
                        <p>{!! @$data['pageData']->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
