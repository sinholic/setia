@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'settlementsmsiw.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('tapcode', 'Tapcode', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="tapcode" type="text" class="form-control{{ $errors->has('tapcode') ? ' is-invalid' : '' }}" name="tapcode" value="{{ old('tapcode') }}">
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
            <input id="periode" type="text" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}" name="periode" value="{{ old('periode') }}">
            @if ($errors->has('periode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('periode') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nodinno', 'Nodin Req', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nodinno" type="text" class="form-control{{ $errors->has('nodinno') ? ' is-invalid' : '' }}" name="nodinno" value="{{ old('nodinno') }}">
            @if ($errors->has('nodinno'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nodinno') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nodindate', 'Nodin Date', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nodindate" type="text" class="datetimepicker-input nodindate form-control{{ $errors->has('nodindate') ? ' is-invalid' : '' }}" name="nodindate" value="{{ old('nodindate') }}" data-toggle="datetimepicker" data-target=".nodindate">
            @if ($errors->has('nodindate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nodindate') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('receivedate', 'Receive Date', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="receivedate" type="text" class="datetimepicker-input receivedate form-control{{ $errors->has('receivedate') ? ' is-invalid' : '' }}" name="receivedate" value="{{ old('receivedate') }}" data-toggle="datetimepicker" data-target=".receivedate">
            @if ($errors->has('receivedate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('receivedate') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('discrep', 'Discrep', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="discrep" type="text" class="datetimepicker-input discrep form-control{{ $errors->has('discrep') ? ' is-invalid' : '' }}" name="discrep" value="{{ old('discrep') }}" data-toggle="datetimepicker" data-target=".discrep">
            @if ($errors->has('discrep'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('discrep') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('exp', 'Exp', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="exp" type="text" class="datetimepicker-input exp form-control{{ $errors->has('exp') ? ' is-invalid' : '' }}" name="exp" value="{{ old('exp') }}" data-toggle="datetimepicker" data-target=".exp">
            @if ($errors->has('exp'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('exp') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nodinreply', 'Nodin Reply', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nodinreply" type="text" class="form-control{{ $errors->has('nodinreply') ? ' is-invalid' : '' }}" name="nodinreply" value="{{ old('nodinreply') }}">
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
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ odl('notes') }}">
            </textarea>
            @if ($errors->has('notes'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('notes') }}</strong>
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
