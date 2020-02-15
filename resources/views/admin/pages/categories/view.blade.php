@extends('admin.layouts.appAuth')

@section('page_content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5>Welcome Back !</h5>
                                    <p class="text-muted">Xoric Dashboard</p>

                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>

                                <div class="col-5 ml-auto">
                                    <div>
                                        <img src="{{ asset('admin/assets/images/widget-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-4">View User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
