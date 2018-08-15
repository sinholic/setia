@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'uploaddata.store', 'class' => 'form-horizontal','files' => true )) }}
    <div class="form-group row">
        {{ Form::label('manage_id', 'Target', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('manage_id', $manages, old('manage_id'), ['class' => 'form-control'.($errors->has('manage_id') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Target ...']) }}
            @if ($errors->has('manage_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('manage_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('file_input', 'File', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control{{ $errors->has('file_input') ? ' is-invalid' : '' }}" name="file_input" value="{{ old('file_input') }}" required autofocus>
            @if ($errors->has('file_input'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file_input') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::hidden('created_by', Auth::user()->id) }}
        {{ Form::hidden('updated_by', Auth::user()->id) }}
        <div class="col-sm-4 offset-sm-3">
            {{ link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-secondary']) }}
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
