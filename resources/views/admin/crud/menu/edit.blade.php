@extends('admin.crud.form')
@section('content_input')
{{ Form::model($menu, ['method' => 'PATCH', 'route' => ['menu.update', $menu->id], 'class' => 'form-horizontal']) }}

    <div class="form-group row">
        {{ Form::label('id_group_menu', 'Group Menu', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_group_menu', $groups, old('id_group_menu'), ['class' => 'form-control'.($errors->has('id_group_menu') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Group Menu ...']) }}
            @if ($errors->has('id_group_menu'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_group_menu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('label', 'Label', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="label" type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="link_label" value="{{ $menu->link_label }}" required autofocus>
            @if ($errors->has('label'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('label') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('url', 'URL', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <input id="kota" type="url" class="form-control{{ $errors->has('link_url') ? ' is-invalid' : '' }}" name="link_url" value="{{ $menu->link_url }}" required autofocus>
            <i>Tulis URL yang Anda inginkan</i>
            @if ($errors->has('link_url'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('link_url') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('is_frame', 'Link Eksternal', ['class' => 'col-sm-3 form-control-label']) }}

        <div class="col-sm-9">
            <input id="is_frames" type="checkbox" {{ $menu->is_frame==1 ?'checked': '' }} autofocus> Centang Jika ini adalah Link External
            <input id="is_frame" type="text"  name="is_frame"  value='{{ $menu->is_frame }}' style="display:none">


            @if ($errors->has('is_frame'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_frame') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('is_public', 'Public', ['class' => 'col-sm-3 form-control-label']) }}

        <div class="col-sm-9">
            <input id="is_publics" type="checkbox" {{ $menu->is_public==1 ?'checked': '' }} autofocus> Centang jika ini boleh diakses untuk public
            <input id="is_public" type="text"  name="is_public"  value='{{ $menu->is_public }}' style="display:none">


            @if ($errors->has('is_public'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_public') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('group_user', ' Group User', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            @if(count($groupusers) > 0)

                  @foreach($groupusers as $key => $groupusers)
                    <input class="group_user" name="group_user[]" type="checkbox" value="{{$groupusers->id}}" {{ $groupusers->id==$groupusers->id ?'checked': '' }}   autofocus> {{ $groupusers->nama }}
                    <br/>
                    @endforeach
                    @foreach($groupuser_all as $key => $groupuser_all)
                      <input class="group_user" name="group_user[]" type="checkbox" value="{{$groupuser_all->id}}" autofocus> {{ $groupuser_all->nama }}
                      <br/>
                    @endforeach

                @if ($errors->has('group_user'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('group_user') }}</strong>
                    </span>
                @endif
                @else
                @foreach($groupuser_all as $key => $groupuser_all)
                  <input class="group_user" name="group_user[]" type="checkbox" value="{{$groupuser_all->id}}" autofocus> {{ $groupuser_all->nama }}
                  <br/>
                @endforeach
            @endif
        </div>
    </div>



    <div class="form-group row">
        {{ Form::label('is_show_on_sidebar', 'Show On Report Menu', ['class' => 'col-sm-3 form-control-label']) }}

        <div class="col-sm-9">
            <input id="is_show_on_sidebars" type="checkbox" {{ $menu->is_show_on_sidebar==1 ?'checked': '' }} autofocus>  Centang untuk ditambilkan di Report Menu
            <input id="is_show_on_sidebar" type="text"  name="is_show_on_sidebar" value="{{ $menu->is_show_on_sidebar }}" style="display:none" >


            @if ($errors->has('is_show_on_sidebar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_show_on_sidebar') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $menu->notes }}" required autofocus>
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
<script>
$('#is_frames').click(function(){
  if($(this).is(':checked')){
      $('#is_frame').val(1);
  } else {
      $('#is_frame').val(0);
  }
});
$('#is_publics').click(function(){
  if($(this).is(':checked')){
      $('#is_public').val(1);
      $('.group_user').not(this).prop('checked', this.checked);
  } else {
      $('#is_public').val(0);
  }
});
$('#is_show_on_sidebars').click(function(){
  if($(this).is(':checked')){
      $('#is_show_on_sidebar').val(1);
  } else {
      $('#is_show_on_sidebar').val(0);
  }
});
$('.group_user').click(function(){
  if($(this).is(':checked')){
    // var checkedValue = null;
    // var inputElements = document.getElementsByClassName('group_user');
    // for(var i=0; inputElements[i]; ++i){
    //       if(inputElements[i].checked){
    //            checkedValue = inputElements[i].value;
    //            //break;
    //       }else{
    //          checkedValue = inputElements[i].val(0);
    //       }
    //}
  } else {
    $('#is_publics').prop('checked', this.checked);
    $('#is_public').val(0);
    var checkedValue = null;
    var inputElements = document.getElementsByClassName('group_user');
    for(var i=0; inputElements[i]; ++i){
          if(inputElements[i].checked){
               checkedValue = inputElements[i].value;
               //break;
          }else{
             checkedValue = inputElements[i].val(0);
          }
    }
  }
});

</script>
@endpush
