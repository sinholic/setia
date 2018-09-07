<!-- Header -->
<header id="header" class="d-none d-md-block">
    <!-- Top Header -->
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-6 header-links">
                    <ul>
                        <li class="active"><a href="https://www.telkomsel.com/" title="Personal" class="active">Personal</a></li>
                        <li><a href="https://www.telkomsel.com/mybusiness" title="myBusiness" class="">myBusiness</a></li>
                        <li><a href="https://www.telkomsel.com/about-us" title="Tentang Kami" class="">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-6 header-social">
                    <div class="d-flex">
                        <ul class="ml-auto">
                            @guest
                                <li><a href="{{ route('login') }}" class="text-uppercase"><i class="fa fa-sign-in" style="color:#E5131D"></i> Login</a></li>
								<!-- <a style="color:#fff !important;" onclick="login('{{ route('login') }}');" ><i class="fa fa-sign-in"></i> Login</a> -->
								<!-- <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button> -->
							@endguest
							@auth
								<li><a style="color:#fff !important;" onclick="login('{{ route('admin.index') }}');"><i class="fa fa-sign-in"></i> Admin</a></li>
							@endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top Header -->

    <!-- Center Header -->
    <div id="center-header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="{{asset('images/frontend/setialogo2 old.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <div class="d-flex align-items-center ml-auto">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Center Header -->
</header>
    <!-- Nav Header -->
    <nav id="" class="navbar navbar-expand-sm sticky-top scarlet navbar-light">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="main-nav navbar-nav mr-auto">
                    @if(Request::is('*admin*'))
                        <li class="nav-item {{{ (Request::is('*dashboard') ? 'active' : '') }}}" >
                            <a class="nav-link" href="{{ route('admin.index') }}">Dashboard </a>
                        </li>
                        <li class="nav-item dropdown {{{ (Request::is('*news*') ? 'active' : '') }}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                News
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{{ (Request::is('*/categorynews*') ? 'active' : '') }}} " href="{{ route('categorynews.index') }}">Category News List</a>
                                <a class="dropdown-item {{{ (Request::is('*/newscrud*') ? 'active' : '') }}} " href="{{ route('newscrud.index') }}">News</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{{ (Request::is('*master*') ? 'active' : '') }}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Master Data
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item {{{ (Request::is('*/finance*') ? 'active' : '') }}} " href="{{ route('finance.index') }}">Finance</a>
                                <a class="dropdown-item {{{ (Request::is('*/target*') ? 'active' : '') }}} " href="{{ route('target.index') }}">Target</a>
                            </div>
                        </li>
                        @if(\Auth::user()->group->nama == 'Group Administrator')
                        <li class="nav-item dropdown {{{ (Request::is('*user*') ? 'active' : '') }}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Users
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{{ (Request::is('*/user*') ? 'active' : '') }}} " href="{{ route('user.index') }}">Users List</a>
                                <a class="dropdown-item {{{ (Request::is('*/groupuser*') ? 'active' : '') }}} " href="{{ route('groupuser.index') }}">Users Group</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{{ (Request::is('*menu*') ? 'active' : '') }}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{{ (Request::is('*/menu*') ? 'active' : '') }}} " href="{{ route('menu.index') }}">Menu List</a>
                                <a class="dropdown-item {{{ (Request::is('*/groupmenu*') ? 'active' : '') }}} " href="{{ route('groupmenu.index') }}">Menu Group</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{{ (Request::is('*csv*') ? 'active' : '') }}}">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CSV
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{{ (Request::is('*/uploaddata*') ? 'active' : '') }}} " href="{{ route('uploaddata.index') }}">Upload</a>
                                <a class="dropdown-item {{{ (Request::is('*/manage*') ? 'active' : '') }}} " href="{{ route('manage.index') }}">Manage Config</a>
                            </div>
                        </li>
                        @endif
                        @inject('groups', 'App\GroupMenu')
                        <li class="nav-item dropdown {{{ (Request::is('*/instabi*') ? 'active' : '') }}}">
                            <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Report
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
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Nav Header -->
<!-- </header> -->
<!-- /Header -->
