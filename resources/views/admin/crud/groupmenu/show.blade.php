@extends('admin.crud.read')
@section('content_input')
{{ Form::model($groupmenu, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('nama', $groupmenu->nama, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('is_show_on_sidebar', 'Show on Sidebar', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('is_show_on_sidebar', $groupmenu->is_show_on_sidebar, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $groupmenu->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
