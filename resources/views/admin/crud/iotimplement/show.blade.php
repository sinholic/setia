@extends('admin.crud.read')
@section('content_input')
{{ Form::model($iotimplement, ['class' => 'form-horizontal']) }}
<div class="form-group row">
    {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="tapcode" type="text" class="form-control{{ $errors->has('tapcode') ? ' is-invalid' : '' }}" name="tapcode" value="{{ $iotimplement->tapcode }}" readonly>
        @if ($errors->has('tapcode'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tapcode') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('start_date', 'Start date', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="start_date" type="text" class="datetimepicker-input datepicker-start form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ $iotimplement->start_date }}" data-toggle="datetimepicker" data-target=".datepicker-start" readonly>
        @if ($errors->has('start_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('end_date', 'End date', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="end_date" type="text" class="datetimepicker-input datepicker-end form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ $iotimplement->end_date }}" data-toggle="datetimepicker" data-target=".datepicker-end" readonly>
        @if ($errors->has('end_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('end_date') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('v_unit', 'Unit', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="v_unit" type="text" class="form-control{{ $errors->has('v_unit') ? ' is-invalid' : '' }}" name="v_unit" value="{{ $iotimplement->v_unit }}" readonly>
        @if ($errors->has('v_unit'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('v_unit') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('g_unit_byte', 'Unit Byte', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="g_unit_byte" type="text" class="form-control{{ $errors->has('g_unit_byte') ? ' is-invalid' : '' }}" name="g_unit_byte" value="{{ $iotimplement->g_unit_byte }}" readonly>
        @if ($errors->has('g_unit_byte'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('g_unit_byte') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('moc_lo', 'Moc Lo', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="moc_lo" type="text" class="form-control{{ $errors->has('moc_lo') ? ' is-invalid' : '' }}" name="moc_lo" value="{{ $iotimplement->moc_lo }}" readonly>
        @if ($errors->has('moc_lo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('moc_lo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('moc_bh', 'Moc BH', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="moc_bh" type="text" class="form-control{{ $errors->has('moc_bh') ? ' is-invalid' : '' }}" name="moc_bh" value="{{ $iotimplement->moc_bh }}" readonly>
        @if ($errors->has('moc_bh'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('moc_bh') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('moc_ot', 'Moc Ot', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="moc_ot" type="text" class="form-control{{ $errors->has('moc_ot') ? ' is-invalid' : '' }}" name="moc_ot" value="{{ $iotimplement->moc_ot }}" readonly>
        @if ($errors->has('moc_ot'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('moc_ot') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('mtc', 'MTC', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="mtc" type="text" class="form-control{{ $errors->has('mtc') ? ' is-invalid' : '' }}" name="mtc" value="{{ $iotimplement->mtc }}" readonly>
        @if ($errors->has('mtc'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('mtc') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('sms_mo', 'SMS MO', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="sms_mo" type="text" class="form-control{{ $errors->has('sms_mo') ? ' is-invalid' : '' }}" name="sms_mo" value="{{ $iotimplement->sms_mo }}" readonly>
        @if ($errors->has('sms_mo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sms_mo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('gprs', 'GPRS', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="gprs" type="text" class="form-control{{ $errors->has('gprs') ? ' is-invalid' : '' }}" name="gprs" value="{{ $iotimplement->gprs }}" readonly>
        @if ($errors->has('gprs'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gprs') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('premium', 'Premium', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="premium" type="text" class="form-control{{ $errors->has('premium') ? ' is-invalid' : '' }}" name="premium" value="{{ $iotimplement->premium }}" readonly>
        @if ($errors->has('premium'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('premium') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('satelite', 'Satelite', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="satelite" type="text" class="form-control{{ $errors->has('satelite') ? ' is-invalid' : '' }}" name="satelite" value="{{ $iotimplement->satelite }}" readonly>
        @if ($errors->has('satelite'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('satelite') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('exc_oth', 'EXC Oth', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="exc_oth" type="text" class="form-control{{ $errors->has('exc_oth') ? ' is-invalid' : '' }}" name="exc_oth" value="{{ $iotimplement->exc_oth }}" readonly>
        @if ($errors->has('exc_oth'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('exc_oth') }}</strong>
            </span>
        @endif
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
