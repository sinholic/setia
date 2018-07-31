@extends('admin.crud.read')
@section('content_input')
{{ Form::model($menu, ['class' => 'form-horizontal']) }}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Show Menu</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rate Interkoneksi</a>
    </li> -->
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
            <div class="form-group row">
                {{ Form::label('link_label', 'Regional', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('regional', $$menu->link_label, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('link_url', 'Kota', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('kota', $menu->link_url, ['class' => 'col-sm-9 form-control-label']) }}
            </div>

            <div class="form-group row">
                {{ Form::label('link_desc', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $menu, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_frame', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $menu, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_public', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $menu, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_show_on_sidebar', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $menu, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
        </p>
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
