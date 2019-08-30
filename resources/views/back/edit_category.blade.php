@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="container">
                        <h3>Edit Category</h3>
                        <hr>
                        <form action="{{route('category_update')}}" method="post">

                            Category Name: <input type="text" name="name" value="{{$category->category}}">
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>


                </div></div></div></div>
@endsection