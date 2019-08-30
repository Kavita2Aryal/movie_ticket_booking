
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    @if($errors->any)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                        <h2 class="heading-style">Add Page</h2>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class=" col-md-10 ">
                            <form action="{{ route('page_store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">


                                Page Title <input type="text" name="title" value="{{old('title')}}" class="form-control"><br>

                                Page Content <input type="text" name="content" value="{{old('content')}}" class="form-control"><br>





                                <br>


                                <input type="submit" name="" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                    </div>



                </div></div></div></div>

    </div></div></div></div>
@endsection