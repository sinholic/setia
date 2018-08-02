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
								<div class="section-title">
									<h2 class="title">Roaming</h2>
								</div>
								<!-- /section title -->
								@foreach(json_decode($dataAll) as $listData)
								<!-- ARTICLE -->
								 @if($loop->first)
								<article class="article">
									<div class="article-img">
										<a href="{{url('news/detail', ['id' => $listData->id])}}">
											<img src="{{asset('images/'.$listData->img)}}" style="height:auto" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-camera"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="{{url('news/detail', ['id' => $listData->id])}}">{{$listData->title}}</a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li> |
											<li><span>By {{$listData->name}}</span></li>
										</ul>
										<p>{!! substr(strip_tags($listData->konten),0,140) !!}...</p>
									</div>
								</article>
								<hr>
								@else
								<!-- /ARTICLE -->

								<!-- ARTICLE -->
								<article class="article widget-article">
									<div class="article-img">
										<a href="{{url('news/detail', ['id' => $listData->id])}}">
											<img src="{{asset('images/'.$listData->img)}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="{{url('news/detail', ['id' => $listData->id])}}">{{$listData->title}}</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li> |
											<li><span>By {{$listData->name}}</span></li>
										</ul>
											<p>{!! substr(strip_tags($listData->konten),0,140) !!}...</p>
									</div>
								</article>
								<hr>
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
					<div class="col-md-4">
						<!-- Ad widget -->
						<!-- <div class="widget center-block hidden-xs">
							<img class="center-block" src="./img/ad-1.jpg" alt="">
						</div> -->
						<!-- /Ad widget -->

						<!-- social widget -->
						<!-- <div class="widget social-widget">
							<div class="widget-title">
								<h2 class="title">Stay Connected</h2>
							</div>
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
								<li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
								<li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
								<li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
								<li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
							</ul>
						</div> -->
						<!-- /social widget -->

						<!-- subscribe widget -->
						<!-- <div class="widget subscribe-widget">
							<div class="widget-title">
								<h2 class="title">Subscribe to Newslatter</h2>
							</div>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="input-btn">Subscribe</button>
							</form>
						</div> -->
						<!-- /subscribe widget -->
						<div class="widget" >
							<div class="section-title" style="margin:0">
								<h2 class="title">Menu Analisys</h2>
							</div>
							<div style="background:#fff;padding:5px;border:solid 0.7px #ddd">
								<?php $datamenu='a'; ?>
								@foreach($menu_bi as $index_bi => $listData_bi)

								<article class="article widget-article" style="margin-bottom:10px !important">
								<ul class="article-body">
									@if($listData_bi->nama!=$datamenu && $listData_bi->nama!='')
										<h4 class="article-title" onclick='buttoncol({{$listData_bi->id}})'><i class="fa fa-line-chart" aria-hidden="true"></i> {{$listData_bi->nama}}</h4>
										@elseif($listData_bi->nama=='')
										<a href="{{url('news/pageBI', ['id' => $listData_bi->id_menu])}}"><h4 class="article-title"><i class="fa fa-line-chart" aria-hidden="true"></i> {{$listData_bi->link_label}}</h4></a>
										@endif
								<li style="background:#ddd;padding:10px;margin-bottom:0;" class="collapse collapse_menu{{$listData_bi->id}}">
							   <a href="{{url('news/pageBI', ['id' => $listData_bi->id_menu])}}">{{$listData_bi->link_label}}</a>
							 </li>
						 </ul>
						</article>
							<?php $datamenu=$listData_bi->nama; ?>
							<!-- <article class="article widget-article">
							<div class="article-body">
									<h4 class="article-title"><i class="fa fa-line-chart" aria-hidden="true"></i>
											<a href="{{url('news/pageBI', ['id' => $listData_bi->id])}}">{{$listData_bi->nama}}</a></h4>
							</div>
						</article> -->
							@endforeach
						</div>
						</div>
						<!-- article widget -->
						<div class="widget">
							<div class="section-title">
								<h2 class="title">Most Featured</h2>
							</div>
							@foreach(json_decode($dataAll) as $index => $listData)
							<!-- ARTICLE -->

							@if($index< 4)

							<article class="article widget-article">
								<div class="article-img">
									<a href="#">
										<img src="{{asset('images/'.$listData->img)}}" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="#">{{$listData->title}}</a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> {{$listData->updated_at}}</li>
										<li>By {{$listData->name}}</li>
									</ul>
								</div>
							</article><hr>
							<!-- /ARTICLE -->
							@endif
							@endforeach

						</div>
						<!-- /article widget -->
					</div>
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
