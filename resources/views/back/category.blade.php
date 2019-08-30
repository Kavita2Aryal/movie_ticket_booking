@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(\Session::has('message'))
            <div class="alert alert-success">
                <p>{{\Session::get('message')}}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fluid">



                    <a href="{{route('category_create')}}" class="btn btn-primary btn-sm button-style" >Add Category</a>
                        <h2 class="heading-style">Category List</h2>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->category}}</td>
                                <td>
                                    <a href="{{url('admin/category/edit/'.$value->id)}}">Edit</a>

                                </td>
                                <td>
                                    <form action="{{route('category_delete')}}" method="post">

                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE" >
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>


                    </div></div></div></div></div>
@endsection