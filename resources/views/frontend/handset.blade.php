@extends('layouts.frontend.frontend')
@section('body')
<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">

        <iframe style="height:900px;width:100%;border:none;overflow-y:auto" src={!! $url !!}></iframe>
      </div>
    </div>
  </div>
</div>
@endsection
