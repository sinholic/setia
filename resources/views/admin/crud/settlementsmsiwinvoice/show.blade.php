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
        {{ Form::label('invoicetype', 'Type', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->invoicetype, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('processdate', 'Process Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementsmsiwinvoice->processdate, ['class' => 'col-sm-9 form-control-label']) }}
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
