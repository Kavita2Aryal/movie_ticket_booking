
@extends('layouts.default')
@section('content')
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <h1>Booking Detail</h1>
                Customer Name : {{Auth()->user()->name}}
                <br>
                Customer Email :{{Auth()->user()->email}}



                @foreach($ba as $key=>$value)

                    @php
                    $date ='';
                    $status='pending';
                    @endphp

                    @foreach($booking_detail_array as $k=>$v)
                        @if($key==$k)
                            @php
                                $date = $v->created_at;
                                $status =$v->paymentstatus;
                            @endphp
                        @endif
                    @endforeach

                    <h3>Booking on Date {{$date}}</h3><br>
                    <h2>Booking Status : {{$status}}</h2><br><br>

                    <table class="table">

                        <tr>
                            <td>Movie Name</td>
                            <td>Movie Price</td>
                            <td>Movie Qty</td>
                            <td>Total</td>
                        </tr>


                        @foreach($value as $k=> $v)
                            <tr>
                                <td>{{$v->movie_name}}</td>
                                <td>{{$v->price}}</td>
                                <td>{{$v->ticket_qty}}</td>
                                <td>{{$v->ticket_qty*$v->price}}</td>
                            </tr>


                        @endforeach
                        <tr>
                            @php
                                $grand_total=0;
                            @endphp
                            @foreach($value as $k=> $v)
                                @php
                                    $grand_total = $v->ticket_qty*$v->price +$grand_total;
                                @endphp
                            @endforeach
                            <td>Grand Total :</td>
                            <td></td>
                            <td></td>
                            <td>{{$grand_total}}</td>
                        </tr>
                    </table>


                @endforeach

                <div class="clear"></div>
            </div>
        </div>
    </div>

@endsection