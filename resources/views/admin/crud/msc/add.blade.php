@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'msc.store', 'class' => 'form-horizontal')) }}

<div class="form-group row">
    {{ Form::label('kode', 'Kode', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{ old('kode') }}" required autofocus>
        @if ($errors->has('kode'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('kode') }}</strong>
            </span>
        @endif
    </div>
</div>
    <div class="form-group row">
        {{ Form::label('recentity', 'Recentity', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="recentity" type="text" class="form-control{{ $errors->has('recentity') ? ' is-invalid' : '' }}" name="recentity" value="{{ old('recentity') }}" required autofocus>
            @if ($errors->has('recentity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('recentity') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('gt', 'GT', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="gt" type="text" class="form-control{{ $errors->has('gt') ? ' is-invalid' : '' }}" name="gt" value="{{ old('gt') }}" required autofocus>
            @if ($errors->has('gt'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gt') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('nama', 'MSC Name', ['class' => 'col-sm-3 form-control-label']) }}
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
        {{ Form::label('regional', 'Regional', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_regional', $regional, old('id_regional'), ['class' => 'form-control'.($errors->has('id_regional') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Regional ...']) }}
            @if ($errors->has('id_regional'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_regional') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kota', 'Kota', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_kota', $kota, old('id_kota'), ['class' => 'form-control'.($errors->has('id_kota') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Kota ...']) }}
            @if ($errors->has('id_kota'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_kota') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('status', 'Status', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_status', $status, old('id_status'), ['class' => 'form-control'.($errors->has('id_status') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Status ...']) }}
            @if ($errors->has('id_status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_status') }}</strong>
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
