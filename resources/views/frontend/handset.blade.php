@extends('layouts.frontend.frontend')
@section('body')
<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">
        	@foreach($menu_bi as $listData)
        <iframe style="height:900px;width:100%;border:none;overflow-y:auto" src="{{$listData->link_url}}"></iframe>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
