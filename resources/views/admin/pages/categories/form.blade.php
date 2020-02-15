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
                                                'route' => ['createUpdateRequest', @$data['formData']->id],
                                                'id'    => 'categoryForm'
                                            ])
                                    !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
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
