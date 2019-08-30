
@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                @if(\Session::has('message'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('message')}}</p>
                    </div>
                @endif


                <div class="account-wall">

                    <h1 style="text-align: center" class="login-title"><b>Change Password</b></h1>
                    <form class="form-signin" action="{{url('change_password')}}" method="post">
                        {{csrf_field()}}
                        <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                        <br>
                        <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                        <br>
                        <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Change Password</button>


                    </form>
                </div>
                <a href="{{url('customer_register')}}" class="text-center new-account">Create an account </a>
            </div>
        </div>
    </div>

@endsection