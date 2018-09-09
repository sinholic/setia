@include('layoutsnew.header')
    @include('layoutsnew.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">

            </div>
            @yield('content')
            <div class="col-12 py-5">

            </div>
        </div>
    </div>
@include('layoutsnew.footer')
