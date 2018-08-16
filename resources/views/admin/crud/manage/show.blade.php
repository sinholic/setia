@extends('admin.crud.read')
@section('content_input')
{{ Form::model($manage, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('label', 'Nama opsi', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('label', $manage->label, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('targettable', 'Nama table', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('targettable', $manage->targettable, ['class' => 'col-sm-9 form-control-label']) }}
    </div>

    <div class="form-group row">
        {{ Form::label('fields', 'Field', ['class' => 'col-sm-3 form-control-label']) }}
        <p class="col-sm-9 form-control-label">
            {!! nl2br($manage->fields) !!}
        </p>
    </div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
