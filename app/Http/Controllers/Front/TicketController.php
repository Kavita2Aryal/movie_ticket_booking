<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TicketController extends FrontController
{
    public function book_ticket($id){

        if(Session::has('ticket')){
            $product_array =Session::get('ticket');
        }else{
            $product_array =array();
        }


        array_push($product_array,$id);
        Session::put('ticket',$product_array);

        return redirect()->back()->with('message','Ticket added to your cart');

    }

    public function view_ticket(){

        $ticket =Session::get('ticket');    ///array:2 [▼
                                              //  0 => "12"
                                                // 1 => "12"]
        $ticket_final_array = array();

        if($ticket!=null){
            foreach ($ticket as $key=>$value){

                 if(array_key_exists($value,$ticket_final_array)){

                    $ticket_final_array[$value]->ticket_qty = $ticket_final_array[$value]->ticket_qty + 1;


                }else{
                    $ticket_final_array[$value] = $user = DB::table('movies')->where('id', $value)->first();
                    $ticket_final_array[$value]->ticket_qty = 1;


                }


            }
        }


        Session::put('ticket2',$ticket_final_array);

        $title=$this->data('title',$this->title(' View Ticket'));
        return  view('front/view_ticket',compact('ticket_final_array','title'));


    }


    public function edit_ticket(Request $request){
        $data=$request->get('editvalue');

        Session::put('seat',$data);
        $ticket_update_array =array();
        if(!empty($data)){
            foreach ($data as $key =>$value){
                for ($i=1 ; $i<=$value ; $i++){
                    $ticket_update_array[] =$key;
                }

            }

            Session::put('ticket',$ticket_update_array);
        }

        return redirect()->back()->with('message','Ticket Detail Updated');
    }

    public function delete_movie($movie_id){

        $data =Session::get('ticket');

        foreach ($data as $key =>$value){

            if($value ==$movie_id){
                unset($data[$key]);
            }
        }

        Session::put('ticket',$data);
        return redirect()->back()->with('message','Ticket Deleted');

    }


    public function pay_here(){
       $ticket = Session::get('ticket2');



        if($ticket!=null){
            foreach ($ticket as $key=>$value){
                if ($value->remaining_seat < $value->ticket_qty && $value->remaining_seat>0){

                    return redirect()->back()->with('message',"Only ".$value->remaining_seat." ticket is avilable of movie ".$value->movie_name);
                }

                if($value->remaining_seat==0){
                    return redirect()->back()->with('message',"Booking Full for movie  ".$value->movie_name);

                }

            }

        }

        $title=$this->data('title',$this->title(' Pay Here'));



       return view('front/pay_here',compact('title'));
    }



    public function ckeckout(Request $request){
        $ticket = Session::get('ticket2');
        if($ticket!=null){
            foreach ($ticket as $key=>$value){
                if($value->remaining_seat>= $value->ticket_qty)
                {
                    $value->remaining_seat = $value->remaining_seat-$value->ticket_qty;
                    $movie =\App\Model\Movies::find($key);
                    $movie->remaining_seat = $value->remaining_seat ;
                    $movie->save();
                }
            }
        }

        $booking =new \App\Model\Booking;

        $booking->fullname =$request->get('fullname');
        $booking->address =$request->get('address');
        $booking->email =$request->get('email');
        $booking->phone =$request->get('phone');
        $booking->method =$request->get('payment');
        $booking->user_id =auth()->user()->id;
        $booking->orderdate =date('Y-m-d');
        $booking->movies =serialize(Session::get('ticket'));
        $booking->paymentstatus ='pending';

        if($booking->save()){
            Session::forget('ticket');
            Session::forget('ticket2');
            return redirect()->back()->with('message','Checkout successfull');
        }else{
            return redirect()->back()->with('message','Try Again .');
        }
    }

    public function booking_detail(){
        $id=auth()->user()->id;
        $booking =\App\Model\Booking::where('user_id',$id)->get();


        $booking_final_array=array();
        $ba =array();

        if(!empty($booking)){
            foreach ($booking as $key=>$value){
                $id=$value['id'];
                $serialized_format =unserialize($value['movies']);
                if(!empty($serialized_format)){
                    foreach ($serialized_format as $key=>$value){

                        if (array_key_exists($value, $booking_final_array)) {

                            $booking_final_array[$value]->ticket_qty = $booking_final_array[$value]->ticket_qty + 1;
                            $ba[$id] = $booking_final_array;

                        } else {
                            $booking_final_array[$value] = $user = DB::table('movies')->where('id', $value)->first();
                            $booking_final_array[$value]->ticket_qty = 1;
                            $ba[$id] = $booking_final_array;

                        }

                    }

                }


            }
        }

        $booking_detail_array=array();

        foreach ($ba as $key=>$value){
            $booking =\App\Model\Booking::find($key);
            $booking_detail_array[$key] =$booking;
        }



        $title=$this->data('title',$this->title(' Booking Detail'));

        return view('front/booking_detail',compact('ba','booking_detail_array','title'));



    }


}
