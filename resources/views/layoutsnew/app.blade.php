@include('layoutsnew.header')
    @include('layoutsnew.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 py-3">

            </div>
        </div>
        <div class="row">
            @yield('content')
        </div>
        <div class="row">
            <div class="col-12 py-5">

            </div>
        </div>
    </div>
@include('layoutsnew.footer')
