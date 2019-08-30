@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(\Session::has('message'))
            <div class="alert alert-success message-style">
                {{\Session::get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fluid">







                        <a href="{{route('movie_create')}}" class="btn btn-primary btn-sm button-style">Add Movie</a>
                            <h2 class="heading-style">Movie List</h2>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Movie</th>
                                <th>Actors</th>
                                <th>Release Date</th>
                                <th>Time</th>
                                <th>Movie Cover Image</th>
                                <th>Ticket Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>View Detail</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($movies as $key=> $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->movie_name}}</td>
                                    <td>{{$value->actors_name}}</td>
                                    <td>{{$value->release_date}}</td>

                                    <td>{{$value->time}}</td>

                                    <td ><img src="{{asset('/assets/images/'.$value->movie_image)}}" alt="" width="50"></td>
                                    <td>{{$value->price}}</td>

                                    <td>
                                        <a href="{{url('admin/movie/edit/'.$value->id)}}"><h3><i class="far fa-edit"></i></h3></a>

                                    </td>
                                    <td>
                                        <form action="{{route('movie_delete')}}" method="post">

                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE" >
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                    <td><a href="{{url('admin/movie_single/'.$value->id)}}"><h3><i class="fas fa-eye"></i></h3></a></td>
                                </tr>
                            </tbody>
                            @endforeach

                        </table>



                    </div>
                </div></div>

            <div class="row">
                {{$movies->links()}}
            </div>
        </div>

    </div>

@endsection
