@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'groupmenu.store', 'class' => 'form-horizontal')) }}
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
        {{ Form::label('is_show_on_sidebar', 'Show on menu', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-sm btn-outline-primary">
                    {{ Form::radio('is_show_on_sidebar', 1) }} YES
                </label>
                <label class="btn btn-sm btn-outline-primary">
                    {{ Form::radio('is_show_on_sidebar', 0) }} NO
                </label>
            </div>
            @if ($errors->has('is_show_on_sidebar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_show_on_sidebar') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ old('notes') }}" autofocus>
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
