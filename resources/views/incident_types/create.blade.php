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
    <section class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $page_title }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0"></div>
            </div>
            {{ Form::open(['method' => 'POST', 'route' => 'incidentTypes.store']) }}
                @include('incident_types.partials.form')

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection
