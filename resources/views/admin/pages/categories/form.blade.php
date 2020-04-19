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
                                            'route' => ['admin.category.storeUpdate', @$data['formData']->id],
                                            'id'    => 'categoryForm'
                                        ])
                                    !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('parent_id', 'Parent Category', ['class' => 'control-label']) !!}
                                        {!! Form::select('parent_id', @$data['getAllParentList'], null, [
                                                    'class'         => 'form-control',
                                                    'placeholder'   => 'Please select option'
                                            ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" type="submit">Submit</button>
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
