@extends('admin.crud.read')
@section('content_input')
{{ Form::model($negara, ['class' => 'form-horizontal']) }}
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
                {{ Form::label('nama', $negara->nama, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('continent', 'Continent', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('continent', $negara->continent->nama, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('mcc', 'MCC', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('mcc', $negara->mcc, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('iso3', 'ISO3', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('iso3', $negara->iso3, ['class' => 'col-sm-9 form-control-label']) }}
            </div>
            <div class="form-group row">
                {{ Form::label('remark', 'Remark', ['class' => 'col-sm-3 form-control-label']) }}
                {{ Form::label('remark', $negara->notes, ['class' => 'col-sm-9 form-control-label']) }}
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
                        {{ Form::label('id_service', $rate->service->nama, ['class' => 'col-sm-3 form-control-label']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('nilai_rate', 'Rate', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        {{ Form::label('nilai_rate', $rate->nilai_rate, ['class' => 'col-sm-3 form-control-label']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tgl_berlaku', 'Start', ['class' => 'col-sm-3 form-control-label']) }}
                    <div class="col-sm-7">
                        {{ Form::label('nilai_rate', $rate->tgl_berlaku, ['class' => 'col-sm-3 form-control-label']) }}
                    </div>
                </div>
            </div>
            @if(!$loop->last)
            <hr class="rate-{{ $rate->id }}">
            @endif
            @endforeach
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection
@push('scripts')
    
@endpush
