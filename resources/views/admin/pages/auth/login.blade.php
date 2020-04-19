@extends('admin.layouts.app')

@section('page_content')
    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="index.html" class="logo"><img src="{{ asset('admin/images/logo-light.png') }}" height="24" alt="logo"></a>
                        <h5 class="font-size-16 text-white-50 mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Sign in to continue to Xoric.</h5>
                                <form class="form-horizontal" action="index.html">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="userEmail">User Name</label>
                                                <input type="text" class="form-control" id="userEmail" name="userEmail">
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="userPass">Password</label>
                                                <input type="password" class="form-control" id="userPass" name="userPass">
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-md-right mt-3 mt-md-0">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
