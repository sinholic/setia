@extends('admin.crud.read')
@section('content_input')
{{ Form::model($msc, ['class' => 'form-horizontal']) }}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Show MSC</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rate Interkoneksi</a>
    </li> -->
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
            <div class="form-group row">
                {{ Form::label('kode', 'Kode', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('kode', $msc->kode, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('nama', 'Nama MSC', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('nama', $msc->nama, ['class' => 'col-sm-9 form-control-label']) }}
            </div>

            <div class="form-group row">
                {{ Form::label('kota', 'Kota', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('kota', $msc->kotas->nama, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $msc->remark, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('recentity', 'Recentity', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('recentity', $msc->recentity, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('gt', 'GT', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('gt', $msc->gt, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('filename', 'Filename', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('filename', $msc->filename, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('status', 'Status', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('status', $msc->status->nama, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
        </p>
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
