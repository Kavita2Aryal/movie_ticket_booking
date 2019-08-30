
@extends('layouts.default')
@section('content')
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <h3>Booking Information</h3>

                @if(\Session::has('message'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('message')}}</p>
                    </div>
                @endif

                <form action="{{url('ckeckout')}}" method="post">
                    {{csrf_field()}}
                    Name:
                    <input type="text" name="fullname" value="{{Auth::User()->name}}" class="form-control" required>
                    Address:
                    <input type="text" name="address" class="form-control" required>
                    Email:
                    <input type="email" name="email" value="{{Auth::User()->email}}" class="form-control" required>
                    Phone Number :
                    <input type="text" name="phone" class="form-control" required>
                    <br>
                    Payment Mode:
                    <input type="radio" name="payment" value="cash" checked>Cash On Delivery
                    <input type="radio" name="payment" value="paypal">Online Payment
                    <br><br>
                    <input type="submit" value="Checkout" class="btn btn-success">
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>

@endsection