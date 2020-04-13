@extends('layouts.dashboard')

@section('content')
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
                        <td><a href="{{ route('incidentTypes.edit', ['incidentType' => $incident_type->id]) }}" class="btn btn-outline-secondary">edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            No incident type found.
        </div>
    @endif
@endsection
