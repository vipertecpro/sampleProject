<div class="row">
    <div class="col-sm-3">
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-left-home-tab" data-toggle="pill" href="#v-pills-left-home" role="tab" aria-controls="v-pills-left-home" aria-selected="true">
                <i class="fas fa-home mr-1"></i> Home Page
            </a>
            <a class="nav-link" id="v-pills-left-setting-tab" data-toggle="pill" href="#v-pills-left-setting" role="tab" aria-controls="v-pills-left-setting" aria-selected="false">
                <i class="fas fa-cog mr-1"></i> Blogs
            </a>
            <a class="nav-link" id="v-pills-left-profile-tab" data-toggle="pill" href="#v-pills-left-profile" role="tab" aria-controls="v-pills-left-profile" aria-selected="false">
                <i class="fas fa-user mr-1"></i> Header
            </a>
            <a class="nav-link" id="v-pills-left-messages-tab" data-toggle="pill" href="#v-pills-left-messages" role="tab" aria-controls="v-pills-left-messages" aria-selected="false">
                <i class="far fa-envelope mr-1"></i> Footer
            </a>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="tab-content mt-4 mt-sm-0">
            <div class="tab-pane fade show active" id="v-pills-left-home" role="tabpanel" aria-labelledby="v-pills-left-home-tab">
                <div class="form-group">
                   {!! Form::label('headerImageUrl','Header Image') !!}
                   <div class="imgPreview">
                       <img src="{{ @$data['formData']['text']['headerImageUrl'] }}" class="img-fluid">
                   </div>
                   {!! Form::text('text[headerImageUrl]',null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('headerText','Header Text') !!}
                    {!! Form::text('text[headerText]',null,['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-left-profile" role="tabpanel" aria-labelledby="v-pills-left-profile-tab">

            </div>
            <div class="tab-pane fade" id="v-pills-left-setting" role="tabpanel" aria-labelledby="v-pills-left-setting-tab">
            </div>

            <div class="tab-pane fade" id="v-pills-left-messages" role="tabpanel" aria-labelledby="v-pills-left-messages-tab">
                <div class="form-group">
                    {!! Form::label('footerCopyright','Copyright Text') !!}
                    {!! Form::text('text[footerCopyright]',null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
