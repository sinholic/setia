@extends('admin.main')
@section('content')
<div class="col-md-6">
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
<div class="col-md-6">
    <div class="widget">
        <div class="widget-header"> <i class="icon-bookmark fas fa-bookmark"></i>
            <h3>Shortcuts to Master Data</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <div class="shortcuts">
                <a href="{{ route('continent.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-globe"></i>
                    <span class="shortcut-label">Continent</span>
                </a>
                <a href="{{ route('negara.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-flag"></i>
                    <span class="shortcut-label">Negara</span>
                </a>
                <a href="{{ route('groupoperator.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-signal"></i>
                    <span class="shortcut-label">Group Operator</span>
                </a>
                <a href="{{ route('operator.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-mobile-alt "></i>
                    <span class="shortcut-label">Operator</span>
                </a>
                <a href="{{ route('telintarif.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-money-bill "></i>
                    <span class="shortcut-label">Telin Tariff</span>
                </a>
                <a href="{{ route('kota.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-building "></i>
                    <span class="shortcut-label">Kota</span>
                </a>
                <a href="{{ route('msc.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-broadcast-tower"></i>
                    <span class="shortcut-label">MSC</span>
                </a>
                <a href="{{ route('exchangerate.index') }}" class="shortcut">
                    <i class="shortcut-icon fas fa-hand-holding-usd"></i>
                    <span class="shortcut-label">Exchange Rate</span>
                </a>
            </div>
            <!-- /shortcuts -->
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
@endsection


@push('scripts')
<script>
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]

    }

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]

    }

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1)
            }, {
                title: 'Long Event',
                start: new Date(y, m, d + 5),
                end: new Date(y, m, d + 7)
            }, {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false
            }, {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false
            }, {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            }, {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            }, {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false
            }, {
                title: 'EGrappler.com',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://EGrappler.com/'
            }]
        });
    });
</script>
<!-- /Calendar -->
<script>

</script>
@endpush
