@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'finance.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('year', 'Tahun', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}"  autofocus>
            @if ($errors->has('year'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('year') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('month', 'Bulan', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="month" type="text" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ old('month') }}"  autofocus>
            @if ($errors->has('month'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('month') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('finance', 'Finance', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="finance" type="text" class="form-control{{ $errors->has('finance') ? ' is-invalid' : '' }}" name="finance" value="{{ old('finance') }}"  autofocus>
            @if ($errors->has('finance'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('finance') }}</strong>
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
