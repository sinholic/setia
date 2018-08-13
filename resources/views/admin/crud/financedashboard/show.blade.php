@extends('admin.crud.read')
@section('content_input')
{{ Form::model($financedashboard, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('year', 'Tahun', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('year', $financedashboard->year, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('month', 'Bulan', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('month', $financedashboard->month, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('finance', 'Finance', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('finance', $financedashboard->finance, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $financedashboard->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
