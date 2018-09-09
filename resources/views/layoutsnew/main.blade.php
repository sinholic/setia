@extends('layoutsnew.app')
@section('content')
<style>

</style>
<div class="container">

    <div class="row" style="margin-bottom:20px;">
      <div class="col-lg-9" style="padding-top:10px;">
        <table id="listnews" class="" width="100%">
          <thead >
            <tr><td></td><td></td></tr>
          </thead>
                <tbody>
                  @foreach($dataAll as $listData)
                  <tr>
                    <td style="width:150px;">
                        @if($listData->img!='')
                        <div  class="image-news" style='background-image: url("{{asset('images/'.$listData->img)}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
                        @else
                        <div  class="image-news" style='background-image: url("{{asset('images/frontend/roaming2.jpg')}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
                        @endif
                          <a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">
                          </a>
                      </div>
                    </td>
                    <td>
                      <h4 class="article-title"><a href="{{url('news/detail', ['id' => $listData->id, 'slug' => $listData->slug])}}">{{$listData->title}}</a></h4>
                      <ul class="article-meta">
                        <li><i class="fa fa-clock-o"></i> {{$listData->updated_at}} | <span>By {{$listData->name}}</span></li>
                      </ul>
                        <p class="news">{!! substr(strip_tags($listData->konten),0,160) !!}...</p>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>



      </div>
      <div class="col-lg-3" style="padding-top:10px;">
        <div class="row">
            <div class="image-news" style='background-image: url("{{asset('images/frontend/roaming2.jpg')}}"); background-size: cover; background-position: center top; background-repeat: no-repeat;'>
            </div>
        </div>

        <div class="row" style="padding:10px;border:0.7px solid #f3f3f3;background:#f3f3f3;min-height:300px">
          <div class="col-lg-12">
            <div class="row"><h3>Category</h3></div>
            <div class="row">
              <ul>
                @foreach($categorynews as $listMenu)
              <li><a href="{{url('news/category', ['id' => $listMenu->id])}}">{{$listMenu->nama}}</li>
              @endforeach
            </ul>
            </div>
          </div>

        </div>
      </div>
    </div>


    <!--/row-->
</div>
<!--container-->
@endsection
@section('js')
<script>
$(document).ready( function () {
    $('#listnews').DataTable({
      "searching": false,   // Search Box will Be Disabled
      "ordering": false,
      "bPaginate": true,
      "iDisplayLength": 5,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false
    });
} );
    </script>
@endsection
