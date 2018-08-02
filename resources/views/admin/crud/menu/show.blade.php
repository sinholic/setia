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
              {{ Form::label('nama', 'Group Menu', ['class' => 'col-sm-3 form-control-label']) }}
              {{ Form::label('nama', $menu->group_menu->nama, ['class' => 'col-sm-9 form-control-label']) }}
          </div>
            <div class="form-group row">
                {{ Form::label('link_label', 'Link Label', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('link_label', $menu->link_label, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('link_url', 'Link URL', ['class' => 'col-sm-3 form-control-label']) }}
                <a href="{{$menu->link_url}}" class="col-sm-9 form-control-label">Link URL</a>
              
            </div>
            <div class="form-group row">
                {{ Form::label('link_desc', 'Link Desc', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('link_desc', $menu->link_desc, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_frame', 'Frame', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('is_frame', $menu->is_frame, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_public', 'Public', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('is_public', $menu->is_public, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('is_show_on_sidebar', 'Show on sidebar', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('is_show_on_sidebar', $menu->is_show_on_sidebar, ['class' => 'col-sm-9 form-control-label']) }}
            </div>

            <div class="form-group row">
                {{ Form::label('group_user', ' Group User', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    @if(count($groupusers) > 0)
                          @foreach($groupusers as $key => $groupusers)
                            <label class="group_user"> {{ $groupusers->nama }}
                            <br/>
                          @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('', $menu->notes, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
        </p>
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')

@endpush
