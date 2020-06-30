@extends('layouts.dashboard')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('incidentTypes.index') }}">Incident Types</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $page_title }}
        </li>
    </ul>
@endsection

@section('page_header_options')
    @if (!$has_incidents)
        <button type="submit" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-trash"></i>
        </button>
    @endif
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {{ Form::open() }}
                @include('incident_types.partials.form')
                <div class="form-group">
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
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
