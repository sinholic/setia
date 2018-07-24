@extends('admin.crud.read')
@section('content_input')
{{ Form::model($tarif, ['class' => 'form-horizontal']) }}
<div class="form-group row">
    {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
    {{ Form::label('nama', $tarif->nama, ['class' => 'col-sm-9 form-control-label']) }}
</div>
<div class="form-group row">
    {{ Form::label('tarif', 'Tarif', ['class' => 'col-sm-3 form-control-label']) }}
    {{ Form::label('tarif', $tarif->tarif, ['class' => 'col-sm-9 form-control-label']) }}
</div>
<div class="form-group row">
    {{ Form::label('tgl_berlaku', 'Tgl Berlaku', ['class' => 'col-sm-3 form-control-label']) }}
    {{ Form::label('tgl_berlaku', $tarif->tgl_berlaku, ['class' => 'col-sm-9 form-control-label']) }}
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
