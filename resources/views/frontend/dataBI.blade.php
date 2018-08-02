@extends('layouts.frontend.frontend')
@section('body')
@php
// DataMicron Insta BI Authorization function
function InstaBILogin($urlLogin, $username, $password, $master)
{
    $curl = curl_init($urlLogin);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array("username" => $username . $master['username'], "password" => $username . $master['username'] . '@1234', "remember" => true)));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($curl);

	if (curl_errno($curl)) {
		return curl_error($curl);
	}
	curl_close($curl);
    $parse = json_decode($response, true);
    $token = $parse['accessToken'];
    return $token;

}


$ip_host = "10.251.94.146:2112";
$urlLogin = "https://$ip_host/login";
$username = "View";
$password = "Userx@123";

$master = $master;

$token = InstaBILogin($urlLogin, $username, $password, $master);
@endphp
<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">

        <div id="iframe-instabi" class="the-iframe width-100-persen h-100" style="margin-left: 0px;height:700px;overflow-y:auto"></div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/instabi.min.js') }}"></script>
<script>

$(document).ready(function(){
 var ibApp = new InstaBI('https://10.251.94.146:2112');

 //url should contain siteId and docId(objectId)
 ibApp.loginByToken('<?php echo $token;?>', function(err){
   if(err)
           alert(err + '<?php echo $token;?>');

   ibApp.openDocument({
     uri:'{{$data_bi->link_url}}'.replace(/&amp;/g, "&"),
     container:$('#iframe-instabi'),
     showToolbar:true
   });
 });
});
 </script>
 @endsection
