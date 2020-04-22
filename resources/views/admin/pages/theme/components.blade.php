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
                                    <h3>Default Theme Settings</h3>
                                    <hr>
                                </div>
                            </div>
                            {!! Form::model($data['formData'],[
                                    'id'    => 'themeComponent',
                                    'route' => 'admin.theme.component.update',
                                    'files' => true
                                ])
                            !!}
                                @include('themes.'.$data['themeInfo']->name.'.components',$data)
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
