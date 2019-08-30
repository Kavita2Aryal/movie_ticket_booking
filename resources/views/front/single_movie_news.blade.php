@extends('layouts.default')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="section group">

                    <div class="about span_1_of_2">
                        <h3>{{$movie['movie_news_title']}}</h3>
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
                                <h4> Date : {{$movie['release_date']}}</h4>

                                <p>{{$movie['movie_news_description']}}</p>
                                <br>


                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <h2>You May Also Like This</h2>
        <section class="customer-logos slider">
            @foreach($movies as $m)
            <div class="slide"><a href="{{url('single_movie_news'.'/'.$m['id'])}}"><img style="width: 250px; height: 150px" src="{{asset('assets/images/'.$m['movie_image'])}}"></a></div>
            @endforeach

        </section>


    </div>

@endsection