@extends('admin.crud.form')
@section('content_input')
{{ Form::model($negara, ['method' => 'PATCH', 'route' => ['negara.update', $negara->id], 'class' => 'form-horizontal']) }}
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
                {{ Form::label('continent', 'Continent', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    {{ Form::select('id_continent', $continents, $negara->id_continent, ['class' => 'form-control'.($errors->has('id_continent') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('id_continent'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_continent') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('mcc', 'MCC', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    <input id="mcc" type="mcc" class="form-control{{ $errors->has('mcc') ? ' is-invalid' : '' }}" name="mcc" value="{{ $negara->mcc }}">
                    @if ($errors->has('mcc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mcc') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('iso3', 'ISO3', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    <input id="iso3" type="iso3" class="form-control{{ $errors->has('iso3') ? ' is-invalid' : '' }}" name="iso3" value="{{ $negara->iso3 }}">
                    @if ($errors->has('iso3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('iso3') }}</strong>
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
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <p></p>
        <div id="rate-container">
            @foreach($rates as $key => $rate)
            <div class="rates rate-{{ $rate->id }}">
                <div class="form-group row">
                    {{ Form::label('id_service', 'Service', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        {{ Form::select('rates['.$key.'][id_service]', $services, $rate->id_service, ['class' => 'form-control']) }}
                        @if ($errors->has('id_service'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('id_service') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('opsi_unit', 'Opsi Unit Service', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach($opsiunitservices as $opsiunitservice)
                                @php
                                    $class="";
                                    $option=false;
                                @endphp
                                @if(isset($rate->id_opsi_unit_service) && $rate->id_opsi_unit_service == $opsiunitservice->id)
                                    @php
                                        $class="active";
                                        $option=true;
                                    @endphp
                                @endif
                                <label class="btn btn-sm btn-outline-primary {{ $class }}">
                                    {{ Form::radio('rates['.$key.'][id_opsi_unit_service]', $opsiunitservice->id, $option) }} {{ $opsiunitservice->nama }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('nilai_unit', 'Unit', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        <input id="nilai_unit" type="text" class="form-control{{ $errors->has('nilai_unit') ? ' is-invalid' : '' }}" name="rates[{{ $key }}][nilai_unit]" value="{{ $rate->nilai_unit }}" required autofocus>
                        @if ($errors->has('nilai_unit'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nilai_unit') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <a class="btn-remove btn btn-sm btn-outline-danger" data-remove="rate-{{ $rate->id }}" href="#">
                            <i class="fas fa-times-circle"></i> Remove
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('nilai_rate', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        <input id="nilai_rate" type="text" class="form-control{{ $errors->has('nilai_rate') ? ' is-invalid' : '' }}" name="rates[{{ $key }}][nilai_rate]" value="{{ $rate->nilai_rate }}" required autofocus>
                        @if ($errors->has('nilai_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nilai_rate') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tgl_berlaku', 'Start', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        <input id="tgl_berlaku" type="text" class="datetimepicker-input datepicker-{{ $key }} form-control{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="rates[{{ $key }}][tgl_berlaku]" value="{{ $rate->tgl_berlaku }}" required autofocus data-toggle="datetimepicker" data-target=".datepicker-{{ $key }}">
                        @if ($errors->has('tgl_berlaku'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tgl_berlaku') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{ Form::hidden('rates['.$key.'][id_rate]', $rate->id) }}
                {{ Form::hidden('rates['.$key.'][delete]', 'no', ['id' => 'delete-rate-'.$rate->id]) }}
            </div>
            @if(!$loop->last)
            <hr class="rate-{{ $rate->id }}">
            @endif
            @endforeach
        </div>
        <a id="add-new-rate" class="float-right btn btn-sm btn-outline-primary" href="#">Add new Rate</a>
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
                <div class="form-group row">\
                    {{ Form::label('opsi_unit', 'Opsi Unit Service', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">\
                            @foreach($opsiunitservices as $opsiunitservice)\
                                <label class="btn btn-sm btn-outline-primary">\
                                    <input name="rates['+count+'][id_opsi_unit_service]" value="{{ $opsiunitservice->id }}" type="radio"> {{ $opsiunitservice->nama }}\
                                </label>\
                            @endforeach\
                        </div>\
                    </div>\
                </div>\
                <div class="form-group row">\
                    {{ Form::label('nilai_unit', 'Unit', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <input id="nilai_unit" type="text" class="form-control{{ $errors->has('nilai_unit') ? ' is-invalid' : '' }}" name="rates['+count+'][nilai_unit]" value="" required autofocus>\
                    </div>\
                    <div class="col-sm-2">\
                        <a class="btn-remove btn btn-sm btn-outline-danger" data-remove="rate-new-'+count+'" href="#">\
                            <i class="fas fa-times-circle"></i> Remove\
                        </a>\
                    </div>\
                </div>\
                <div id="" class="form-group row rate-new">\
                    {{ Form::label('nilai_rate', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}\
                    <div class="col-sm-7">\
                        <input id="nilai_rate" type="nilai_rate" class="form-control" name="rates['+count+'][nilai_rate]" value="" required autofocus>\
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

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('select:not(.phpdebugbar-datasets-switcher,.select2-hidden-accessible,:hidden)').select2({
                theme: "bootstrap"
            });
        });
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            $('select').not('.phpdebugbar-datasets-switcher').select2({
                theme: "bootstrap"
            });
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
