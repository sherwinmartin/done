<div class="form-group">
    {{ Form::label('name', '*Name:') }}
    {{ Form::text('name', $incident_type->name, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', $incident_type->description, ['class' => 'form-control']) }}
</div>
