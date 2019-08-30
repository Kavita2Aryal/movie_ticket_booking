@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    @if(\Session::has('message'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('message')}}</p>
                        </div>
                    @endif

                        <h2 class="heading-style">Booking Detail</h2>
                        <table class="table ">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Method</th>
                                <th>Payment Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($booking as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->fullname}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->method}}</td>
                                    <td>{{$value->paymentstatus}}</td>
                                    <td>
                                        <a href="{{url('admin/changestatus'.'/'.$value->id)}}" class="btn btn-primary btn-sm">Change Status</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        {{$booking->links()}}



                </div>
            </div>
        </div>
    </div>


@endsection