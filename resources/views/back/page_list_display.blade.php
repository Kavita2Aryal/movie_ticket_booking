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



                        <a href="{{route('page_add')}}" class="btn btn-primary btn-sm button-style">Add Page</a>
                        <h2 class="heading-style">Page List</h2>




                        <table class="table">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>

                                <th>Content</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($page as $p)
                                <tr>
                                    <td>{{$p['id']}}</td>
                                    <td>{{$p['title']}}</td>
                                    <td>{{$p['content']}}</td>

                                    <td>
                                        <a href="{{url('admin/page/edit/'.$p['id'])}}"><h3><i class="far fa-edit"></i></h3></a>
                                    </td>
                                    <td>
                                        <form action="{{route('page_delete')}}" method="POST">
                                            <input type="hidden" name="id" value="{{$p['id']}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$page->links()}}

                    </div>
                </div></div></div></div>
@endsection