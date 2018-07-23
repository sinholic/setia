@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'telintarif.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('tarif', 'Tarif', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="tarif" type="text" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" name="tarif" value="{{ old('tarif') }}" required autofocus>
            @if ($errors->has('tarif'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tarif') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('tgl_berlaku', 'Tgl Berlaku', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="tgl_berlaku" type="text" class="datetimepicker-input datepicker-0 form-control{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="tgl_berlaku" value="{{ old('tgl_berlaku') }}" required autofocus data-toggle="datetimepicker" data-target=".datepicker-0">
            @if ($errors->has('tgl_berlaku'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tgl_berlaku') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ old('notes') }}">
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
