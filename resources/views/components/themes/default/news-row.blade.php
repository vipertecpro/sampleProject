<section id="news" class="section bg-light">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
            <div class="col-md-5 offset-md-1 text-md-right"><h6 class="text-gray my-0"><a href="{!! route('front.show',['blog']) !!}">View all news</a></h6></div>
        </div>
        <div class="mt-2 pt-2">
            <div class="row-news row">
                @forelse(@$attributes['data']['pageData']['news'] as $key)
                    <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
                        <figure class="position-relative">
                            <div class="position-relative">
                                <a href=""><img alt="" class="w-100 d-block" src="{!! publicAsset('img/news/640x520-1.jpg') !!}"></a>
                                <mark class="date">
                                    {!! $key->created_at->format('d.m.Y') !!}
                                </mark>
                            </div>
                            <figcaption class="text-justify">
                                <h5>
                                    <a href="{!! route('front.show',['blog',$key->slug]) !!}">
                                        {!! Str::of($key->title)->words(10) !!}
                                    </a>
                                </h5>
                                {!! Str::of($key->summary)->words(20) !!}
                            </figcaption>
                        </figure>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
