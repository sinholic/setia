@extends('layoutsnew.app')
@section('content')
    <div class="col-8 my-5">
        @foreach($dataNews as $index => $news)
        <article class="article widget-article">
            <div class="col-2">
                <div class="article-img" style='background-image: url("{{asset('images/'.$news->img)}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
                    <a href="{{ url('news/detail', ['id' => $news->id, 'slug' => $news->slug]) }}">
                    </a>
                </div>
            </div>
            <div class="col-10">
                <div class="article-body">
                    <h4 class="article-title"><a href="{{url('news/detail', ['id' => $news->id, 'slug' => $news->slug])}}">{{$news->title}}</a></h4>
                    <ul class="article-meta">
                        <li><i class="fa fa-clock-o"></i> {{ $news->created_at }}</li> |
                        <li><span>By {{$news->create_user->name }}</span></li>
                    </ul>
                        <p>{!! substr(strip_tags($news->konten),0,140) !!}...</p>
                </div>
            </div>
        </article>
        @endforeach
        {{ $dataNews->links() }}
    </div>
    <div class="col-4 my-5">

    </div>

@endsection
