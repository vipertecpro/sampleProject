@extends('admin.layouts.appAuth')

@section('page_content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h1>Create Plugins</h1>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    {!!
                                        Form::open([
                                            'route'  => 'uploadPlugins',
                                        ])
                                    !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
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
