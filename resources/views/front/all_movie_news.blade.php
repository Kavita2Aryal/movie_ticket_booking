@extends('layouts.default')

@section('content')




    <div class="container">
        <div class="row">
            @foreach($movie as $m)

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

                            <a href="{{url('single_movie_news'.'/'.$m['id'])}}" rel="lightbox"> <img style="width: 250px; height: 150px" src="{{asset('assets/images/'.$image_name)}}" alt=""  ></a>
                        </div>
                        <div class="movie-text">
                            <h4 class="h-text"><a href="{{url('single_movie_news'.'/'.$m['id'])}}">{{substr($m['movie_news_title'],0,20)}}</a></h4>
                            <p class="h-para"><a href="{{url('single_movie_news'.'/'.$m['id'])}}">{{substr($m['movie_news_description'],0,100)}}</a></p>


                        </div>
                    </div>
                </div>



            @endforeach
                <div class="clearfix"></div>
            <div class="row">
                {{$movie->links()}}
            </div>
        </div>






@endsection