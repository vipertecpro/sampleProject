@extends('admin.layouts.appAuth')

@section('page_content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-4">Permissions attached to this role</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <tbody>
                                        @forelse($data['formData']->permissions()->get() as $key)
                                            <tr>
                                                <th class="text-nowrap" scope="row">{!! $key->name !!}</th>
                                                <th class="text-nowrap" scope="row">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-sm btn-danger remove" title="Detach Permission">
                                                            <i class="uil uil-trash"></i>
                                                        </button>
                                                    </div>
                                                </th>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th class="text-nowrap text-center" scope="row">
                                                    No Permissions Attached Yet
                                                </th>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
