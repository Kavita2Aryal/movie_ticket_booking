<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    protected $pagePath = 'front/';
    protected $pages;

    public function __construct()
    {
        $this->data('appType',$this->pagePath);
        $this->pages = $this->pagePath.'/';
    }


    public function index(){

        $title=$this->data('title',$this->title('Welcome'));
        $movie_news = \App\Model\Movies::where('is_featured','yes')->whereNotNull('movie_image')->whereNotNull('movie_news_title')->whereNotNull('movie_news_description')->orderBy('created_at','DESC')->limit(5)->get();
        $trailer =\App\Model\Movies::where('is_featured','yes')->whereNotNull('youtube_link')->orderBy('created_at','DESC')->limit(4)->get();
        $films_in_theaters =\App\Model\Movies::where('today_show','yes')->orderBy('created_at','DESC')->limit(5)->get();
        return view('front/fronthome',compact('movie_news','trailer','films_in_theaters','title'));



    }

    public function contact(){
        $title=$this->data('title',$this->title('Contact Us'));
        return view('front/contact',compact('title'));
    }

    public function about(){
        $title=$this->data('title',$this->title('About Us'));
        return view('front/about',compact('title'));
    }


    public function page($id){
        $page = \App\Model\Page::find($id);
        return view('front/page_single',compact('page'));
    }


    public function search_process(Request $request){
        $movie_name ='';
        $actors_name='';


        if($request->has('movie_name')){
            $movie_name =$request->get('movie_name');
        }

        if($request->has('actors_name')){
            $actors_name = $request->get('actors_name');
        }


        $query =\App\Model\Movies::select('*');

        if($movie_name =='0' && $actors_name == '0'){
            return redirect()->back()->with('message','Please select atleast one field in serach');

        }

        if($movie_name!='0'){
            $query->where('movie_name','LIKE',"%$movie_name%");
        }

        if($actors_name!='0'){
            $query->where('actors_name','LIKE',"%$actors_name%");
        }

        $result =$query->paginate(2);


        $movie_news =\App\Model\Movies::whereNotNull('movie_news_title')->whereNotNull('movie_news_description')->orderBy('created_at','DESC')->limit(4)->get();

        $title=$this->data('title',$this->title('Search Result'));
        return view('front/search_result',compact('result','movie_news','title'));
    }


    public function see_all_movie(){
        $title=$this->data('title',$this->title('All Movie'));
        $movie =\App\Model\Movies::where('is_featured','yes')->whereNotNull('youtube_link')->orderBy('created_at','DESC')->paginate(8);
        return view('front/all_movie_list',compact('movie','title'));
    }

    public function see_all_movie_news(){
        $title=$this->data('title',$this->title('Movie News'));
        $movie = \App\Model\Movies::where('is_featured','yes')->whereNotNull('movie_news_title')->whereNotNull('movie_news_description')->orderBy('created_at','DESC')->limit(10)->paginate(8);
        return view('front/all_movie_news',compact('movie','title'));
    }

    public function single_movie($id){

        $movie =\App\Model\Movies::find($id);

        $title=$this->data('title',$this->title( $movie['movie_name'].' Detail '));
        return view('front/single_movie',compact('movie','title'));
    }

    public function single_movie_news($id){

        $movie =\App\Model\Movies::find($id);
        $title=$this->data('title',$this->title( $movie['movie_name']));
        $movies =\App\Model\Movies::where('is_featured','yes')->whereNotNull('movie_image')->whereNotNull('movie_news_title')->whereNotNull('movie_news_description')->orderBy('created_at','DESC')->get();

        return view('front/single_movie_news',compact('movie','movies','title'));

    }

    public function films_in_theater(){
        $title=$this->data('title',$this->title(' Films In Theater'));
        $films_in_theaters =\App\Model\Movies::where('today_show','yes')->orderBy('created_at','DESC')->paginate(8);
        return view('front/films_in_theater',compact('films_in_theaters','title'));
    }
}
