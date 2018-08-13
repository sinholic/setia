@extends('admin.crud.read')
@section('content_input')
{{ Form::model($targetdashboard, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('year', 'Tahun', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('year', $targetdashboard->year, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('month', 'Bulan', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('month', $targetdashboard->month, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('target', 'Target', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('target', $targetdashboard->target, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $targetdashboard->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
