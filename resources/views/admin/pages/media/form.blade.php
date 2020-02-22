@extends('admin.layouts.appAuth')

@section('page_content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!
                                        Form::model(@$data['formData'], [
                                            'route' => ['admin.media.storeUpdate', @$data['formData']->id],
                                            'id'    => 'mediaForm',
                                            'files' => true
                                        ])
                                    !!}
                                    <div class="form-group">
                                        {!!
                                                Form::file('file_upload', [
                                                    'class' => 'form-control',
                                                    'id'    => 'file_upload',
                                                    'route' => '',
                                                    'multiple'
                                                ])
                                        !!}
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" type="button">Submit</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_page_css')
@endsection

@section('custom_page_js')
    <script>

    </script>
@endsection
