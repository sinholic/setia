@extends('layouts.frontend.frontend')
@section('body')
<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">

						<!-- breadcrumb -->
						@foreach(json_decode($dataDetail) as $listData)
						<ul class="article-breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">News</a></li>
							<li>{{$listData->title}}</li>
						</ul>
						<!-- /breadcrumb -->

						<!-- ARTICLE POST -->
						<article class="article article-post">
							<!-- <div class="article-share">
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
							</div> -->

							<div class="article-main-img">
								<img src="{{asset('images/frontend/'.$listData->img)}}" style="height:auto" >
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#">News</a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title">{{$listData->title}}</h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li> |
									<li>By {{$listData->name}}</li>
								</ul>
								{!! $listData->konten !!}
							</div>

						</article>
							@endforeach
						<!-- /ARTICLE POST -->

						<!-- widget tags -->
						<div class="widget-tags">
							<ul>
								<li><a href="#">News</a></li>
								<li><a href="#">Sport</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Music</a></li>
								<li><a href="#">Business</a></li>
							</ul>
						</div>
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
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">Related Post</h2>
						</div>
						<!-- /section title -->

						<!-- row -->
						<div class="row">
							<!-- Column 1 -->
							<div class="col-md-3 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-camera"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column 1 -->

							<!-- Column 2 -->
							<div class="col-md-3 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column 2 -->

							<!-- Column 3 -->
							<div class="col-md-3 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-file-text"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column 3 -->

							<!-- Column 4 -->
							<div class="col-md-3 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-file-text"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- Column 4 -->
						</div>
						<!-- /row -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
@endsection
