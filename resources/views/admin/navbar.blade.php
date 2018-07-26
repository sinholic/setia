<div class="navbar navbar-fixed-top navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <img src="{{asset('images/frontend/setialogo2.png')}}" alt="" style="height:25px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                <!-- <li class="nav-item">
					<a href="signup.html" class="nav-link">
						Don't have an account?
					</a>
				</li> -->
				<li class="nav-item">
					<a href="{{ route('frontend.index') }}" class="nav-link">
						<i class="icon-chevron-left"></i>
						Back to Homepage
					</a>
				</li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="javascript:;">Profile</a> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            data-toggle="tooltip" data-placement="top" title="Logout"
                            >
                            Logout
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
        <!--/.navbar-collapse -->
    </div>
    <!-- /container -->
</div>
<!-- /navbar -->
