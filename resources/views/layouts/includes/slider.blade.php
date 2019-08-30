<div class="banner">
    <div class="wrap">
        <section class="slider">
            <div class="flexslider">

                @php
                    $image =get_slider_image();
                @endphp
                <ul class="slides">
                    @foreach($image as $key=>$value)
                        <li>
                            <img src="{{asset('assets/images/'.$value['movie_image'])}}" height="400" alt=""/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</div>
</div>