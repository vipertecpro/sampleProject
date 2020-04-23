<div class="row">
    <div class="col-sm-3">
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-left-home-tab" data-toggle="pill" href="#v-pills-left-home" role="tab" aria-controls="v-pills-left-home" aria-selected="true">
                <i class="fas fa-home mr-1"></i> Home Page
            </a>
            <a class="nav-link" id="v-pills-left-messages-tab" data-toggle="pill" href="#v-pills-left-messages" role="tab" aria-controls="v-pills-left-messages" aria-selected="false">
                <i class="far fa-copyright mr-1"></i> Footer
            </a>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content mt-4 mt-sm-0">
            <div class="tab-pane fade show active" id="v-pills-left-home" role="tabpanel" aria-labelledby="v-pills-left-home-tab">
                <div class="form-group row">
                   {!! Form::label('headerImageUrl','Header Image',['class' => 'col-md-3 mt-3']) !!}
                   {!! Form::text('text[headerImageUrl]',null,['class' => 'form-control col-md-6  mt-3']) !!}
                    <div class="imgPreview col-md-3 text-center">
                        <a href="{{ @$data['formData']['text']['headerImageUrl'] }}" target="_blank">
                            <img src="{{ @$data['formData']['text']['headerImageUrl'] }}" width="100px" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : @$data['formData']['text']['headerImageUrl']</code></pre>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('headerText','Header Text',['class' => 'col-md-3']) !!}
                    {!! Form::text('text[headerText]',null,['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : @$data['formData']['text']['headerText']</code></pre>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-left-messages" role="tabpanel" aria-labelledby="v-pills-left-messages-tab">
                <div class="form-group row">
                    {!! Form::label('footerCopyright','Copyright Text',['class' => 'col-md-3']) !!}
                    {!! Form::text('text[footerCopyright]',null,['class' => 'form-control col-md-9']) !!}
                    <div class="col-md-12 mt-2">
                        <pre><code>Usage : @$data['formData']['text']['footerCopyright']</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
