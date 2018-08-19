@extends('layouts.frontend.frontend')
@section('body')
<style>
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
  color:#fff !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: default;
    color: #fff !important;
    border: 1px solid transparent;
    background: transparent;
    box-shadow: none;
}
.section,select,input{
  color:#000 !important;
  font-size: 12px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button{
  color:#fff !important;
}
#theadsize>th{
  color:#fff !important;
}
</style>
<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">
          @if(Session::get('status')=='Opertaor Code')
          <table id="dataListMetric" class="table table-bordered asd" width="100%">
                  <thead>
                    <tr id="theadsize">
                      <th >ID</th>
                      <th >Appname</th>
                       <th >Aggr</th>
                      <th >Query</th>
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
                          <tr>
                            <td>{{$listData->country}}</td>
                            <td>{{$listData->operator}}</td>
                            <td>{{$listData->operatorcode}}</td>
                            <td>{{$listData->POSTPAID_VOICE_SMS}}</td>
                            <td>{{$listData->POSTPAID_GPRS_MMS}}</td>
                            <td>{{$listData->POSTPAID_3GCS}}</td>
                            <td>{{$listData->POSTPAID_3GPS}}</td>
                            <td>{{$listData->POSTPAID_3GVT}}</td>
                            <td>{{$listData->PREPAIDCAMEL_VOICE_MO}}</td>
                            <td>{{$listData->PREPAID_VOICEMT_SMS}}</td>
                            <td>{{$listData->lte}}</td>
                            <td>{{$listData->smsi}}</td>

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
