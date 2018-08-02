@extends('admin.crud.read')
@section('content_input')
{{ Form::model($settlementsmsiwinvoice, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->tapcode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('periode', 'Periode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->periode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodinno', 'Nodin Req', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->nodinno, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodindate', 'Nodin Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->nodindate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('receivedate', 'Receive Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->receivedate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('discrep', 'Discrep', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->discrep, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('exp', 'Exp', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->exp, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodinreply', 'Nodin Reply', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->nodinreply, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('notes', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
