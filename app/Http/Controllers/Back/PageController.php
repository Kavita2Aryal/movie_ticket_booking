<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends BackController
{
    public function index()
    {
        $title=$this->data('title',$this->title('Pages'));
        $page = \App\Model\Page::paginate('2');
        return view('back/page_list_display', compact('page','title'));
    }


    public function add(){
        $title=$this->data('title',$this->title('Add Pages'));
        return view('back/addPage',compact('title'));
    }


    public function store(Request $request){
        $page = new \App\Model\Page;

        $validation_rules = array(
            'title'=>'required',
            'content'=>'required',

        );

        $request->validate($validation_rules);


        $page->title=$request->get('title');
        $page->content=$request->get('content');


        if($page->save()){
            return redirect()->route('page')->with('message','Successfully Added Page');
        }else{
            return redirect()->route('page')->with('message','Not Successfully Added Page');
        }
    }


    public function edit( $page_id)
    {
        $title=$this->data('title',$this->title('Edit Pages'));
        $page =\App\Model\Page::find($page_id);

        return view('back/edit_page',compact('page','page_id','title'));

    }


    public function update(Request $request)
    {
        $page =\App\Model\Page::find($request->get('id'));

        $validation_rules = array(
            'title'=>'required',
            'content'=>'required'

        );

        $request->validate($validation_rules);



        $page->title=$request->get('title');
        $page->content=$request->get('content');


        if($page->save()){
            return redirect()->route('page')->with('message','Successfully update page');
        }else{
            return redirect()->route('page')->with('message','Not Successfully update page');
        }

    }


    public function delete(Request $request){
        $page = \App\Model\Page::find($request->get('id'));

        if($page->delete()){


            return redirect()->route('page')->with('message','Successfully delete page');
        }else{
            return redirect()->route('page')->with('message','Not Successfully delete page');
        }
    }
}
