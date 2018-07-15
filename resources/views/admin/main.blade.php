@include('admin.header')
<body>
    @include('admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li {{{ (Request::is('*dashboard') ? 'class=active' : '') }}} ><a href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span> </a> </li>
                    <!-- <li  ><a href="{{ route('admin.master') }}"><i class="fas fa-list-alt"></i><span>Master Data</span> </a> </li> -->
                    <li class="nav-item dropdown {{{ (Request::is('*master*') ? 'active' : '') }}}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i><span>Master Data</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">News</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('continent.index') }}">Continent</a>
                            <a class="dropdown-item" href="{{ route('negara.index') }}">Negara</a>
                            <a class="dropdown-item" href="{{ route('kota.index') }}">Kota</a>
                            <a class="dropdown-item" href="{{ route('msc.index') }}">MSC</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('operator.index') }}">Operator</a>
                            <a class="dropdown-item" href="{{ route('groupoperator.index') }}">Group Operator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Telin Tariff</a>
                            <a class="dropdown-item" href="#">Exchange Rate</a>
                        </div>
                    </li>
                    <li><a href="guidely.html"><i class="fas fa-video"></i><span>App Tour</span> </a></li>
                    <li><a href="charts.html"><i class="fas fa-signal"></i><span>Charts</span> </a> </li>
                    <li><a href="shortcodes.html"><i class="fas fa-code"></i><span>Shortcodes</span> </a> </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-long-arrow-alt-down"></i><span>Drops</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="pricing.html">Pricing Plans</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                            <li><a href="error.html">404</a></li>
                        </ul>
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
    <div class="extra">
        <div class="extra-inner">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h4>
                                            About Free Admin Template</h4>
                        <ul>
                            <li><a href="javascript:;">EGrappler.com</a></li>
                            <li><a href="javascript:;">Web Development Resources</a></li>
                            <li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
                            <li><a href="javascript:;">Free Resources and Scripts</a></li>
                        </ul>
                    </div>
                    <!-- /col-3 -->
                    <div class="col-3">
                        <h4>
                                                Support</h4>
                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Video Tutorial</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- /col-3 -->
                    <div class="col-3">
                        <h4>
                                                    Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /col-3 -->
                    <div class="col-3">
                        <h4>
                                                        Open Source jQuery Plugins</h4>
                        <ul>
                            <li><a href="">Open Source jQuery Plugins</a></li>
                            <li><a href="">HTML5 Responsive Tempaltes</a></li>
                            <li><a href="">Free Contact Form Plugin</a></li>
                            <li><a href="">Flat UI PSD</a></li>
                        </ul>
                    </div>
                    <!-- /col-3 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /extra-inner -->
    </div>
    <!-- /extra -->
    <div class="footer">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/admin/chart.min.js') }}"></script>
    <script src="{{ asset('js/admin/full-calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/admin/base.js') }}"></script>
    <!-- <script src="{{ asset('js/admin/bootstrap.js') }}"></script> -->
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- App scripts -->
    @stack('scripts')
</body>

</html>
