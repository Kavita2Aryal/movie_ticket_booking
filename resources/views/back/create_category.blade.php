@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="heading-style">Add Category</h2>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <form action="{{url('admin/category/store')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                Category
                                <input type="text" name="name" class="form-control">
                                <br><br>
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>


                </div></div></div></div>
@endsection