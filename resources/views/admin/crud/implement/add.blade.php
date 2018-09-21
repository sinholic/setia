@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'iotimplement.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('operator', 'Operator name', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('operator_id', $operators, old('operator_id'), ['class' => 'form-control'.($errors->has('operator_id') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Operator ...']) }}
            @if ($errors->has('operator_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('operator_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('years', 'Tahun', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="years" type="text" class="form-control{{ $errors->has('years') ? ' is-invalid' : '' }}" name="years" value="{{ old('years') }}">
            @if ($errors->has('years'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('years') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('skema', 'Skema', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="skema" type="text" class="form-control{{ $errors->has('skema') ? ' is-invalid' : '' }}" name="skema" value="{{ old('skema') }}">
            @if ($errors->has('skema'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('skema') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('status', 'Status', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('status', ['Done', 'On Progress'], old('status'), ['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Status ...']) }}
            @if ($errors->has('status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
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
