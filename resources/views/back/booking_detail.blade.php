@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <h2 class="heading-style">Booking Detail</h2>
                            <h3>Order Information</h3>
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Address</td>
                                    <td>Phone</td>
                                    <td>Method of Payment</td>
                                    <td>Order Date</td>

                                </tr>
                                <tr>
                                    <td>{{$booking->fullname}}</td>
                                    <td>{{$booking->email}}</td>
                                    <td>{{$booking->address}}</td>
                                    <td>{{$booking->phone}}</td>
                                    <td>{{$booking->method}}</td>
                                    <td>{{$booking->orderdate}}</td>
                                </tr>
                            </table>


                            <h3>Account Information</h3>
                            <table class="table">
                                <tr>
                                    <td>User Name</td>
                                    <td>Email</td>


                                </tr>
                                <tr>
                                    <td>{{$booking->user['name']}}</td>
                                    <td>{{$booking->user['email']}}</td>

                                </tr>
                            </table>


                            <h3>Booking Information</h3>
                            <table class="table">
                                <tr>
                                    <td>Movie Name</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Total</td>

                                </tr>
                                @foreach($booking_final_array as $value)
                                    <tr>
                                        <td>{{$value->movie_name}}</td>
                                        <td>{{$value->ticket_qty}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>{{$value->price*$value->ticket_qty}}</td>
                                    </tr>
                                @endforeach
                            </table>


                            @if(\Session::has('message'))
                                <div class="alert alert-success">
                                    <p>{{\Session::get('message')}}</p>
                                </div>
                            @endif

                            <form action="{{url('admin/changestatus')}}" method="post">
                                {{csrf_field()}}
                                Status of Order : <input type="text" name="updateorder" value="{{$booking->paymentstatus}}">
                                <input type="hidden" name="id" value="{{$booking->id}}">
                                <input type="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>


@endsection