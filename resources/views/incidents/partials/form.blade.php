<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="form-group">
            {{ Form::label('user_id', 'Employee:') }}
            {{ Form::select('user_id', ['' => '-- Select Employee --']+$users, $incident->user_id, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="form-group">
            {{ Form::label('incident_type_id', 'Incident Type:') }}
            {{ Form::select('incident_type_id', ['' => '-- Select Incident Type --']+$incident_types, $incident->incident_type_id, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-2 col-sm-4">
        <div class="form-group">
            {{ Form::label('incident_date', '*Incident Date:') }}
            <div class="input-group">
                {{ Form::text('incident_date', $incident->incident_date, ['class' => 'form-control', 'id' => 'incident_date']) }}
                <div class="input-group-append">
                    <label for="incident_date" class="input-group-text btn">
                        <i class="fas fa-calendar"></i>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', '*Description') }}
    {{ Form::textarea('description', $incident->description, ['class' => 'form-control my-summernote']) }}
</div>

<div class="form-group">
    {{ Form::label('action_taken', 'Action Taken:') }}
    {{ Form::textarea('action_taken', $incident->action_taken, ['class' => 'form-control my-summernote']) }}
</div>

<div class="form-group">
    @if ($incident->employee_reviewed_date)
        <div class="form-check">
            {{ Form::checkbox('employee_reviewed_date', 'Y', true, ['class' => 'form-check-input', 'id' => 'employee_reviewed_date']) }}
            {{ Form::label('employee_reviewed_date', 'Employee has reviewed the incident.', ['class' => 'form-check-label']) }}
        </div>
        <p>Employee has reviewed incident: {{ $incident->employee_reviewed_date }}</p>
    @else
        <div class="form-check">
            {{ Form::checkbox('employee_reviewed_date', 'Y', false, ['class' => 'form-check-input', 'id' => 'employee_reviewed_date']) }}
            {{ Form::label('employee_reviewed_date', 'Employee has reviewed the incident.', ['class' => 'form-check-label']) }}
        </div>
    @endif
</div>
