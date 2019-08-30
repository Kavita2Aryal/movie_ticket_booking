<?php
function get_menus(){

    $contacturl=url('/contact');



    $pages =\App\Model\Page::all();



    foreach ($pages as $key => $value){
        $menu_array[$value['title']]=url('page/'.$value['id']);
    }



    return $menu_array;
}

function get_slider_image(){


    $slider_image =\App\Model\Movies::where('is_featured','yes')->where('is_featured_slider','yes')->orderBy('created_at','DESC')->limit(3)->get();
    return $slider_image;
}

function get_movies_list(){
    $movie_list =\App\Model\Movies::all();
    return $movie_list;
}

