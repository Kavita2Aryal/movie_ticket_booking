@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li> {{$e}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2 class="heading-style">Add Movie</h2>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class=" col-md-10 ">
                                <form action="{{route('movie_store')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    Movie Name <input type="text" name="movie_name" class="form-control" value="{{old('movie_name')}}">
                                    Actors Name <input type="text" name="actors_name" class="form-control" value="{{old('actors_name')}}">
                                    Release Date <input type="date" name="release_date" class="form-control" value="{{old('release_date')}}">
                                    Show Time <input type="time" name="time" class="form-control" value="{{old('time')}}">
                                    Available Seat <input type="text" name="available_seat" class="form-control" value="{{old('available_seat')}}">
                                    Ticket Price <input type="text" name="price" class="form-control" value="{{old('price')}}">
                                    Movie Image <input type="file" name="image"><br><br>

                                    Today Show
                                    <select name="today_show" id="" class="form-control">
                                        @if(old('today_show')=='yes')
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                        @else
                                            <option value="yes">Yes</option>
                                            <option value="no" selected>No</option>
                                        @endif

                                    </select>

                                    Language
                                    <select name="language" class="form-control">
                                        @if(old('language')=='nepali')
                                            <option value="nepali" selected>Nepali</option>
                                            <option value="english">English</option>
                                            <option value="hindi">Hindi</option>
                                        @elseif(old('language')=='english')
                                            <option value="nepali" >Nepali</option>
                                            <option value="english" selected>English</option>
                                            <option value="hindi">Hindi</option>
                                        @else
                                            <option value="nepali" >Nepali</option>
                                            <option value="english" >English</option>
                                            <option value="hindi" selected>Hindi</option>
                                        @endif
                                    </select>

                                    Youtube Link <input type="text" name="youtube_link" class="form-control" value="{{old('youtube_link')}}">
                                    Is Featured
                                    <select name="is_featured" id="" class="form-control">
                                        @if(old('is_featured')=='yes')
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                        @else
                                            <option value="yes">Yes</option>
                                            <option value="no" selected>No</option>
                                        @endif

                                    </select>

                                    Is Featured In Slider
                                    <select name="is_featured_slider" id="" class="form-control">
                                        @if(old('is_featured_slider')=='yes')
                                            <option value="yes" selected>Yes</option>
                                            <option value="no">No</option>
                                        @else
                                            <option value="yes">Yes</option>
                                            <option value="no" selected>No</option>
                                        @endif

                                    </select>

                                    Movie News Title <input type="text" name="movie_news_title" class="form-control" value="{{old('movie_news_title')}}">

                                    Movie News Description
                                    <textarea name="movie_news_description" class="form-control" id="summary-ckeditor"></textarea>

                                    Category
                                    <select name="category" id="" class="form-control">
                                        @foreach($category as $c)
                                            @if(old('category')==$c['id'])
                                                <option value="{{$c->id}}" selected>{{$c->category}}</option>
                                            @else
                                                <option value="{{$c->id}}">{{$c->category}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>


                </div>


            </div></div></div></div>
@endsection