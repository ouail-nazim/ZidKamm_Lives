<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="dist/css/styles.css" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Zid Khmm</title>
        <link rel="shortcut icon" href="ico.ico" type="image/x-icon"/>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('head')
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0 text-white" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
                </button>
            <a class="navbar-brand" href="{{route('home')}}">Zid Khmm</a>
                <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get" action="{{route('sherch')}}">
                {{csrf_field()}}
                <div class="input-group">
                    <input class="form-control "style="width: 400px" name="search" value="{{old('search')}}" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-dark border-right border-bottom border-top" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item"><a class="nav-link " href="{{route('mesMessage')}}" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope fa-fw text-white"></i>@if(Config::get('message')>0) <span class="badge badge1 badge-danger">{{Config::get('message')}}</span> @endif </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw text-white"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link text-white" href="{{route('home')}}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-white"></i></div>
                                Dashboard </a
                            >
                            <div class="sb-sidenav-menu-heading">Manage my site</div>
                            <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                               aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-play fa-fw text-white"></i></div>
                                Lives
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('allLives')}}"><i class="fas fa-play fa-fw text-white mr-2"></i> ALl lives</a>
                                    <a class="nav-link" href="{{route('AddLive')}}"><i class="fas fa-plus fa-fw text-white mr-2"></i>ADD live</a>

                                </nav>
                            </div>
                            {{--<a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">--}}
                                {{--<div class="sb-nav-link-icon"><i class="fas fa-book-open text-white"></i></div>--}}
                                                {{--manage--}}
                                {{--<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                            {{--</a>--}}
                                            {{--<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">--}}
                                                {{--<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">--}}
                                                    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"--}}
                                                    {{-->Authentication--}}
                                                        {{--<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div--}}
                                                        {{--></a>--}}
                                                    {{--<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">--}}
                                                        {{--<nav class="sb-sidenav-menu-nested nav">--}}
                                                            {{--<a class="nav-link" href="login.html">Login</a>--}}
                                                            {{--<a class="nav-link" href="register.html">Register</a>--}}
                                            {{--<a class="nav-link" href="password.html">Forgot Password</a>--}}
                                        {{--</nav>--}}
                                    {{--</div>--}}
                                {{--</nav>--}}
                            {{--</div>--}}
                        
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin of Zid Khmm
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main class="p-4">
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Zid Khmm 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    </body>
</html>
