@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if(\Session::has('message'))
            <div class="alert alert-success message-style">
                {{\Session::get('message')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="container-fluid">



                            <h2 class="heading-style">Movie : {{$movie->movie_name}}</h2>



                        @if($movie['remaining_seat']<=0)

                            <h4 class="h3-style">Booking Full</h4>
                        @else

                            <h4 class="h3-style">Remaining Seat : {{$movie->remaining_seat}}</h4>

                        @endif



                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>Actors</td>
                                    <td>{{$movie->actors_name}}</td>
                                </tr>
                                <tr>
                                    <td>Release Date</td>
                                    <td>{{$movie->release_date}}</td>
                                </tr>
                                <tr>
                                    <td>Show Time</td>
                                    <td>{{$movie->time}}</td>
                                </tr>
                                <tr>
                                    <td>Available Seat</td>
                                    <td>{{$movie->available_seat}}</td>
                                </tr>
                                <tr>
                                    <td>Movie Cover Image</td>
                                    <td><img src="{{asset('/assets/images/'.$movie->movie_image)}}" alt="" width="250" height="150"></td>
                                </tr>
                                <tr>
                                    <td>Ticket Price</td>
                                    <td>{{$movie->price}}</td>
                                </tr>
                                <tr>
                                    <td>Language</td>
                                    <td>{{$movie->language}}</td>
                                </tr>
                                <tr>
                                    <td>Youtube Link</td>
                                    <td>{{$movie->youtube_link}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$movie->category['category']}}</td>
                                </tr>
                                <tr>
                                    <td>Is Featured</td>
                                    <td>{{$movie->is_featured}}</td>
                                </tr>
                            </tbody>


                        </table>



                    </div>
                </div>
            </div>
        <div class="col-md-1"></div>
        </div></div>
@endsection
