@extends('admin.crud.form')
@section('content_input')
{{ Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user->id], 'class' => 'form-horizontal']) }}
<div class="form-group row">
    {{ Form::label('user', 'Group User *', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('id_group', $groups, $user->id_group, ['class' => 'form-control'.($errors->has('id_group') ? ' is-invalid' : ''), 'placeholder' => 'Pilih group ...']) }}
        @if ($errors->has('id_group'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_group') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('name', 'Name *', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('email', 'E-mail *', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {{ Form::label('password', 'Password', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" placeholder="Empty = No Edit">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $user->notes }}" required autofocus>
            </textarea>
            @if ($errors->has('notes'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
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
