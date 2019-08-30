@extends('layouts.default')
@section('content')
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <h1>{{$page->title}}</h1>
                <p>{{$page->content}}</p>
                <div class="clear"></div>
            </div>
        </div>
    </div>

@endsection