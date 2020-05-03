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
                                        @if($data['pageType'] === 'user')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create User">
                                                <i class="uil uil-pen"></i> Create User
                                            </a>
                                        @elseif($data['pageType'] === 'role')
                                            <a href="{{ $data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Role">
                                                <i class="uil uil-pen"></i> Create Role
                                            </a>
                                        @elseif($data['pageType'] === 'permission')
                                            <a href="{{ $data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Permission">
                                                <i class="uil uil-pen"></i> Create Permission
                                            </a>
                                        @elseif($data['pageType'] === 'category')
                                            <a href="{{ $data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Category">
                                                <i class="uil uil-pen"></i> Create Category
                                            </a>
                                        @elseif($data['pageType'] === 'tag')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Tag">
                                                <i class="uil uil-pen"></i> Create Tag
                                            </a>
                                        @elseif($data['pageType'] === 'post')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Blog">
                                                <i class="uil uil-pen"></i> Create Post
                                            </a>
                                        @elseif($data['pageType'] === 'product')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Product">
                                                <i class="uil uil-pen"></i> Create Product
                                            </a>
                                        @elseif($data['pageType'] === 'media')
                                            <a href="{{ @$data['createBtnUrl'] ?? 'javascript:void(0);' }}" class="btn btn-primary btn-sm" title="Create Media">
                                                <i class="uil uil-pen"></i> Create Media
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
    <x-admin-panel.includes.plugins :data="$data"/>
@endsection

@push('custom_page_css')
    @if(Route::currentRouteName() === 'admin.media.list')
        <link href="{{ adminAsset('css/mediaTable.css') }}" rel="stylesheet"/>
    @elseif(Route::currentRouteName() === 'admin.product.list')
        <link href="{{ adminAsset('css/productTable.css') }}" rel="stylesheet"/>
    @endif
@endpush

@push('custom_page_js')
    @if(Route::currentRouteName() === 'admin.media.list')
        <script src="{{ adminAsset('js/clipboard.min.js') }}" type="text/javascript"></script>
    @elseif(Route::currentRouteName() === 'admin.theme.list')
        <script src="{{ adminAsset('js/theme.js') }}" type="text/javascript"></script>
    @elseif(Route::currentRouteName() === 'admin.product.list')
    @endif
@endpush
