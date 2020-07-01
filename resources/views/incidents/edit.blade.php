@extends('layouts.dashboard')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('incidents.index') }}">Incidents</a>
        </li>

        <li class="breadcrumb-item active">
            {{ $page_title }}
        </li>
    </ul>
@endsection

@section('content')
    <section id="edit-form" class="mt-3 card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $page_title }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    {{ Form::open(['method' => 'DELETE', 'route' => 'incidents.destroy']) }}
                        <div class="form-group">
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                            {{ Form::hidden('id', $incident->id) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

            {{ Form::open(['method' => 'PATCH', 'route' => 'incidents.update']) }}
                @include('incidents.partials.form')
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Save Changes
                    </button>
                    {{ Form::hidden('id', $incident->id) }}
                </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection

@section('custom_js_footer')
    <script>
        $("#incident_date").datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });

        $('.btn-outline-danger').click(function()
        {
            let cDelete = confirm('Are you sure you want to delete this Incident?');
            if (cDelete === false)
            {
                return false;
            }
            return true;
        });
    </script>
@endsection
