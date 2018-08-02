@extends('admin.crud.form')
@section('content_input')
{{ Form::model($news, ['method' => 'PATCH', 'route' => ['newscrud.update', $news->id], 'class' => 'form-horizontal','files' => true]) }}
<div class="form-group row">
    {{ Form::label('title', 'Title', ['class' => 'col-sm-3 form-control-label']) }}
    <div class="col-sm-9">
        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $news->title }}" required autofocus>
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
    <div class="form-group row">
        {{ Form::label('id_category', 'Category', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('id_category', $category, old('id_category'), ['class' => 'form-control'.($errors->has('id_category') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Category ...']) }}
            @if ($errors->has('id_category'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_category') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('konten', 'Konten', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="konten" id="summary-ckeditor" rows="5" cols="50" class="form-control{{ $errors->has('konten') ? ' is-invalid' : '' }}" value=""  autofocus>
            {{ $konten }}
          </textarea>
            @if ($errors->has('konten'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('konten') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('is_publish', 'Publish', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
          <input id="is_publisher" type="checkbox"   {{ $news->is_publish==1 ?'checked': '' }} autofocus> Centang Untuk publish
          <input id="is_publish" type="text"  name="is_publish" value="{{ $news->is_publish==1 ?'1': '' }}" style="display:none" >

            @if ($errors->has('is_publish'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_publish') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{Form::label('img', 'Image',['class' => 'col-sm-3 form-control-label'])}}
        <div class="col-sm-9">
            {{Form::file('img')}}
            @if ($errors->has('img'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('img') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
        <div class="col-sm-9">
            <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="" autofocus>{{ $notes }}
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
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script>

 CKEDITOR.replace( 'summary-ckeditor' );
 $('#is_publisher').click(function(){
   if($(this).is(':checked')){
       $('#is_publish').val(1);
   } else {
       $('#is_publish').val(0);
   }
});
</script>
@endpush
