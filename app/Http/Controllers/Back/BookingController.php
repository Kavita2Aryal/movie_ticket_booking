<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class BookingController extends BackController
{
    public function view_bookings(){
        $title=$this->data('title',$this->title('Bookings'));

        $booking =\App\Model\Booking::orderBy('orderdate','DESC')->paginate(10);

        return view('back/view_bookings',compact('booking','title'));
    }

    public function changeBookingStatus($bookingid){

        $title=$this->data('title',$this->title('Booking Status'));

        $booking=\App\Model\Booking::find($bookingid);
        $serialized_format =unserialize($booking->movies);
        $booking_final_array=array();
        if(!empty($serialized_format)) {

            foreach ($serialized_format as $key => $value) {
                if (array_key_exists($value, $booking_final_array)) {

                    $booking_final_array[$value]->ticket_qty = $booking_final_array[$value]->ticket_qty + 1;
                } else {
                    $booking_final_array[$value] = $user = DB::table('movies')->where('id', $value)->first();
                    $booking_final_array[$value]->ticket_qty = 1;

                }

            }

        }
        return view('back/booking_detail',compact('booking','booking_final_array','title'));

    }







    public  function changestatus(Request $request)
    {
        $update_status=$request->get('updateorder');
        $id =$request->get('id');
        $booking = \App\Model\Booking::find($id);
        $booking->paymentstatus =$update_status;
        if($booking->save()){
            return redirect()->back()->with('message','Order Status Updates Successfully');
        }else{
            return redirect()->back()->with('message','Order Status Updates Not Changed');
        }

    }
}
