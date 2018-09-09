@extends('layoutsnew.app')
@section('content')
<!-- SECTION -->
		<div class="section" style="padding:0 0 0 0">
			<!-- CONTAINER -->
			<div class="container" >
				<!-- ROW -->
				<div class="row" style="padding:20px;">
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
							<!-- <div class="article-share">
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
							</div> -->

							<div class="article-main-img">
                @if($listData->img!='')
								<img src="{{asset('images/'.$listData->img)}}" >
                @else
                <img src="{{asset('images/frontend/roaming2.jpg')}}" >
                @endif
							</div>
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
						<!-- /ARTICLE POST -->

						<!-- widget tags -->
						<!-- <div class="widget-tags">
							<ul>
								<li><a href="#">News</a></li>
								<li><a href="#">Sport</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Music</a></li>
								<li><a href="#">Business</a></li>
							</ul>
						</div> -->
						<!-- /widget tags -->
						<!-- reply form -->

						<!-- /reply form -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->

		<!-- /SECTION -->
@endsection
