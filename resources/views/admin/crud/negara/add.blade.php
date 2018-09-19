@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'negara.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nama" type="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('continent', 'Continent', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_continent', $continents, old('id_continent'), ['class' => 'form-control'.($errors->has('id_continent') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Continent ...']) }}
            @if ($errors->has('id_continent'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_continent') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('mcc', 'MCC', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="mcc" type="mcc" class="form-control{{ $errors->has('mcc') ? ' is-invalid' : '' }}" name="mcc" value="{{ old('mcc') }}" required autofocus>
            @if ($errors->has('mcc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mcc') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('iso3', 'ISO3', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="iso3" type="iso3" class="form-control{{ $errors->has('iso3') ? ' is-invalid' : '' }}" name="iso3" value="{{ old('iso3') }}" required autofocus>
            @if ($errors->has('iso3'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('iso3') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('aa14', 'AA14', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="aa14" type="text" class="form-control{{ $errors->has('aa14') ? ' is-invalid' : '' }}" name="aa14" value="{{ old('aa14') }}" required autofocus>
            @if ($errors->has('aa14'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('aa14') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ old('notes') }}" required autofocus>
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
