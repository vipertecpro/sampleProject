<div class="row">
    <div class="col-sm-3">
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="homePageTab-tab" data-toggle="pill" href="#homePageTab" role="tab" aria-controls="homePageTab" aria-selected="true">
                <i class="fas fa-home mr-1"></i> Home Page
            </a>
            <a class="nav-link" id="footerTab-tab" data-toggle="pill" href="#footerTab" role="tab" aria-controls="footerTab" aria-selected="false">
                <i class="far fa-copyright mr-1"></i> Footer
            </a>
            <a class="nav-link" id="socialLinksTab-tab" data-toggle="pill" href="#socialLinksTab" role="tab" aria-controls="socialLinksTab" aria-selected="false">
                <i class="far fa-share-square mr-1"></i> Social Links
            </a>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content mt-4 mt-sm-0">
            <div class="tab-pane fade show active" id="homePageTab" role="tabpanel" aria-labelledby="homePageTab-tab">
                <div class="form-group row">
                   {!! Form::label('headerImageUrl','Header Image',['class' => 'col-md-3 mt-3 pt-1']) !!}
                   {!! Form::text('text[headerImageUrl]','https://via.placeholder.com/3840x2160.png?text=Hello+World',['class' => 'form-control col-md-6 mt-3']) !!}
                    <div class="imgPreview col-md-3 text-center">
                        <a href="{{ @$data['formData']['text']['headerImageUrl'] }}" target="_blank">
                            <img src="{{ @$data['formData']['text']['headerImageUrl'] }}" width="100px" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['headerImageUrl']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('headerText','Header Text',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[headerText]','Hello World',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['headerText']</code></pre>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="footerTab" role="tabpanel" aria-labelledby="footerTab-tab">
                <div class="form-group row">
                    {!! Form::label('footerCopyright','Copyright Text',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[footerCopyright]','© 2020 your_domain.com All Rights Reserved',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['footerCopyright']</code></pre>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="socialLinksTab" role="tabpanel" aria-labelledby="socialLinksTab-tab">
                <div class="form-group row">
                    {!! Form::label('socialLinkFacebook','Facebook',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[socialLinks][facebook]','https://www.facebook.com/user_name',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['facebook']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkTwitter','Twitter',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[socialLinks][twitter]','https://twitter.com/user_name',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['twitter']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkLinkedIn','LinkedIn',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[socialLinks][linkedIn]','https://www.linkedin.com/user_name',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['linkedIn']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkInstagram','Instagram',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[socialLinks][instagram]','https://www.instagram.com/user_name',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['instagram']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkGithub','Github',['class' => 'col-md-3 pt-1']) !!}
                    {!! Form::text('text[socialLinks][github]','https://github.com/user_name',['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['github']</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
