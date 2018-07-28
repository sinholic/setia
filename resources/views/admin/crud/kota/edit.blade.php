@extends('admin.crud.form')
@section('content_input')
{{ Form::model($kota, ['method' => 'PATCH', 'route' => ['kota.update', $kota->id], 'class' => 'form-horizontal']) }}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Kota</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rate Interkoneksi</a> -->
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
          <div class="form-group row">
              {{ Form::label('id', 'Regional', ['class' => 'col-sm-3 form-control-label']) }}
              <div class="col-sm-9">
                {{ Form::select('id_regional', $regional, $kota->id_regional, ['class' => 'form-control'.($errors->has('id_regional') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Regional ...']) }}
                @if ($errors->has('id_regional'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('id_regional') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group row">
              {{ Form::label('nama', 'Kota', ['class' => 'col-sm-3 form-control-label']) }}
              <div class="col-sm-9">
                  <input id="nama" type="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $kota->nama }}" required autofocus>
                  @if ($errors->has('nama'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nama') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group row">
              {{ Form::label('notes', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
              <div class="col-sm-9">
                  <textarea id="notes" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" >{{ $notes }}
                  </textarea>
                  @if ($errors->has('notes'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('notes') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
        </p>
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

    </script>
@endpush
