
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
                <h1 class="text-center login-title">Sign in to continue</h1>

                <div class="account-wall">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                         alt="">

                    <form class="form-signin" action="{{url('customer_login')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        <br>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Log in</button>
                        <a href="{{url('login/facebook')}}" class="btn btn-lg btn-primary btn-block">
                            Login with Facebook</a>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                </div>

                <a href="{{url('customer_register')}}" class="text-center new-account">Create an account </a>


            </div>
        </div>
    </div>

@endsection