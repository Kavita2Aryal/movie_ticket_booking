@extends('layouts.default')

@section('content')
    <div class="section group">

            @if(\Session::has('message'))
                <div class="alert alert-success">
                    <p>{{\Session::get('message')}}</p>
                </div>
            @endif

            @if(count($result)==0)
                <div class="content">
                    <div class="wrap">
                        <div class="content-top">
                            <div class="page-not-found">
                                <div class="pnot">
                                    <h3 style="text-align: center">No Result Found .</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            @else

                @foreach($result as $movie)

                    <div class="about span_1_of_2">
                        <h3>{{$movie['movie_name']}}</h3>
                        <div class="about-top">
                            <div class="grid images_3_of_2">
                                <img src="images/pic13.jpg" alt=""/>
                            </div>

                            <div class="clear"></div>
                        </div>
                        <div class="about-top">
                            <div class="grid images_3_of_2">
                                <img style="width: 250px; height: 150px" src="{{asset('assets/images/'.$movie['movie_image'])}}" alt="" />
                            </div>
                            <div class="desc span_3_of_2">
                                <h4>Release Date : {{$movie['release_date']}}</h4>
                                <p class="p-link"><h5>Actors Name :{{$movie['actors_name']}}</h5></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <br>

                                @if($movie['remaining_seat']<=0)
                                    <a href="" class="watch_but">Booking Full</a>
                                @else

                                    <a href="{{url('book_ticket').'/'.$movie['id']}}" class="watch_but">Book Ticket</a>

                                @endif
                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>

                @endforeach



                    <div class="rightsidebar span_3_of_1">

                        <h3>Latest News</h3>
                        <ul class="latest_news">
                            @foreach($movie_news as $m)
                            <li>
                                <a href="{{url('single_movie_news'.'/'.$m['id'])}}"><span class="date">{{substr($m['movie_news_title'],0,50)}}</span><br></a>
                                <a href="{{url('single_movie_news'.'/'.$m['id'])}}">{{substr($m['movie_news_description'],0,100)}}</a>
                            </li>
                            @endforeach


                        </ul>
                        <a href="{{route('see_all_movie_news')}}" class="button ">See all</a>
                    </div>

           @endif
    </div>

@endsection