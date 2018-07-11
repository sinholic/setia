<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{ route('frontend.index') }}">
                <img src="{{asset('images/frontend/setialogo2.png')}}" alt="" style="height:25px;">
            </a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    @guest
                    <li class="">
						<a href="signup.html" class="">
							Don't have an account?
						</a>
					</li>
					<li class="">
						<a href="{{ route('frontend.index') }}" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
					</li>
                    @endguest
                    @auth
                    <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon-cog"></i> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Settings</a></li>
                            <li><a href="javascript:;">Help</a></li>
                        </ul>
                    </li> -->
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                    data-toggle="tooltip" data-placement="top" title="Logout"
                                    >
                                    Logout
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
