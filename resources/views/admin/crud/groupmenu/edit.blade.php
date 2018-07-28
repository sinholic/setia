@extends('admin.crud.form')
@section('content_input')
{{ Form::model($groupmenu, ['method' => 'PATCH', 'route' => ['groupmenu.update', $groupmenu->id], 'class' => 'form-horizontal']) }}

    <div class="form-group row">
        {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="nama" type="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $groupmenu->nama }}" required autofocus>
            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('sidebar', 'Show on sidebar', ['class' => 'col-sm-3 form-control-label']) }}

        <div class="col-sm-9">
            <input id="sidebar" type="checkbox"   {{ $groupmenu->is_show_on_sidebar==1 ?'checked': '' }} autofocus> Centang Untuk Tampil di Sidebar
            <input id="sidebar_value" type="text"  name="is_show_on_sidebar" value="{{ $groupmenu->is_show_on_sidebar==1 ?'1': '' }}" style="display:none" >


            @if ($errors->has('sidebar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('sidebar') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $groupmenu->notes }}" autofocus>
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
  <script type="text/javascript">
  $('#sidebar').click(function(){
    if($(this).is(':checked')){
        $('#sidebar_value').val(1);
    } else {
        $('#sidebar_value').val(0);
    }
});
  </script>
@endpush
