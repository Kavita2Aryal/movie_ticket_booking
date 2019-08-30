<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends FrontController
{
    public function index(){
        $title=$this->data('title',$this->title(' Customer Registration'));
        return view('front/registration/register',compact('title'));
    }

    public function process_register(Request $request)
    {

        $validation_array=array(
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        );

        $request->validate($validation_array);

        $user['name']=$request->get('name');
        $user['email'] = $request->get('email');
        $user['password']=bcrypt($request->get('password'));
        $user['last_name'] = $request->get('last_name');
        $user['utype']='customer';

        $user= \App\User::Create($user);
        auth()->login($user);
        return redirect('customer_register')->with('message','Registration successfull and Logged in successfully');
    }


    public function logout(){
        \Illuminate\Support\Facades\Session::forget('ticket');
        auth()->logout();
        return redirect('/')->with('message','Logout successfully');
    }


    public function login()
    {
        $title=$this->data('title',$this->title(' Customer Login'));
        return view('front/registration/login',compact('title'));
    }

    public function process_login(Request $request){
        $login['email']=$request->get('email');
        $login['password']=$request->get('password');
        if(auth()->attempt($login)==false){
            return redirect('customer_login')->with('message','Incorrect Login');
        }

        return redirect('customer_login')->with('message','Successfully logged in');
    }

    public function change_password(){
        $title=$this->data('title',$this->title(' Change Password'));
        return view('front/registration/change_password',compact('title'));
    }

    public function process_password(Request $request){

        $opass =$request->get('old_password');
        $dbpass = auth()->user()->password;
        if(!Hash::check($opass ,$dbpass)){
            return redirect('change_password')->with('message','Old Password is wrong');
        }



        $new_password =$request->get('new_password');
        $c_password =$request->get('c_password');

        if($new_password != $c_password){
            return redirect('change_password')->with('message','New Password and Confirm Password does not match');
        }

        $user = \App\User::find(auth()->user()->id);
        $user->password=bcrypt($new_password);
        if($user->save()){
            return redirect('change_password')->with('message',' Password Changed');
        }else{
            return redirect('change_password')->with('message',' Password could not be Changed');
        }
    }



    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $githubuser = Socialite::driver('github')->user();


    }



}
