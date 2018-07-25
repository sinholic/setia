@extends('admin.crud.read')
@section('content_input')
{{ Form::model($user, ['class' => 'form-horizontal']) }}
    <div class="form-group row">
        {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('nama', $user->nama, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        {{ Form::label('', $user->notes, ['class' => 'col-sm-9 form-control-label']) }}
    </div>
@endsection
@push('scripts')

@endpush
