@extends('admin.crud.read')
@section('content_input')
{{ Form::model($settlementcninvoice, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->tapcode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('periode', 'Periode', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->periode, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('invoicetype', 'Type', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->invoicetype, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('processdate', 'Process Date', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->processdate, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nodinreply', 'Nodin Reply', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->nodinreply, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('notes', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $settlementcninvoice->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
