@extends('layoutsnew.app')
@section('content')
<div class="col-9">
    @foreach($dataNews as $index => $news)
    <article class="article widget-article row">
        <div class="col-3">
            <div class="article-img" style='background-image: url("{{asset('images/'.$news->img)}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
                <a href="{{ url('news/detail', ['id' => $news->id, 'slug' => $news->slug]) }}">
                </a>
            </div>
        </div>
        <div class="col-9">
            <div class="article-body">
                <h4 class="article-title">
                    <a href="{{url('news/detail', ['id' => $news->id, 'slug' => $news->slug])}}">{{$news->title}}</a>
                </h4>
                <ul class="article-meta">
                    <li><i class="fa fa-clock-o"></i> {{ $news->created_at }}</li> |
                    <li><span>By {{$news->create_user->name }}</span></li>
                </ul>
                <p>{!! substr(strip_tags($news->konten),0,140) !!}...</p>
            </div>
        </div>
    </article>
    @endforeach
</div>
<div class="col-3">
    <div class="row">
        <div class="image-news" style='background-image: url("{{asset('images/frontend/roaming2.jpg')}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
        </div>
    </div>

    <div class="row" style="padding:10px;border:0.7px solid #f3f3f3;background:#f3f3f3;min-height:300px">
        <div class="col-lg-12">
            <div class="row"><h3>News Category</h3></div>
            <div class="row"><h3>{{ $categorynews->nama }}</h3></div>
            <div class="row">
                <ul>
                    @foreach($categorynews->news_lists as $listMenu)
                    <li><a href="{{url('news/detail', ['id' => $news->id, 'slug' => $news->slug])}}">{{$news->title}}</a></li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row"> -->
<div class="col-9">
    {{ $dataNews->links('vendor.pagination.bootstrap-4') }}
</div>
<!-- </div> -->

@endsection
