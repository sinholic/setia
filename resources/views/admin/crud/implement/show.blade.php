@extends('admin.crud.read')
@section('content_input')
{{ Form::model($implement, ['class' => 'form-horizontal']) }}
<div class="form-group row">
    {{ Form::label('operator', 'Operator name', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('operator_id', $operators, $implement->operator_id, ['class' => 'form-control'.($errors->has('operator_id') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Operator ...', 'readonly']) }}
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
        <input id="years" type="text" class="form-control{{ $errors->has('years') ? ' is-invalid' : '' }}" name="years" value="{{ $implement->years }}" readonly>
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
        <input id="skema" type="text" class="form-control{{ $errors->has('skema') ? ' is-invalid' : '' }}" name="skema" value="{{ $implement->skema }}" readonly>
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
        {{ Form::select('status', ['Done', 'On Progress'], $implement->status, ['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Status ...', 'readonly']) }}
        @if ($errors->has('status'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
