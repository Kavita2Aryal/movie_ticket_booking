@extends('layouts.default')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                 <div class="section group">





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
                        </div>:
                        <div class="desc span_3_of_2">
                            <h4>Release Date : {{$movie['release_date']}}</h4>
                            <p class="p-link"><h5>Actors Name :{{$movie['actors_name']}}</h5></p>
                            <p class="p-link"><h5>Genere :{{$movie->category['category']}}</h5></p>
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








    </div>
            </div>
        </div>
    </div>


    @endsection