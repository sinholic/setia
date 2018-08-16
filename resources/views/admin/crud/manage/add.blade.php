@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'manage.store', 'class' => 'form-horizontal')) }}

    <div class="form-group row">
        {{ Form::label('label', 'Nama opsi', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" value="{{ old('label') }}" required autofocus>
            @if ($errors->has('label'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('label') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('targettable', 'Nama table', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="targettable" type="targettable" class="form-control{{ $errors->has('targettable') ? ' is-invalid' : '' }}" name="targettable" value="{{ old('targettable') }}" required autofocus>
            @if ($errors->has('targettable'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('targettable') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('fields', 'Field', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="fields" name="fields" rows="5" cols="50" class="form-control{{ $errors->has('fields') ? ' is-invalid' : '' }}" >{{ old('fields') }}</textarea>
            @if ($errors->has('fields'))
                <span class="invalid-feedback" role="alert">
                    <strong>{!! $errors->first('fields') !!}</strong>
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
