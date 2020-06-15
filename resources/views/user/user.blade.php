<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zid Khmm</title>
    <link rel="shortcut icon" href="ico.ico" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="user/css/clean-blog.css" rel="stylesheet">
    @yield('head')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top is-visible is-fixed"  id="mainNav">
    <div class="container">

        <a class="navbar-brand" @if((App::getLocale())=='ar') href="/?lang=ar" @else href="/?lang=en" @endif >Zid Khmm</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            @lang('messages.menu')
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" @if((App::getLocale())=='ar') href="/?lang=ar" @else href="/?lang=en" @endif>@lang('messages.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">@lang('messages.about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">@lang('messages.contact')</a>
                </li>
                <li class="nav-item">
                    <div class="row">
                        <a class="nav-link mr-1 ml-3" href="/?lang=en"><img src="user/img/usa.png" width="30" height="20"></a>
                        <a class="nav-link" href="/?lang=ar"><img src="user/img/alg.png" width="30" height="20"></a>
                    </div>

                </li>
                <li class="nav-item">

                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('user')

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/zidkhmm/?hl=fr">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/ZIDKHMM/?epa=SEARCH_BOX">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/channel/UCq73TIiN_krUyi2Q4xQ2ilA">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube  fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">@lang('messages.copyright') &copy; Zid Khmm 2020--@lang('messages.product by') OuailNazim </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="user/vendor/jquery/jquery.min.js"></script>
<script src="user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="user/js/clean-blog.js"></script>

</body>

</html>
