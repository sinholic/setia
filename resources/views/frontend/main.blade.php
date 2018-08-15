@extends('layouts.frontend.frontend')
@section('body')

		<!-- SECTION -->
		<div class="section" style="padding:0 0 0 0;">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row" style="padding:20px;">
					<!-- Main Column -->
					<div class="col-md-8">
						<!-- row -->
						<div class="row">
							<!-- Column 1 -->
							<div class="col-md-12 col-sm-12">
								<!-- section title -->
								<!-- <div class="section-title">
									<h2 class="title">Roaming</h2>
								</div> -->
								<!-- /section title -->
								@foreach(json_decode($dataAll) as $listData)
								<!-- ARTICLE -->
								 @if($loop->first)
								<article class="article">
									<div class="article-img" style='width:100%;height:360px;background-image: url("{{asset('images/'.$listData->img)}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
										<a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">

										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-camera"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">{{$listData->title}}</a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li> |
											<li><span>By {{$listData->name}}</span></li>
										</ul>
										<p>{!! substr(strip_tags($listData->konten),0,140) !!}...</p>
									</div>
								</article>
								<hr class="line">
								@else
								<!-- /ARTICLE -->

								<!-- ARTICLE -->
								<article class="article widget-article">
									<div class="article-img" style='background-image: url("{{asset('images/'.$listData->img)}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
										<a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">{{$listData->title}}</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li> |
											<li><span>By {{$listData->name}}</span></li>
										</ul>
											<p>{!! substr(strip_tags($listData->konten),0,140) !!}...</p>
									</div>
								</article>
							<hr class="line">
								@endif
								<!-- /ARTICLE -->

								@endforeach
								<!-- ARTICLE -->
								<!-- <article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article> -->
								<!-- /ARTICLE -->
								<!-- <article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article>
								<article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article>
								<article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article>
								<article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article>
								<article class="article widget-article">
									<div class="article-img">
										<a href="#">
											<img src="{{asset('images/frontend/no_image.jpg')}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Penambahan Roaming Partner Mei 2016</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li> |
											<li><span>By Soni Setiabudi</span></li>
										</ul>
											<p>Selama Bulan Mei 2016 terjadi penambahan kerja sama dengan Mitra Operator untuk International Roaming sehingga posisi sampai Mei 2016 adalah sebagai berikut :</p>
									</div>
								</article> -->
							</div>
							<!-- /Column 1 -->

							<!-- Column 2 -->

						</div>
						<!-- /row -->

						<!-- /row -->
					</div>
					<!-- /Main Column -->

					<!-- Aside Column -->
					@include('layouts.frontend.sidebar')
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<!-- AD SECTION -->
		<!-- <div class="visible-lg visible-md">
			<img class="center-block" src="./img/ad-3.jpg" alt="">
		</div> -->
		<!-- /AD SECTION -->


@endsection
@section('js')
<script>
function buttoncol(id){

        $(".collapse_menu"+id).collapse('toggle');

	}
	</script>
@endsection
