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
    <section class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $page_title }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('incidentTypes.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            @if ($incident_types)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incident_types as $incident_type)
                            <tr>
                                <td>{{ $incident_type->name }}</td>
                                <td>{{ $incident_type->description }}</td>
                                <td>
                                    <a href="{{ route('incidentTypes.edit', ['incidentType' => $incident_type->id]) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-wrench"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    No incident type found.
                </div>
            @endif
        </div>
    </section>
@endsection
