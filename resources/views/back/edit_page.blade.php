@extends('layouts.app')

@section('content')
    <div class="container">
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

                    <form action="{{ route('page_update') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$page_id}}">

                        Page Title :<input type="text" name="title" value="{{old('title',$page['title'])}}"><br>

                        Page Content :<input type="text" name="content" value="{{old('content',$page['content'])}}"><br>


                        <input type="submit" name="">
                    </form>

                </div></div></div></div>

@stop