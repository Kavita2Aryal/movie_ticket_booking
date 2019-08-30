<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BackController
{
   public function  index(){
       $title=$this->data('title',$this->title('Category'));
       $categories = \App\Model\Category::all();
       return view('back/category',compact('categories','title'));
   }

   public function create(){
       $title=$this->data('title',$this->title('Create Category'));
       return view('back/create_category',compact('title'));
   }


   public function store(Request $request){
       $name=$request->name;
       $category = new \App\Model\Category;
       $category->category=$name;
       if($category->save()){
           return redirect()->route('category')->with('message','Inserted');
       }else{
           return redirect()->route('category')->with('message','Not Inserted');
       }
   }


   public function edit($id){
       $title=$this->data('title',$this->title('Edit Category'));
       $category=\App\Model\Category::find($id);
       return view('back/edit_category',compact('category','id','title'));

   }

   public function update(Request $request){
       $id=$request->id;
       $category=\App\Model\Category::find($id);
       $category->category = $request->get('name');
       if($category->save()){
           return redirect()->route('category')->with('message','Category Updated');
       }else{
           return redirect()->route('category')->with('message','Category Not Updated');
       }
   }

   public function delete(Request $request){
       $id=$request->id;
       $category=\App\Model\Category::find($id);
       if($category->delete()){
           return redirect('admin/category')->with('message','Category Deleted');
       }else{
           return redirect('admin/category')->with('message','Category Not Deleted');
       }
   }
}
