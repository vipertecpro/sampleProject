<div class="row">
    <div class="col-sm-3">
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="topBar-tab" data-toggle="pill" href="#topBar" role="tab" aria-controls="topBar" aria-selected="true">
                <i class="fas fa-home mr-1"></i> Top Bar
            </a>
            <a class="nav-link" id="contactUsInfo-tab" data-toggle="pill" href="#contactUsInfo" role="tab" aria-controls="contactUsInfo" aria-selected="false">
                <i class="far fa-copyright mr-1"></i> Contact Us Info
            </a>
            <a class="nav-link" id="socialLinksTab-tab" data-toggle="pill" href="#socialLinksTab" role="tab" aria-controls="socialLinksTab" aria-selected="false">
                <i class="far fa-share-square mr-1"></i> Social Links
            </a>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content mt-4 mt-sm-0">
            <div class="tab-pane fade show active" id="topBar" role="tabpanel" aria-labelledby="topBar-tab">
                <div class="form-group row">
                    {!! Form::label('leftTopBarText','Left Top Bar Text',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[leftTopBarText]','We create a brand that stands and truly reflects your business.',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['leftTopBarText']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="form-group row">
                    {!! Form::label('rightTopBarPhoneNumber','Phone Number',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[rightTopBarPhoneNumber]','+(34)609 331754',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['rightTopBarPhoneNumber']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="form-group row">
                    {!! Form::label('rightTopBarEmailAddress','Email Address',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[rightTopBarEmailAddress]','email@website.com',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['rightTopBarEmailAddress']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="form-group row">
                    {!! Form::label('rightTopBarFacebookLink','Facebook Link',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[rightTopBarFacebookLink]','https://www.facebook.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['rightTopBarFacebookLink']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="form-group row">
                    {!! Form::label('rightTopBarTwitterLink','Twitter Link',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[rightTopBarTwitterLink]','https://www.twitter.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['rightTopBarTwitterLink']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="form-group row">
                    {!! Form::label('rightTopBarInstagramLink','Instagram Link',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[rightTopBarInstagramLink]','https://www.instagram.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['rightTopBarInstagramLink']</code></pre>
                        </div>
                    </button>
                </div>
            </div>
            <div class="tab-pane fade" id="contactUsInfo" role="tabpanel" aria-labelledby="contactUsInfo-tab">
                <div class="form-group row">
                    {!! Form::label('contactUsInfoText','Contact Us Info',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[contactUsInfoText]','Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard. ',['class' => 'form-control col-md-7']) !!}
                    <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                        <i class="far fa-lightbulb"></i>
                        <div class="popover-content">
                            <h6>Component Usage </h6>
                            <pre><code>Usage : Request::get('themeComponents')['text']['contactUsInfoText']</code></pre>
                        </div>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            {!! Form::label('contactUsCol1Heading','Heading',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol1Heading]','United States',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol1Heading']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol1PhoneNumber','Phone Number',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol1PhoneNumber]','+(34) 609 33 17 54',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol1PhoneNumber']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol1EmailAddress','Email Address',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol1EmailAddress]','+(34) 609 33 17 54',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol1EmailAddress']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol1Address','Address',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::textarea('text[contactUsCol1Address]','201 Oak Street Building 27 Manchester, USA',['class' => 'form-control col-md-11', 'rows' => 2]) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol1Address']</code></pre>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            {!! Form::label('contactUsCol2Heading','Heading',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol2Heading]','United States',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol2Heading']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol2PhoneNumber','Phone Number',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol2PhoneNumber]','+(34) 609 33 17 54',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol2PhoneNumber']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol2EmailAddress','Email Address',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::text('text[contactUsCol2EmailAddress]','+(34) 609 33 17 54',['class' => 'form-control col-md-11']) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol2EmailAddress']</code></pre>
                                </div>
                            </button>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contactUsCol2Address','Address',['class' => 'col-md-12 pt-1']) !!}
                            {!! Form::textarea('text[contactUsCol2Address]','201 Oak Street Building 27 Manchester, USA',['class' => 'form-control col-md-11', 'rows' => 2]) !!}
                            <button type="button" class="col-md-1 btn btn-info btn-sm waves-effect waves-light btn-popover" data-toggle="popover-click" data-trigger="focus">
                                <i class="far fa-lightbulb"></i>
                                <div class="popover-content">
                                    <h6>Component Usage </h6>
                                    <pre><code>Usage : Request::get('themeComponents')['text']['contactUsCol2Address']</code></pre>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="socialLinksTab" role="tabpanel" aria-labelledby="socialLinksTab-tab">
                <div class="form-group row">
                    {!! Form::label('socialLinkFacebook','Facebook',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[socialLinks][facebook]','https://www.facebook.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['facebook']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkTwitter','Twitter',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[socialLinks][twitter]','https://twitter.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['twitter']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkLinkedIn','LinkedIn',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[socialLinks][linkedIn]','https://www.linkedin.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['linkedIn']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkInstagram','Instagram',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[socialLinks][instagram]','https://www.instagram.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['instagram']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('socialLinkGithub','Github',['class' => 'col-md-4 pt-1']) !!}
                    {!! Form::text('text[socialLinks][github]','https://github.com/user_name',['class' => 'form-control col-md-7']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : Request::get('themeComponents')['text']['socialLinks']['github']</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
