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
                                    <div class="btn-group btn-group-sm float-right mb-1" role="group">
                                        @if($data['pageType'] === 'category')
                                            <a href="{{ $data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Category">
                                                <i class="uil uil-pen"></i> Create Category
                                            </a>
                                        @elseif($data['pageType'] === 'tag')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Tag">
                                                <i class="uil uil-pen"></i> Create Tag
                                            </a>
                                        @elseif($data['pageType'] === 'user')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Tag">
                                                <i class="uil uil-pen"></i> Create User
                                            </a>
                                        @endif
                                    </div>
                                    {!! $data['pageData']->table() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.plugins',['plugin' => ['name' => 'dataTables']])
@endsection
