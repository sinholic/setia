@extends('admin.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-bookmark fas fa-list-alt"></i>
                    <h3> Today's Stats</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div class="widget big-stats-container">
                        <div class="widget-content">
                            <h6 class="bigstats">A fully responsive premium quality admin template built on Twitter Bootstrap by <a href="http://www.egrappler.com" target="_blank">EGrappler.com</a>.  These are some dummy lines to fill the area.</h6>
                            <div id="big_stats" class="cf">
                                <div class="stat"> <i class="fas fa-anchor"></i> <span class="value">851</span> </div>
                                <!-- .stat -->

                                <div class="stat"> <i class="fas fa-thumbs-up-alt"></i> <span class="value">423</span> </div>
                                <!-- .stat -->

                                <div class="stat"> <i class="fas fa-twitter-sign"></i> <span class="value">922</span> </div>
                                <!-- .stat -->

                                <div class="stat"> <i class="fas fa-bullhorn"></i> <span class="value">25%</span> </div>
                                <!-- .stat -->
                            </div>
                        </div>
                        <!-- /widget-content -->

                    </div>
                </div>
            </div>
            <!-- /widget -->
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-bookmark fas fa-list-alt"></i>
                    <h3> Recent News</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <ul class="news-items">
                        @foreach($news as $berita)
                        <li>

                            <div class="news-item-date"> <span class="news-item-day">{{ $berita->created_at->format('d') }}</span> <span class="news-item-month">{{ $berita->created_at->format('M') }}</span> </div>
                            <div class="news-item-detail"> <a href="{{url('news/detail', ['id' => $berita->id])}}" class="news-item-title" target="_blank">{{ $berita->title }}</a>
                                <p class="news-item-preview">{!! substr(strip_tags($berita->konten), 0, 200) !!}</p>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget -->
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-bookmark fas fa-list-alt"></i>
                    <h3> Recent News</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div id='calendar'>
                    </div>
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget -->
        </div>
        <!-- /col-6 -->
        <div class="col-6">
            <div class="widget">
                <div class="widget-header"> <i class="icon-bookmark fas fa-bookmark"></i>
                    <h3>Important Shortcuts</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div class="shortcuts">
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-globe"></i>
                            <span class="shortcut-label">Continent</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-flag"></i>
                            <span class="shortcut-label">Negara</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-signal"></i>
                            <span class="shortcut-label">Group Operator</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-mobile-alt "></i>
                            <span class="shortcut-label">Operator</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-money-bill "></i>
                            <span class="shortcut-label">Telin Tariff</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-building "></i>
                            <span class="shortcut-label">Kota</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-broadcast-tower"></i>
                            <span class="shortcut-label">MSC</span>
                        </a>
                        <a href="javascript:;" class="shortcut">
                            <i class="shortcut-icon fas fa-hand-holding-usd"></i>
                            <span class="shortcut-label">Exchange Rate</span>
                        </a>
                    </div>
                    <!-- /shortcuts -->
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget -->
            <div class="widget widget-table action-table">
                <div class="widget-header"> <i class="icon-bookmark fas fa-th-list"></i>
                    <h3>Recent Continent</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <table id="continent-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama</th>
                            </tr>
                        </thead>

                    </table>
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget -->
            <div class="widget">
                <div class="widget-header"> <i class="icon-bookmark fas fa-signal"></i>
                    <h3> Area Chart Example</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
                    <!-- /area-chart -->
                </div>
                <!-- /widget-content -->
            </div>
            <!-- /widget -->
        </div>
        <!-- /col-6 -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection


@push('scripts')
<script>
$(function() {
    $('#continent-table').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        bLengthChange: false,
        pageLength: 5,
        ajax: '{!! route('datatables.continent') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' }
        ]
    });
});
</script>
@endpush
