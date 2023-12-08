<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class AboutController extends Controller
{
      
    public function getAbout(){
        $about=About::get();
     return  $about; 
    }



    public function getAboutdesc(){
        $about=About::select('who_we_wre','mission','vision')->get();
     return  $about; 
    }


    public function allAbout(){
        $about=About::get();
     return view('backend.about.all_about',compact('about'));
    }




   

    public function addabout(){
          return view('backend.about.add_about');
    }


    public function insertabout(Request $request){
        $request->validate([
             'desc'=>'required',
             'who'=>'required',
             'vision'=>'required',
             'mission'=>'required',
            'img'=>'required|max:5120|image|mimes:jpeg,png,jpg,gif'
        ]);

        $about_file=$request->file('img');
        $img_name=hexdec(uniqid()).  "." .$about_file->getClientOriginalExtension();
        $location='upload/about/';
        $final_file='http://127.0.0.1:8000/upload/about/' .$img_name;
        $about_file->move($location,$img_name);


        


        $about=new About();
        $about->desc=$request->desc;
        $about->who_we_wre=$request->who;
        $about->vision=$request->vision;
        $about->mission=$request->mission;
        $about->image=$final_file;
        $about->save();

        $notification=array(
            'message'=>'About inserted Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_about')->with($notification); 
}


public function edit($id){
    $about=About::findorFail($id);
return view('backend.about.edit',compact('about'));
}



public function editabout(Request $request,$id){
    $request->validate([
         'desc'=>'required',
         'who'=>'required',
         'vision'=>'required',
         'mission'=>'required',
    ]);
    $about=About::findorFail($id);
    if($about_file=$request->file('img')){
    $about_file=$request->file('img');
    $img_name=hexdec(uniqid()).  "." .$about_file->getClientOriginalExtension();
    $location='upload/about/';
    $final_file='http://127.0.0.1:8000/upload/about/' .$img_name;
    $about_file->move($location,$img_name);
    File::delete('upload/about/'.$about->image);
    $about=About::findorFail($id)->update([
        
        'desc'=>$request->desc,
        'who_we_wre'=>$request->who,
        'vision'=>$request->vision,
        'mission'=>$request->mission,
        'image'=>$final_file,
        ]);
        $notification=array(
            'message'=>'About Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_about')->with($notification); 
    
    
    }else{

    


    $about=About::findorFail($id)->update([
    'desc'=>$request->desc,
    'who_we_wre'=>$request->who,
    'vision'=>$request->vision,
    'mission'=>$request->mission,
    ]);
    $notification=array(
        'message'=>'About Updated Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_about')->with($notification); 
}

}


public function deleteabout($id){
    $about=Abouts::findorFail($id)->forceDelete();
    $notification=array(
     'message'=>'About Deleted Successfully',
     'alert-type'=>'success',
 
 );
 return Redirect()->route('all_about')->with($notification);
 }

}
