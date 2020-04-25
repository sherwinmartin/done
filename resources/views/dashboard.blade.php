@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <h3 class="card-title">{{ $company->name }}</h3>
                        @if (Auth::User()->role_id < 4)
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <h3 class="card-title">Company Users</h3>
                        @if (Auth::User()->role_id < 4)
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Enabled?</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($company_users as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->is_enabled }}</td>
                                    <td>
                                        @if (Auth::User()->role_id < 4)
                                            <a href="" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
