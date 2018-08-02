@extends('admin.crud.read')
@section('content_input')
{{ Form::model($settlementtapinvoice, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->tapcode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('periode', 'Periode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->periode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodindate', 'Nodin Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->nodindate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('receivedate', 'Receive Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->receivedate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodinno', 'Nodin No.', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->nodinno, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('discrep', 'Discrep', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->discrep, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('checkdate', 'Check Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->checkdate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('sdrdiscrep', 'SDR Discrep', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->sdrdiscrep, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('exp', 'EXP', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->exp, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodinreply', 'Nodin Reply', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->nodinreply, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('notes', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementtapinvoice->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
