@extends('layouts.dashboard')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $page_title }}
        </li>
    </ul>
@endsection

@section('content')
    <section id="search-form" class="mt-3 card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Search Incidents</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>

            {{ Form::open(['method' => 'GET', 'route' => 'incidents.index']) }}
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('user_id', 'Employee:') }}
                            {{ Form::select('user_id', ['' => '-- All Employees --']+$users, request()->user_id, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('incident_type_id', 'Incident Type:') }}
                            {{ Form::select('incident_type_id', ['' => '-- All Incidents --']+$incident_types, request()->incident_type_id, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Begin Search
                    </button>
                    <a class="btn btn-outline-secondary" href="{{ route('incidents.index') }}">
                        Clear Search
                    </a>
                </div>
            {{ Form::close() }}
        </div>
    </section>

    <section id="incidents" class="mt-3 card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $page_title }}</h1>
            </div>

            @if ($incidents->count())
                <nav id="pagination" class="align-items-center">
                    <p>Displaying {{ $incidents->firstItem() }} - {{ $incidents->lastItem() }} of {{ $incidents->total() }}</p>
                    {{ $incidents->appends(Request::except('page')) }}
                </nav>

                <table class="table table-bordered table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Action Taken</th>
                        <th>Employee Review Date</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidents as $incident)
                            <tr>
                                <td>{{ $incident->user->full_name }}</td>
                                <td>{{ $incident->incidentType->name }}</td>
                                <td>{{ $incident->incident_date }}</td>
                                <td>{{ $incident->description }}</td>
                                <td>{{ $incident->action_taken }}</td>
                                <td>{{ $incident->employee_reviewed_date }}</td>
                                <td>
                                    <a href="{{ route('incidents.edit', ['incident' => $incident->id]) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">No incident found.</div>
            @endif
        </div>
    </section>
@endsection
