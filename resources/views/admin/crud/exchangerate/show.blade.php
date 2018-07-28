@extends('admin.crud.read')
@section('content_input')
{{ Form::model($exchangerate, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('kode1', 'Kode 1', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('kode1', $exchangerate->kode1, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('kode2', 'Kode 2', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('kode2', $exchangerate->kode2, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('kode3', 'Kode 3', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('kode3', $exchangerate->kode3, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('nilai', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('nilai', $exchangerate->nilai, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('ymd', 'YMD', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('ymd', $exchangerate->ymd, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $exchangerate->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
