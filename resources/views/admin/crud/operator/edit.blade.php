@extends('admin.crud.form')
@section('content_input')
{{ Form::model($operator, ['method' => 'PATCH', 'route' => ['operator.update', $operator->id], 'class' => 'form-horizontal']) }}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Negara</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="roamingpartner-tab" data-toggle="tab" href="#roamingpartner" role="tab" aria-controls="roamingpartner" aria-selected="false">Roaming Partner</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rate Interkoneksi</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
            <div class="form-group row">
                {{ Form::label('nama', 'Name *', ['class' => 'col-sm-3 form-control-label']) }}
                <div class="col-sm-9">
                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $operator->nama }}" required autofocus>
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
                    <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{ $operator->kode }}" required autofocus>
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
                    <input id="mnc" type="text" class="form-control{{ $errors->has('mnc') ? ' is-invalid' : '' }}" name="mnc" value="{{ $operator->mnc }}">
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
                    <input id="network_display" type="text" class="form-control{{ $errors->has('network_display') ? ' is-invalid' : '' }}" name="network_display" value="{{ $operator->network_display }}">
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
                    <input id="parentorg" type="text" class="form-control{{ $errors->has('parentorg') ? ' is-invalid' : '' }}" name="parentorg" value="{{ $operator->parentorg }}">
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
                    <input id="comments" type="text" class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}" name="comments" value="{{ $operator->comments }}">
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
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $operator->address }}">
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
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $operator->phone }}">
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
                    <input id="contact_person_nama" type="text" class="form-control{{ $errors->has('contact_person_nama') ? ' is-invalid' : '' }}" name="contact_person_nama" value="{{ $operator->contact_person_nama }}">
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
                    <input id="contact_person_email" type="text" class="form-control{{ $errors->has('contact_person_email') ? ' is-invalid' : '' }}" name="contact_person_email" value="{{ $operator->contact_person_email }}">
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
                    <input id="contact_person_phone" type="text" class="form-control{{ $errors->has('contact_person_phone') ? ' is-invalid' : '' }}" name="contact_person_phone" value="{{ $operator->contact_person_phone }}">
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
                    <input id="register_date" type="text" class="datetimepicker-input datepicker-0 form-control{{ $errors->has('register_date') ? ' is-invalid' : '' }}" name="register_date" value="{{ $operator->register_date }}" data-toggle="datetimepicker" data-target=".datepicker-0">
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
                    <input id="kategori" type="text" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" name="kategori" value="{{ $operator->kategori }}">
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
                    <input id="building" type="text" class="form-control{{ $errors->has('building') ? ' is-invalid' : '' }}" name="building" value="{{ $operator->building }}">
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
                    <input id="kota" type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" name="kota" value="{{ $operator->kota }}">
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
                    {{ Form::select('id_negara', $negaras, $operator->id_negara, ['class' => 'form-control'.($errors->has('id_negara') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Negara ...', 'required']) }}
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
                    {{ Form::select('id_tipe_organisasi', $tipe_organisasis, $operator->id_tipe_organisasi, ['class' => 'form-control'.($errors->has('id_tipe_organisasi') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Tipe Organisasi ...']) }}
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
                        {{ Form::select('id_group_operator', $group_operators, $operator->id_group_operator, ['class' => 'form-control'.($errors->has('id_group_operator') ? ' is-invalid' : ''), 'multiple']) }}
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
                    <textarea name="notes" rows="5" cols="50" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" value="{{ $operator->notes }}">
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
    <div class="tab-pane fade" id="roamingpartner" role="tabpanel" aria-labelledby="roamingpartner-tab">
        <p></p>
        <div class="form-group row">
            <div class="col-sm-3">
                {!! Form::label(null, "&nbsp;", ['class' => 'col-sm-12 form-control-label']) !!}
            </div>
            <div class="col-sm-5">
                {{ Form::label('servicespartner', "Choose Service", ['class' => 'col-sm-12 form-control-label']) }}
            </div>
            <div class="col-sm-2">
                {{ Form::label('launching_date_tsel', "Launching Date Tsel", ['class' => 'col-sm-12 form-control-label']) }}
            </div>
            <div class="col-sm-2">
                {{ Form::label('launching_date_rp', "Launching Date RP", ['class' => 'col-sm-12 form-control-label']) }}
            </div>
        </div>
        @foreach($roamingpartners as $key => $roamingpartner)
        <div class="form-group row">
            <div class="col-sm-3">
                {!! Form::label($roamingpartner->nama, $roamingpartner->group_roaming->nama." (".$roamingpartner->nama.")", ['class' => 'col-sm-12 form-control-label']) !!}
                {{ Form::hidden('partner['.$roamingpartner->id.'][id_roaming_partner]', $roamingpartner->id) }}
            </div>
            <div class="col-sm-5">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach($opsiroamingpartners as $opsiroamingpartner)
                        @php
                            $class="";
                            $option=false;
                        @endphp
                        @if(isset($operator->roamingpartners[$key]) && $operator->roamingpartners[$key]->pivot->id_opsi_roaming_partner == $opsiroamingpartner->id)
                            @php
                                $class="active";
                                $option=true;
                            @endphp
                        @endif
                        <label class="btn btn-sm btn-outline-primary {{ $class }}">
                            {{ Form::radio('partner['.$roamingpartner->id.'][id_opsi_roaming_partner]', $opsiroamingpartner->id, $option) }} {{ $opsiroamingpartner->nama }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-2">
                <input id="launching_date_tsel" type="text" class="datetimepicker-input datepicker-launching_date_tsel-{{ $key }} form-control form-control-sm{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="partner[{{ $roamingpartner->id }}][launching_date_tsel]" value="{{ (isset($operator->roamingpartners[$key]) ? $operator->roamingpartners[$key]->pivot->launching_date_tsel : '') }}" data-toggle="datetimepicker" data-target=".datepicker-launching_date_tsel-{{ $key }}">
            </div>
            <div class="col-sm-2">
                <input id="launching_date_rp" type="text" class="datetimepicker-input datepicker-launching_date_rp-{{ $key }} form-control form-control-sm{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="partner[{{ $roamingpartner->id }}][launching_date_rp]" value="{{ (isset($operator->roamingpartners[$key]) ? $operator->roamingpartners[$key]->pivot->launching_date_rp : '') }}" data-toggle="datetimepicker" data-target=".datepicker-launching_date_rp-{{ $key }}">
            </div>
        </div>
        @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <p></p>
        <div id="rate-container">
            @foreach($rates as $key => $rate)
            <div class="rates rate-{{ $rate->id }}">
                <div class="form-group row">
                    {{ Form::label('id_service', 'Service', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        {{ Form::select('rates['.$key.'][id_service]', $services, $rate->id_service, ['class' => 'form-control'.($errors->has('id_service') ? ' is-invalid' : ''), 'placeholder' => 'Pilih Service ...']) }}
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
