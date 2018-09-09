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
                          <li>
                          @guest
                            <a class="text-uppercase" onclick="login('{{ route('login') }}');" ><i style="color:#E5131D" class="fa fa-sign-in"></i> Login</a>
                            <!-- <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button> -->
                            @endguest
                            @auth
                            <a class="text-uppercase" onclick="login('{{ route('admin.index') }}');"><i style="color:#E5131D" class="fa fa-sign-in"></i> Admin</a>

                            @endauth
                          </li>
                            <!-- <li><a href="#" class="text-uppercase"><i class="fa fa-sign-in" style="color:#E5131D"></i> Login</a></li> -->
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
                      {{ Form::open(array('route' => 'frontend.search', 'class' => 'form-inline')) }}
                            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Center Header -->
</header>


    <!-- Nav Header -->
    <!-- <div id="nav-header" class="scarlet">
        <div class="container">
            <div class="row"> -->
                <nav id="" class="navbar navbar-expand-sm sticky-top scarlet navbar-light">
                    <div class="container">
                        <!-- <div class="row"> -->
                            <a class="navbar-brand" href="#">
                                <!-- <img src="{{asset('images/frontend/setialogo2 old.png')}}" alt=""> -->
                            </a>
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbar1">
                                <ul class="main-nav navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <?php $datamenu='a'; ?>
                                      @foreach(json_decode($menu_bi) as $listData_bi)
                                      @if($listData_bi->nama!=$datamenu && $listData_bi->nama!='')
                                      <li class="nav-item">
                                        <a class="nav-link" onclick='buttoncol({{$listData_bi->id}})'> {{$listData_bi->nama}}</a>
                                      </li>

                                        @elseif($listData_bi->nama=='')
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{url('news/pageBI', ['id' => $listData_bi->id_menu, 'nama' => $listData_bi->link_label])}}">{{$listData_bi->link_label}}</a>
                                            </li>
                                        @endif
                                    <!-- <li class="nav-item">
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
                                    </li> -->
                                      @endforeach
                                </ul>





                              <!-- <article class="article widget-article">
                              <div class="article-body">
                                  <h4 class="article-title"><i class="fa fa-line-chart" aria-hidden="true"></i>
                                      <a href="{{url('news/pageBI', ['id' => $listData_bi->id])}}">{{$listData_bi->nama}}</a></h4>
                              </div>
                            </article> -->

                            </div>
                        <!-- </div> -->
                    </div>
                </nav>
            <!-- </div>
        </div>
    </div> -->
    <!-- /Nav Header -->
<!-- </header> -->
<!-- /Header -->
