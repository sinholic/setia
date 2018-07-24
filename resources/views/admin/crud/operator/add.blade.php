@extends('admin.crud.form')
@section('content_input')
{{ Form::open(array('route' => 'operator.store', 'class' => 'form-horizontal')) }}
    <div class="form-group row">
        {{ Form::label('nama', 'Name *', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kode', 'Kode *', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{ old('kode') }}" required autofocus>
            @if ($errors->has('kode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kode') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('mnc', 'MNC', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="mnc" type="text" class="form-control{{ $errors->has('mnc') ? ' is-invalid' : '' }}" name="mnc" value="{{ old('mnc') }}">
            @if ($errors->has('mnc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mnc') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('network_display', 'Network Display', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="network_display" type="text" class="form-control{{ $errors->has('network_display') ? ' is-invalid' : '' }}" name="network_display" value="{{ old('network_display') }}">
            @if ($errors->has('network_display'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('network_display') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('parentorg', 'Parent Org', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="parentorg" type="text" class="form-control{{ $errors->has('parentorg') ? ' is-invalid' : '' }}" name="parentorg" value="{{ old('parentorg') }}">
            @if ($errors->has('parentorg'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parentorg') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('comments', 'Comments', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="comments" type="text" class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}" name="comments" value="{{ old('comments') }}">
            @if ($errors->has('comments'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comments') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('address', 'Address', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}">
            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('phone', 'Phone', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('contact_person_nama', 'Contact Person - Name', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="contact_person_nama" type="text" class="form-control{{ $errors->has('contact_person_nama') ? ' is-invalid' : '' }}" name="contact_person_nama" value="{{ old('contact_person_nama') }}">
            @if ($errors->has('contact_person_nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact_person_nama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('contact_person_email', 'Contact Person - Email', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="contact_person_email" type="text" class="form-control{{ $errors->has('contact_person_email') ? ' is-invalid' : '' }}" name="contact_person_email" value="{{ old('contact_person_email') }}">
            @if ($errors->has('contact_person_email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact_person_email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('contact_person_phone', 'Contact Person - Phone', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="contact_person_phone" type="text" class="form-control{{ $errors->has('contact_person_phone') ? ' is-invalid' : '' }}" name="contact_person_phone" value="{{ old('contact_person_phone') }}">
            @if ($errors->has('contact_person_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact_person_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('register_date', 'Register Date', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="register_date" type="text" class="datetimepicker-input datepicker-0 form-control{{ $errors->has('register_date') ? ' is-invalid' : '' }}" name="register_date" value="{{ old('register_date') }}" data-toggle="datetimepicker" data-target=".datepicker-0">
            @if ($errors->has('register_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('register_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kategori', 'Kategori', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kategori" type="text" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" name="kategori" value="{{ old('kategori') }}">
            @if ($errors->has('kategori'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kategori') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('building', 'Building', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="building" type="text" class="form-control{{ $errors->has('building') ? ' is-invalid' : '' }}" name="building" value="{{ old('building') }}">
            @if ($errors->has('building'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('building') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('kota', 'City', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kota" type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" name="kota" value="{{ old('kota') }}">
            @if ($errors->has('kota'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kota') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('negara', 'Negara', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_negara', $negaras, old('id_negara'), ['class' => 'form-control'.($errors->has('id_negara') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Negara ...', 'required']) }}
            @if ($errors->has('id_negara'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_negara') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('tipe_organisasi', ' Tipe Organisasi', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_tipe_organisasi', $tipe_organisasis, old('id_tipe_organisasi'), ['class' => 'form-control'.($errors->has('id_tipe_organisasi') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Tipe Organisasi ...']) }}
            @if ($errors->has('id_tipe_organisasi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_tipe_organisasi') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('group_operator', ' Group Operator', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            @if(count($group_operators) > 0)
                {{ Form::select('id_group_operator', $group_operators, old('id_group_operator'), ['class' => 'form-control'.($errors->has('id_group_operator') ? ' is-invalid' : ''), 'multiple']) }}
                @if ($errors->has('id_group_operator'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('id_group_operator') }}</strong>
                    </span>
                @endif
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ old('notes') }}">
            </textarea>
            @if ($errors->has('notes'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::hidden('created_by', Auth::user()->id) }}
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
