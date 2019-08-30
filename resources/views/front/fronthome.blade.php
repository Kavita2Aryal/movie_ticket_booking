@include('layouts.includes.header')
@include('layouts.includes.slider')
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="listview_1_of_3 images_1_of_3">
                <h3>Movie News</h3>
                @foreach($movie_news as $value)
                <div class="content-left">
                    <div class="listimg listimg_1_of_2">
                        <a href="{{url('single_movie_news'.'/'.$value['id'])}}"><img src="{{asset('assets/images/'.$value['movie_image'])}}" alt=""/></a>
                    </div>
                    <div class="text list_1_of_2">
                        <div class="extra-wrap">
                            <div class="data">August. 05. 2013</div>
                            <a href="{{url('single_movie_news'.'/'.$value['id'])}}" class="color"><strong>{{substr($value['movie_news_title'],0,50)}}</strong></a><br>
                            <a href="{{url('single_movie_news'.'/'.$value['id'])}}"><span class="text-top">{{substr($value['movie_news_description'],0,100)}}</span></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                @endforeach
                <a href="{{route('see_all_movie_news')}}" class="link2">See all</a>
            </div>

            <div class="listview_1_of_3 images_1_of_3">
                <h3>Trailers</h3>

                <div class="middle-list">
                        @foreach($trailer as $value)
                        <iframe width="" height="" src="{{$value->youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="clear"></div>
                        <a href="{{url('single_movie'.'/'.$value['id'])}}" class="link"> {{$value->movie_name}}</a>

                        @endforeach
                    <div class="clear"></div>
                </div>

                <a href="{{route('see_all_movie')}}" class="link2">See all</a>

            </div>

            <div class="listview_1_of_3 images_1_of_3">
                <h3>Films in Theaters</h3>

                @foreach($films_in_theaters as $value)
                <div class="content-left">
                    <div class="listimg listimg_1_of_2">
                        <a href="{{url('single_movie'.'/'.$value['id'])}}"><img src="{{asset('assets/images/'.$value['movie_image'])}}" alt=""/></a>
                    </div>
                    <div class="text list_1_of_2">
                        <div class="extra-wrap1">
                            <a href="{{url('single_movie'.'/'.$value['id'])}}" class="link4">{{$value['movie_name']}}</a><br>
                            <span class="color1">India  {{date('Y-m-d')}}</span><br>
                            Genre: <a  class="color2">{{$value->category['category']}}</a><br>
                            <span class="link-top">Actors: <a class="color2">{{$value['actors_name']}} </a> </span><br>
                            Show Time :  <span class="link-top"><a class="color2">{{$value['time']}} </a> </span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
                <a href="{{route('films_in_theater')}}" class="link2">See all</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@include('layouts.includes.footer')