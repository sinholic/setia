@extends('layoutsnew.app')
@section('content')

<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">
          @if(Session::get('status')=='Operator Code')
          <table id="dataListMetric" class="table table-bordered asd" width="100%">
                  <thead>
                    <tr id="theadsize">
                      <th >Operator Code</th>
                      <th >Operator</th>
                       <th >MCCMNC</th>
                      <th >Country</th>
                        <th >Continent</th>
                        <th >MCC</th>
                        <th >CC</th>
                    </tr>
                  </thead>
                  <tbody>
                    	@foreach($data as $listData)
                    <tr>
                      <td>{{$listData->operatorcode}}</td>
                      <td>{{$listData->operator}}</td>
                        <td>{{$listData->mccmnc}}</td>
                      <td>{{$listData->country}}</td>
                        <td>{{$listData->continent}}</td>
                        <td>{{$listData->mcc}}</td>
                        <td>{{$listData->cc}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @elseif(Session::get('status')=='Handset Display')
                <table id="dataListMetric" class="table table-bordered asd" width="100%">
                        <thead>
                          <tr id="theadsize">
                            <th >Country</th>
                            <th >Opertaor</th>
                             <th >Operator Code</th>
                            <th >Network Display</th>
                            <th >MNC</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $listData)
                          <tr>
                            <td>{{$listData->country}}</td>
                            <td>{{$listData->operator}}</td>
                              <td>{{$listData->operatorcode}}</td>
                            <td>{{$listData->networkdisplay}}</td>
                              <td>{{$listData->mnc}}</td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                @elseif(Session::get('status')=='Roaming Partner')
                <table id="dataListMetric" class="table table-bordered asd" width="100%">
                        <thead>
                          <tr id="theadsize">
                            <th >Country</th>
                            <th >Opertaor</th>
                            <th >Operator Code</th>
                            <th >Postpaid (Voice & SMS)</th>
                            <th >Postpaid (GPRS & MMS)</th>
                            <th >Postpaid (3GCS)</th>
                            <th >Postpaid (3GPS)</th>
                            <th >Postpaid (3GVT)</th>
                            <th >Prepaid Camel (VOICEMO)</th>
                            <th >Prepaid Voice & SMS</th>
                            <th >LTE</th>
                            <th >SMSI</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $listData)
                            @php
                            if (!function_exists('iconadd')) {
                            function iconadd($param){
                              if($param==1){
                                 $img="img/close-button-small.png";
                              }elseif($param==2){
                                $img="img/check-box-small.png" ;
                              }elseif($param==3){
                                $img="img/check-box-uh-small.png" ;
                              }else{
                                $img="img/check-box-uv-small.png" ;
                              }
                              return $img;
                            }
                          }
                              $POSTPAID_VOICE_SMS = iconadd($listData->POSTPAID_VOICE_SMS);
                              $POSTPAID_GPRS_MMS = iconadd($listData->POSTPAID_GPRS_MMS);
                              $POSTPAID_3GCS = iconadd($listData->POSTPAID_3GCS);
                              $POSTPAID_3GPS = iconadd($listData->POSTPAID_3GPS);
                              $POSTPAID_3GVT = iconadd($listData->POSTPAID_3GVT);
                              $PREPAIDCAMEL_VOICE_MO = iconadd($listData->PREPAIDCAMEL_VOICE_MO);
                              $PREPAID_VOICEMT_SMS = iconadd($listData->PREPAID_VOICEMT_SMS);
                              $lte = iconadd($listData->lte);
                              $smsi = iconadd($listData->smsi);


                            @endphp
                          <tr>
                            <td>{{$listData->country}}</td>
                            <td>{{$listData->operator}}</td>
                            <td>{{$listData->operatorcode}}</td>
                            <td><img src="{{asset($POSTPAID_VOICE_SMS)}}"></td>
                            <td><img src="{{asset($POSTPAID_GPRS_MMS)}}"></td>
                            <td><img src="{{asset($POSTPAID_3GCS)}}"></td>
                            <td><img src="{{asset($POSTPAID_3GPS)}}"></td>
                            <td><img src="{{asset($POSTPAID_3GVT)}}"></td>
                            <td><img src="{{asset($PREPAIDCAMEL_VOICE_MO)}}"></td>
                            <td><img src="{{asset($PREPAID_VOICEMT_SMS)}}"></td>
                            <td><img src="{{asset($lte)}}"></td>
                            <td><img src="{{asset($smsi)}}"></td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                @elseif(Session::get('status')=='Roaming Exchange Rate')
                <table id="dataListMetric" class="table table-bordered asd" width="100%">
                        <thead>
                          <tr id="theadsize">
                            <th >YMD</th>
                            <th >USD</th>
                            <th >IDR</th>
                            <th >EUR</th>
                            <th >AUD</th>
                            <th >CHF</th>
                            <th >GBP</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $listData)
                          <tr>
                            <td>{{$listData->ymd}}</td>
                            <td>{{$listData->usd}}</td>
                              <td>{{$listData->idr}}</td>
                            <td>{{$listData->eur}}</td>
                              <td>{{$listData->aud}}</td>
                              <td>{{$listData->chf}}</td>
                              <td>{{$listData->gbp}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                @endif
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
$(document).ready( function () {
    $('#dataListMetric').DataTable();
} );
    </script>
@endsection
