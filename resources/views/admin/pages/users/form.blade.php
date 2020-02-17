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
                                            'route' => ['admin.user.storeUpdate', @$data['formData']->id],
                                            'id'    => 'userForm'
                                        ])
                                    !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
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
