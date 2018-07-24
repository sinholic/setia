@extends('admin.crud.form')
@section('content_input')
{{ Form::model($kota, ['method' => 'PATCH', 'route' => ['kota.update', $kota->id], 'class' => 'form-horizontal']) }}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Negara</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rate Interkoneksi</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
            <div class="form-group row">
                {{ Form::label('nama', 'Name', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    <input id="nama" type="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $negara->nama }}" required autofocus>
                    @if ($errors->has('nama'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('kota', 'Kota', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    {{ Form::select('id_kota', $kota, $kota->id_kota, ['class' => 'form-control'.($errors->has('id_kota') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Kota ...']) }}
                    @if ($errors->has('id_kota'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_kota') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    <textarea id="remark" name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $negara->notes }}">
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
    <?php $count = count($rates);  ?>
    <script type="text/javascript">
        var count = $('.rates').length;
        console.log(count);
        $('#add-new-rate').click(function(e) {
            e.preventDefault();
            var count_hr = $('.rates').length;
            if (count_hr > 0) {
                $('#rate-container').append('<hr class="rate-new-'+count+'">');
            }
            $('#rate-container').append('\
            <div class="rates rate-new-'+count+'">\
                <div id="" class="form-group row rate-new">\
                    {{ Form::label('id_service', 'Service', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <select name="rates['+count+'][id_service]" class="form-control" >\
                            <option>Pilih Service ...</option>\
                            @foreach($services as $key => $service)\
                                <option value="{{ $key }}">{{ $service }}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                </div>\
                <div id="" class="form-group row rate-new">\
                    {{ Form::label('nilai_rate', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <input id="nilai_rate" type="nilai_rate" class="form-control" name="rates['+count+'][nilai_rate]" value="" required autofocus>\
                    </div>\
                    <div class="col-sm-2">\
                        <a class="btn-remove btn btn-sm btn-outline-danger" data-remove="rate-new-'+count+'" href="#">\
                            <i class="fas fa-times-circle"></i> Remove\
                        </a>\
                    </div>\
                </div>\
                <div id="" class="form-group row rate-new">\
                    {{ Form::label('tgl_berlaku', 'Start', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <input id="tgl_berlaku" type="tgl_berlaku" class="datetimepicker-input datepicker-'+count+' form-control" name="rates['+count+'][tgl_berlaku]" value="" required autofocus data-toggle="datetimepicker" data-target=".datepicker-'+count+'">\
                    </div>\
                </div>\
                {{ Form::hidden('created_by', Auth::user()->id) }}\
            </div>\
            ');
            $('select').not('.phpdebugbar-datasets-switcher').select2({
                theme: "bootstrap"
            });
            $('.datepicker-'+count).datetimepicker({
                format: 'YYYY-MM-DD'
            });
            count++;
            <?php $count++; ?>
        });

        $('#rate-container').on('click', '.btn-remove', function(e){
            e.preventDefault();
            var data = $(this).data('remove');
            console.log(data);
            if (data.indexOf('new') > -1) {
                $('.'+data).remove();
            }else {
                $('.'+data).hide();
                $('#delete-'+data).val('yes');
            }
        })
    </script>
@endpush
