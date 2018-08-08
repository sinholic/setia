@include('admin.header')
<body>
    @include('admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li {{{ (Request::is('*dashboard') ? 'class=active' : '') }}} ><a href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span> </a> </li>
                    <li class="nav-item dropdown {{{ (Request::is('*news*') ? 'active' : '') }}}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i><span>News</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{{ (Request::is('*/categorynews*') ? 'active' : '') }}} " href="{{ route('categorynews.index') }}">Category News List</a>
                            <a class="dropdown-item {{{ (Request::is('*/newscrud*') ? 'active' : '') }}} " href="{{ route('newscrud.index') }}">News</a>
                        </div>
                    </li>
                    <!-- <li  ><a href="{{ route('admin.master') }}"><i class="fas fa-list-alt"></i><span>Master Data</span> </a> </li> -->
                    <li class="nav-item dropdown {{{ (Request::is('*master*') ? 'active' : '') }}}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i><span>Master Data</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{{ (Request::is('*/continent*') ? 'active' : '') }}} " href="{{ route('continent.index') }}">Continent</a>
                            <a class="dropdown-item {{{ (Request::is('*/negara*') ? 'active' : '') }}} " href="{{ route('negara.index') }}">Negara</a>
                            <a class="dropdown-item {{{ (Request::is('*/kota*') ? 'active' : '') }}} " href="{{ route('kota.index') }}">Kota</a>
                            <a class="dropdown-item {{{ (Request::is('*/msc*') ? 'active' : '') }}} " href="{{ route('msc.index') }}">MSC</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{{ (Request::is('*/operator*') ? 'active' : '') }}} " href="{{ route('operator.index') }}">Operator</a>
                            <a class="dropdown-item {{{ (Request::is('*/groupoperator*') ? 'active' : '') }}} " href="{{ route('groupoperator.index') }}">Group Operator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{{ (Request::is('*/telintarif*') ? 'active' : '') }}} " href="{{ route('telintarif.index') }}">Telin Tariff</a>
                            <a class="dropdown-item {{{ (Request::is('*/exchangerate*') ? 'active' : '') }}} " href="{{ route('exchangerate.index') }}">Exchange Rate</a>
                        </div>
                    </li>
                    @if(\Auth::user()->group->nama == 'Group Administrator')
                    <li class="nav-item dropdown {{{ (Request::is('*user*') ? 'active' : '') }}}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i><span>Users</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{{ (Request::is('*/user*') ? 'active' : '') }}} " href="{{ route('user.index') }}">Users List</a>
                            <a class="dropdown-item {{{ (Request::is('*/groupuser*') ? 'active' : '') }}} " href="{{ route('groupuser.index') }}">Users Group</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{{ (Request::is('*menu*') ? 'active' : '') }}}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i><span>Menu</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{{ (Request::is('*/menu*') ? 'active' : '') }}} " href="{{ route('menu.index') }}">Menu List</a>
                            <a class="dropdown-item {{{ (Request::is('*/groupmenu*') ? 'active' : '') }}} " href="{{ route('groupmenu.index') }}">Menu Group</a>
                        </div>
                    </li>
                    @endif
                    @inject('groups', 'App\GroupMenu')
                    <li class="nav-item dropdown {{{ (Request::is('*/instabi*') ? 'active' : '') }}}">
                        <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cubes "></i><span>Report</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                                $groupmenus = $groups->with('menus')
                                ->whereHas('menus', function ($query) {
                                    $query->where('is_show_on_sidebar', 1)
                                        ->where('is_public', 0);
                                })
                                ->whereHas('menus.groupuser', function ($query) {
                                    $query->where('id_group_user', \Auth::user()->id_group);
                                })
                                ->get();
                                // dd($groupmenus);
                            ?>
                        @foreach($groupmenus as $groupmenu)
                            <a class="dropdown-item dropdown-toggle dropdown-dropright" href="#">{{ $groupmenu->nama }}</a>
                            <div class="dropdown-menu dropright">
                                @foreach($groupmenu->menus as $menu)
                                    @if($menu->is_frame)
                                        <a class="dropdown-item " href="{{ route('admin.instabi', $menu->link_slug) }}">{{ $menu->link_label }}</a>
                                    @else
                                        <a class="dropdown-item " href="{{ $menu->link_url }}">{{ $menu->link_label }}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
    <div class="main">
        <div class="main-inner">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->

    <!-- /extra -->
    <div class="footer fixed-bottom">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12"> &copy; 2018 <a href="#">SETIA - Portal News</a>. </div>
                    <!-- /span12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-inner -->
    </div>
    <!-- /footer -->
    <!-- Le javascript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('js/admin/bootstrap-4-navbar.js') }}"></script>
    <script src="{{ asset('js/admin/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/admin/chart.min.js') }}"></script>
    <script src="{{ asset('js/admin/full-calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/admin/base.js') }}"></script>
    <!-- <script src="{{ asset('js/admin/bootstrap.js') }}"></script> -->
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- App scripts -->
    <script type="text/javascript">
        $(document).on("submit", ".delete-me", function(e){
            // console.log('hai');
            // return false;
            return confirm("Do you want to delete this item?");
        });
        $(document).ready(function() {
            $( ".datetimepicker-input" ).each(function( index ) {
                console.log( index + ": " + $( this ).val() );
                var date = moment($( this ).val(), 'YYYY-MM-DD').toDate();
                console.log(date);
                $(this).datetimepicker({
                    date:date,
                    format: 'YYYY-MM-DD'
                });
            });
            $('select').not('.phpdebugbar-datasets-switcher').select2({
                theme: "bootstrap"
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
