@extends('layouts.default')

@section('content')




    <div class="container">
        <div class="row">
            @foreach($films_in_theaters as $m)

                <div class="col_1_of_4 span_1_of_4">

                    @if(empty($m['movie_image']))
                        @php
                            $image_name='Tulips.jpg';
                        @endphp

                    @else

                        @php
                            $image_name=$m['movie_image'];
                        @endphp

                    @endif


                    <div class="imageRow">
                        <div class="single">

                            <a href="{{url('single_movie'.'/'.$m['id'])}}" rel="lightbox">
                                <img style="width: 250px; height: 150px" src="{{asset('assets/images/'.$image_name)}}" alt=""  >
                            </a>
                        </div>
                        <div class="movie-text">
                            <h4 class="h-text"><a href="{{url('single_movie'.'/'.$m['id'])}}">{{$m['movie_name']}}</a></h4>
                            <p class="h-para">Actors :<a href="{{url('single_movie'.'/'.$m['id'])}}">{{$m['actors_name']}}</a></p>
                            <p class="h-para">Release Date : <a href="{{url('single_movie'.'/'.$m['id'])}}">{{$m['release_date']}}</a></p>
                            @if($m['remaining_seat']<=0)
                                <a href="" class="watch_but">Booking Full</a>
                            @else

                                <a href="{{url('book_ticket').'/'.$m['id']}}" class="watch_but">Book Ticket</a>

                            @endif

                        </div>
                    </div>
                </div>



            @endforeach
            <div class="clearfix"></div>
            <div class="row">
                {{$films_in_theaters->links()}}
            </div>
        </div>






@endsection