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
						<ul class="article-breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">News</a></li>
							<li>Duis urbanitas eam in, tempor consequat.</li>
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
								<img src="{{asset('images/frontend/not_avail.png')}}" style="height:auto" >
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#">News</a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title">Duis urbanitas eam in, tempor consequat.</h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> April 04, 2017</li> |
									<li><i class="fa fa-comments"></i>By Soni Setiabudi </li>
								</ul>
								<p>Facilisi complectitur eos eu. Est tritani argumentum in, ei suas ignota admodum vim, ipsum choro has ut. Ei vim noluisse luptatum, nominavi mandamus qui ut. Ne usu lucilius mnesarchum, vim ex nisl summo expetenda, in dicta appareat usu. Ea cum altera fuisset adipisci, in sed eius tacimates, eu duo magna numquam placerat.</p>
								<p>Sea at dolorum nominavi adipiscing, ei eam mundi legimus, sit deleniti definiebas et. Pri dicit latine reformidans ne, offendit rationibus incorrupte an qui, eum populo molestie tacimates te. Nec ea facer vituperatoribus, cu pro feugiat minimum platonem. Elit accusam ei per. Duis illum est ut.</p>
								<p>Ex eos esse sale eligendi. Eos ut exerci audire nostrum, at pro dolores tacimates voluptaria. Facete disputando at quo, omittantur philosophia id qui. Ad labore facete suscipiantur sed. Cu iisque sanctus inciderint has, per quodsi liberavisse ea.</p>
								<p>Sit falli nonumes atomorum ex, ipsum populo iisque eum at. Sumo solet omnium eum ad, quis omnium ut ius, volumus splendide sed ad. Mea vide dicta ne, appareat patrioque has an. Wisi sale delectus eum eu, corpora salutatus no sit. Sale interesset eu per.</p>
								<h4>Sit falli nonumes atomorum ex, ipsum populo iisque eum at</h4>
								<p>Facilisi complectitur eos eu. Est tritani argumentum in, ei suas ignota admodum vim, ipsum choro has ut. Ei vim noluisse luptatum, nominavi mandamus qui ut. Ne usu lucilius mnesarchum, vim ex nisl summo expetenda, in dicta appareat usu. Ea cum altera fuisset adipisci, in sed eius tacimates, eu duo magna numquam placerat.</p>
								<p>Sea at dolorum nominavi adipiscing, ei eam mundi legimus, sit deleniti definiebas et. Pri dicit latine reformidans ne, offendit rationibus incorrupte an qui, eum populo molestie tacimates te. Nec ea facer vituperatoribus, cu pro feugiat minimum platonem. Elit accusam ei per. Duis illum est ut.</p>
								<p>Ex eos esse sale eligendi. Eos ut exerci audire nostrum, at pro dolores tacimates voluptaria. Facete disputando at quo, omittantur philosophia id qui. Ad labore facete suscipiantur sed. Cu iisque sanctus inciderint has, per quodsi liberavisse ea.</p>
								<p>Sit falli nonumes atomorum ex, ipsum populo iisque eum at. Sumo solet omnium eum ad, quis omnium ut ius, volumus splendide sed ad. Mea vide dicta ne, appareat patrioque has an. Wisi sale delectus eum eu, corpora salutatus no sit. Sale interesset eu per.</p>
							</div>
						</article>
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
