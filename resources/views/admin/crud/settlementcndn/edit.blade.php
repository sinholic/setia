@extends('admin.crud.form')
@section('content_input')
{{ Form::model($settlementcninvoice, ['method' => 'PATCH', 'route' => ['settlementcndn.update', $settlementcninvoice->id], 'class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="tapcode" type="text" class="form-control{{ $errors->has('tapcode') ? ' is-invalid' : '' }}" name="tapcode" value="{{ $settlementcninvoice->tapcode }}">
            @if ($errors->has('tapcode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tapcode') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('periode', 'Periode', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="periode" type="text" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}" name="periode" value="{{ $settlementcninvoice->periode }}">
            @if ($errors->has('periode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('periode') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('invoicetype', 'Type', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="invoicetype" type="text" class="form-control{{ $errors->has('invoicetype') ? ' is-invalid' : '' }}" name="invoicetype" value="{{ $settlementcninvoice->invoicetype }}">
            @if ($errors->has('invoicetype'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('invoicetype') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('processdate', 'Process Date', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="processdate" type="text" class="datetimepicker-input datepicker form-control{{ $errors->has('processdate') ? ' is-invalid' : '' }}" name="processdate" value="{{ $settlementcninvoice->processdate }}" data-toggle="datetimepicker" data-target=".datepicker">
            @if ($errors->has('processdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('processdate') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nodinreply', 'Nodin Reply', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nodinreply" type="text" class="form-control{{ $errors->has('nodinreply') ? ' is-invalid' : '' }}" name="nodinreply" value="{{ $settlementcninvoice->nodinreply }}">
            @if ($errors->has('nodinreply'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nodinreply') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('notes', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $settlementcninvoice->notes }}">
            </textarea>
            @if ($errors->has('notes'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
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
