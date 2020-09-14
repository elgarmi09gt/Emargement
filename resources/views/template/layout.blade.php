<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title','Emargement')

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

    <script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

</head>
<body>
<?php
$segment = Request::segment(2);
?>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="{{asset('img/sidebar-4.jpg')}}">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper" style="width:100%">
            <div class="logo">
                <a href="#" class="simple-text">
                    Ucad Emargement
                </a>
            </div>

            <ul class="nav" style="font-size: 8px; width:110%">
                <li class=" @if(!$segment) active @endif">
                    <a href="{{ route('home') }}">
                        <i class="pe-7s-home"></i>
                        <p>ACCUEIL</p>
                    </a>
                </li>
                <li class=" @if($segment == 'emargement') active @endif">
                    <a href="#">
                        <i class="pe-7s-id"></i>
                        <p>EMARGEMENT</p>
                    </a>
                </li>
                 {{-- route('admin.bordereaufournisseurs.index')
                <li class=" @if($segment == 'bordereaufournisseurs') active @endif">
                    <a href="#">
                        <i class="pe-7s-news-paper"></i>
                        <p>LISTES DE COLISSAGES</p>
                    </a>
                </li>
                {{--
                <li class=" @if($segment == 'client') active @endif">
                    <a href="{{ route('admin.client.index') }}">
                        <i class="pe-7s-user"></i>
                        <p>CLIENTS</p>
                    </a>
                </li>
                <li class=" @if($segment == 'bordereaulivraison') active @endif">
                    <a href="{{ route('admin.bordereaulivraison.index') }}">
                        <i class="pe-7s-bookmarks"></i>
                        <p>BORDEREAU DE LIVRAISON</p>
                    </a>
                </li>
                <li class=" @if($segment == 'vente') active @endif">
                    <a href="{{ route('admin.vente.index') }}">
                        <i class="pe-7s-cart"></i>
                        <p>VENTES</p>
                    </a>
                </li>
                <li class=" @if($segment == 'articles') active @endif">
                    <a href="{{ route('admin.articles.index')}}">
                        <i class="pe-7s-ribbon"></i>
                        <p>NOUVEAU ARTICLE</p>
                    </a>
                </li>
                <li class=" @if($segment == 'articlerecus') active @endif">
                    <a href="{{ route('admin.articlerecus.index')}}">
                        <i class="pe-7s-albums"></i>
                        <p>STOCK</p>
                    </a>
                </li>
                <li class=" @if($segment == 'articlesabimes') active @endif">
                    <a href="{{ route('admin.articlesabimes.index')}}">
                        <i class="pe-7s-shield"></i>
                        <p>ARTICLES ABIMES</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-box1"></i>
                        <p>GAMMES</p>
                    </a>
                </li>
                <li class=" @if($segment == 'categories') active @endif">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="pe-7s-file"></i>
                        <p>CATEGORIES</p>
                    </a>
                </li>
                <li class=" @if($segment == 'souscategories') active @endif">
                    <a href="{{ route('admin.souscategories.index') }}">
                        <i class="pe-7s-copy-file"></i>
                        <p>SOUS CATEGORIES</p>
                    </a>
                </li>
                @if(Auth::user()->niveau == 2)
                    <li class=" @if($segment == 'utilisateurs') active @endif">
                        <a href="{{ route('admin.utilisateurs.index') }}">
                            <i class="pe-7s-users"></i>
                            <p>UTILISATEURS</p>
                        </a>
                    </li>
                @endif

                --}}
            </ul>
        </div>
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('js/demo.js')}}"></script>


<script src="{{ asset('js/toastr.min.js') }}"></script>

<script type="text/javascript">
    @if(Session::has('success'))
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-angle-down-circle',
            message: "{{Session::get('success')}}"

        },{
            type: 'success',
            timer: 2000
        });

    });
    @endif

    @if(Session::has('error'))
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-angle-down-circle',
            message: "{{Session::get('error')}}"

        },{
            type: 'error',
            timer: 2000
        });

    });
    @endif

    @if(Session::has('info'))
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-info',
            message: "{{Session::get('info')}}"

        },{
            type: 'info',
            timer: 2000
        });

    });
    @endif

</script>
</html>
