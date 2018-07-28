@extends('admin.crud.form')
@section('content_input')
{{ Form::model($exchangerate, ['method' => 'PATCH', 'route' => ['exchangerate.update', $exchangerate->id], 'class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('kode1', 'Kode 1', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kode1" type="text" class="form-control{{ $errors->has('kode1') ? ' is-invalid' : '' }}" name="kode1" value="{{ $exchangerate->kode1 }}"  autofocus>
            @if ($errors->has('kode1'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kode1') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kode2', 'Kode 2', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kode2" type="text" class="form-control{{ $errors->has('kode2') ? ' is-invalid' : '' }}" name="kode2" value="{{ $exchangerate->kode2 }}"  autofocus>
            @if ($errors->has('kode2'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kode2') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kode3', 'Kode 3', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kode3" type="text" class="form-control{{ $errors->has('kode3') ? ' is-invalid' : '' }}" name="kode3" value="{{ $exchangerate->kode3 }}"  autofocus>
            @if ($errors->has('kode3'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kode3') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nilai', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="rate" type="text" class="form-control{{ $errors->has('nilai') ? ' is-invalid' : '' }}" name="nilai" value="{{ $exchangerate->nilai }}" required autofocus>
            @if ($errors->has('nilai'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nilai') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('ymd', 'YMD', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="ymd" type="text" class="form-control{{ $errors->has('ymd') ? ' is-invalid' : '' }}" name="ymd" value="{{ $exchangerate->ymd }}"  autofocus>
            @if ($errors->has('ymd'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ymd') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $exchangerate->notes }}" autofocus>
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
