@extends('layouts.dashboard')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('incidentTypes.index') }}">Incident Types</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $page_title }}
        </li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $page_title }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @if (!$has_incidents)
                        {{ Form::open(['method' => 'DELETE', 'route' => 'incidentTypes.destroy']) }}
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            {{ Form::hidden('id', $incident_type->id) }}
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
            {{ Form::open(['method' => 'PATCH', 'route' => 'incidentTypes.update']) }}
                @include('incident_types.partials.form')
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Save Changes
                    </button>
                    {{ Form::hidden('id', $incident_type->id) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('custom_js_footer')
    <script>
        $('.btn-outline-danger').click(function()
        {
            let cDelete = confirm('Are you sure you want to delete this Incident Type?');
            if (cDelete === false)
            {
                return false;
            }
            return true;
        });
    </script>
@endsection
