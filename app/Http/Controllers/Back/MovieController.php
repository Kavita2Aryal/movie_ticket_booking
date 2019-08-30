<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends BackController
{
    public function index(){
        $title=$this->data('title',$this->title('Movie'));
        $movies = \App\Model\Movies::paginate(10);
        return view('back/movies',compact('movies','title'));
    }

    public function create()
    {
        $title=$this->data('title',$this->title('Create Movie'));
        $category = \App\Model\Category::all();
        return view('back/create_movie',compact('category','title'));

    }

    public function store(Request $request){
        $movie= new \App\Model\Movies;

        $validation_rules=array(
            'movie_name'=>'required',
            'available_seat'=>'required',
            'price'=>'required',
        );
        $request->validate($validation_rules);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/',$name);
        }
        $movie->movie_name=$request->movie_name;
        $movie->actors_name=$request->actors_name;
        $movie->release_date = $request->release_date;
        $movie->time =$request->time;
        $movie->available_seat=$request->available_seat;
        $movie->price=$request->price;
        $movie->today_show=$request->today_show;
        $movie->language=$request->language;
        $movie->youtube_link=$request->youtube_link;
        $movie->is_featured=$request->is_featured;
        $movie->is_featured_slider=$request->is_featured_slider;
        $movie->movie_news_description=$request->movie_news_description;
        $movie->movie_news_title=$request->movie_news_title;
        $movie->remaining_seat = $request->available_seat;
        $movie->movie_image=$name;
        $movie->category_id=$request->category;
        if($movie->save()){
            return redirect()->route('movie')->with('message','Inserted');
        }else{
            return redirect()->route('movie')->with('message','Not Inserted');
        }

    }

    public function edit($id)
    {
        $title=$this->data('title',$this->title('Edit Movie'));
        $category = \App\Model\Category::all();
        $movie= \App\Model\Movies::find($id);
        return view('back/edit_movie',compact('movie','category','id','title'));

    }


    public function update(Request $request)
    {


        $movie =\App\Model\Movies::find($request->get('id'));

        $validation_rules=array(
            'movie_name'=>'required',
            'available_seat'=>'required',
            'price'=>'required',

        );
        $request->validate($validation_rules);
        $name='';
        if($request->hasFile('image')){
            $oldfile = public_path().'/assets/images/'.$movie->movie_image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }
            $file=$request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/',$name);
            $movie->movie_image=$name;
        }



        $movie->movie_name=$request->movie_name;
        $movie->actors_name=$request->actors_name;
        $movie->release_date = $request->release_date;
        $movie->time =$request->time;
        $movie->available_seat=$request->available_seat;
        $movie->price=$request->price;
        $movie->today_show=$request->today_show;
        $movie->language=$request->language;
        $movie->youtube_link=$request->youtube_link;
        $movie->is_featured=$request->is_featured;
        $movie->is_featured_slider=$request->is_featured_slider;
        $movie->movie_news_description=$request->movie_news_description;
        $movie->movie_news_title=$request->movie_news_title;
        $movie->remaining_seat = $request->available_seat;
        $movie->movie_image=$name;
        $movie->category_id=$request->category;
        if($movie->save()){
            return redirect()->route('movie')->with('message','Updated');
        }else{
            return redirect()->route('movie')->with('message','Not Updated');
        }

    }

    public function delete(Request $request)
    {
        $movie =\App\Model\Movies::find($request->get('id'));

        if($movie->delete()){
            $oldfile = public_path().'/assets/images/'.$movie->movie_image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }
            return redirect()->route('movie')->with('message','Deleted');
        }else{
            return redirect()->route('movie')->with('message','Not Deleted');
        }

    }

    public function movie_single($id){

        $movie =\App\Model\Movies::find($id);
        $title=$this->data('title',$this->title($movie->movie_name));
        return view('back/movie_single',compact('movie','title'));

    }
}
