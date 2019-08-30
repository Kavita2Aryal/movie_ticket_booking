
<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" media="all" />

    <title>@yield('title',$title)</title>

    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}" type="text/css" media="all" />
    <link rel="icon" href="{{asset('assets/logo/Chrysanthemum.jpg')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <script src="{{asset('assets/js/modernizr.js')}}"></script>
    <script src='{{asset('assets/js/jquery.min.js')}}'></script>
    <script src='{{asset('assets/js/jquery.color-RGBa-patch.js')}}'></script>
    <script src='{{asset('assets/js/example.js')}}'></script>
    <!-- jQuery -->
    <!-- FlexSlider -->
    <script defer src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            SyntaxHighlighter.all();
        });
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- DC Tabs CSS -->
    <link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
    <!-- jQuery Library (skip this step if already called on page ) -->
    <script type="text/javascript" src="http://www.dreamtemplate.com/dreamcodes/jquery.min.js"></script> <!-- (do not call twice) -->
    <!-- DC Tabs JS -->
    <!--<script type="text/javascript" src="http://www.dreamtemplate.com/dreamcodes/tabs/js/tsc_tabs.js"></script>-->
    <link rel="stylesheet" href="{{asset('assets/css/tsc_tabs.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" media="all" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</head>
<body>

@php
    $menus =get_menus();
    $movies =get_movies_list();
@endphp


<div class="header">
    <div class="header-top">
        <div class="wrap">
            <div class="banner-no">
                <img src="{{asset('assets/images/banner-no.png')}}" alt=""/>
            </div>
            <div class="nav-wrap">
                <ul class="group" id="example-one" class="nav navbar-nav navbar-right">



                    <li class="current_page_item"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    <li><a href="{{route('see_all_movie_news')}}">Movies & Events</a></li>
                    @foreach($menus as $key =>$value)
                        <li><a href="{{$value}}">{{$key}}</a></li>

                    @endforeach

                    @if(Auth::check())
                        <li><a href="{{url('view_ticket')}}">My Tickets
                                @if(Session::has('ticket'))
                                    ({{count(Session::get('ticket'))}})
                                @endif
                            </a></li>
                    @endif

                    <li class="dropdown">

                        @if(Auth::check())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi,{{Auth::user()->name}}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('booking_detail')}}">My Booking Detail</a></li>
                                <li><a href="{{url('customer_logout')}}">Logout</a></li>
                                <li><a href="{{url('change_password')}}">Change Password</a></li>

                            </ul>
                        @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register<b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <li><a href="{{url('customer_register')}}">Register</a></li>
                                <li><a href="{{url('customer_login')}}">Login</a></li>

                            </ul>
                        @endif

                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="block">
        <div class="wrap">
            <div class="h-logo">
                <a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt=""/></a>
            </div>
            <form action="{{url('search')}}" method="get" id="reservation-form">
                <fieldset>
                    <div class="field">
                        <label>Find a Movie:</label>
                        <select class="select2" name="movie_name">
                            <option value="0">Please Select</option>
                            @foreach($movies as $key =>$value)
                                <option value="{{$value->movie_name}}">{{$value->movie_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field1">
                        <label>Search</label>
                        <select class="select1" name="actors_name">
                            <option value="0">Please Select</option>
                            @foreach($movies as $key =>$value)
                                <option value="{{$value->actors_name}}">{{$value->actors_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field1">
                        <label>Search</label>
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </fieldset>
            </form>
            <div class="clear"></div>
        </div>
    </div>
