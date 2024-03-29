
@extends('layouts.default')
@section('content')
    <div class="section group">
        <div class="col span_2_of_3">
            <div class="contact-form">
                <h3>Contact Us</h3>
                <form>
                    <div>
                        <span><label>NAME</label></span>
                        <span><input type="text" value=""></span>
                    </div>
                    <div>
                        <span><label>E-MAIL</label></span>
                        <span><input type="text" value=""></span>
                    </div>
                    <div>
                        <span><label>MOBILE.NO</label></span>
                        <span><input type="text" value=""></span>
                    </div>
                    <div>
                        <span><label>SUBJECT</label></span>
                        <span><textarea> </textarea></span>
                    </div>
                    <div>
                        <span><input type="submit" value="Submit"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col span_1_of_3">
            <div class="contact_info">
                <h3>Find Us Here</h3>
                <div class="map">
                    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                </div>
            </div>
            <div class="company_address">
                <h3>Company Information :</h3>
                <p>500 Lorem Ipsum Dolor Sit,</p>
                <p>22-56-2-9 Sit Amet, Lorem,</p>
                <p>Phone:(00) 222 666 444</p>
                <p>Fax: (000) 000 00 00 0</p>
                <p>Email: <span><a href="mailto:example@mail.com">mail@example.com</a></span></p>
                <p>Follow on: <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span></p>
            </div>
        </div>
    </div>
@endsection