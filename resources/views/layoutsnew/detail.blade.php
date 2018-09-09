@extends('layoutsnew.app')
@section('content')
<!-- Main Column -->
<div class="col-md-12">

	<!-- breadcrumb -->
	@foreach(json_decode($dataDetail) as $listData)
	<ul class="article-breadcrumb">
		<li><a href="{{url('/')}}">Home</a></li>
		<li><a href="{{url('/news')}}">News</a></li>
		<li>{{$listData->title}}</li>
	</ul>
	<!-- /breadcrumb -->

	<!-- ARTICLE POST -->
	<div class="article article-post">

		<div>
			<ul class="article-info">
				<li class="article-category"><a href="#">News</a></li>
				<li class="article-type"><i class="fa fa-file-text"></i></li>
			</ul>
			<h1 class="article-title">{{$listData->title}}</h1>
			<ul class="article-meta">
				<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}} | <span>By {{$listData->name}}</span></li>
			</ul>
			<div class="news">{!! $listData->konten !!}</div>
		</div>

	</div>
	@endforeach
</div>
<!-- /Main Column -->
@endsection
