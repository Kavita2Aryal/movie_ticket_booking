
@extends('layouts.default')
@section('content')
    <div class="section group">
        <div class="about span_1_of_2">
            <h3>Latest Movies</h3>
            <div class="about-top">
                <div class="grid images_3_of_2">
                    <img src="images/pic13.jpg" alt=""/>
                </div>

                <div class="clear"></div>
            </div>
            <div class="about-top">
                <div class="grid images_3_of_2">
                    <img src="images/pic14.jpg" alt=""/>
                </div>
                <div class="desc span_3_of_2">
                    <h4>Lorem Ipsum is simply dummy text </h4>
                    <p class="p-link"><a href="#" class="link1">Lorem ipsum, Dolor </a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="clear"></div>
            </div>
            <a href="#" class="watch_but">More Movies</a>
        </div>
        <div class="rightsidebar span_3_of_1">

            <h3>Latest News</h3>
            <ul class="latest_news">
                <li>
                    <span class="date">05 July, 2013</span><br>
                    <a href="#">dolore eu feugiat nulla facilisis at vero eros ..</a>
                </li>
                <li>
                    <span class="date">05 July, 2013</span><br>
                    <a href="#">dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit</a>
                </li>
                <li class="m_bottom">
                    <span class="date">05 July, 2013</span><br>
                    <a href="#">dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit</a>
                </li>

            </ul>
            <a href="#" class="button ">See all</a>
        </div>
    </div>

@endsection