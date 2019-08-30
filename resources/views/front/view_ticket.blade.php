@extends('layouts.default')

@section('content')

    <div class="container">

        @if(\Session::has('message'))
            <div class="alert alert-success">
                <p>{{\Session::get('message')}}</p>
            </div>
        @endif

        <form action="{{url('edit_ticket')}}" method="post">
            {{csrf_field()}}
            <table class="table">
                <tr>
                    <td>Movie Name</td>
                    <td>Ticket Price</td>
                    <td>No of Ticket</td>
                    <td>Total</td>
                    <td></td>
                </tr>
                @php
                    $grandtotal =0;
                @endphp
                @foreach($ticket_final_array as $key=>$value)
                    <tr>
                        <td>{{$value->movie_name}}</td>
                        <td>{{$value->price}}</td>
                        <td><input type="number" max="{{$value->remaining_seat}}" name="editvalue[{{$key}}]" value="{{$value->ticket_qty}}"></td>
                        <td>{{$value->price*$value->ticket_qty}}</td>
                        <td><a href="{{url('delete_movie'.'/'.$key)}}" class="btn btn-danger">&times;</a></td>
                    </tr>

                    @php
                        $grandtotal =$grandtotal+$value->price*$value->ticket_qty;
                    @endphp

                @endforeach

                <tr>
                    <td><b>Grand Total :</b></td>
                    <td></td>
                    <td></td>

                    <td><b>{{$grandtotal}}</b></td>
                    <td></td>
                </tr>
            </table>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="{{url('pay_here')}}" class="btn btn-success ">Pay Here</a>
        </form>


    </div>



@endsection