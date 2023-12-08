<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
class FooterController extends Controller
{
    public function getFooter(){
        $footer=Footer::get();
     return  $footer; 
    }




    public function footer(){
        $footer=Footer::all();
        return view('backend.footer.all_footer',compact('footer'));
    }


    public function addfooter(){
        return view('backend.footer.add_footer');
    }


    public function insertfooter(Request $request){
        $request->validate([
           'address'=>'required',
           'phone'=>'required',
           'email'=>'required',
           'link'=>'required',
           'be'=>'required',
           'insta'=>'required',
             'privacy'=>'required',
             'refund'=>'required',
             'terms'=>'required'
        ]);


        $footer=new Footer();
        $footer->address=$request->address;
        $footer->phone=$request->phone;
        $footer->email=$request->email;
        $footer->linkden=$request->link;
        $footer->behance=$request->be;
        $footer->instagram=$request->insta;
        $footer->privacy=$request->privacy;
        $footer->refund=$request->refund;
        $footer->terms=$request->terms;
        $footer->save();

        $notification=array(
          'message'=>'footer Inserted Successfully',
          'alert-type'=>'success',

      );
      return Redirect()->route('all_footer')->with($notification); 
}


public function edit($id){
    $footer=Footer::findorFail($id);
    return view('backend.footer.edit',compact('footer'));
}


public function editfooter(Request $request,$id){
    $request->validate([
       'address'=>'required',
       'phone'=>'required',
       'email'=>'required',
       'link'=>'required',
       'be'=>'required',
       'insta'=>'required',
       'privacy'=>'required',
       'refund'=>'required',
        'terms'=>'required'
    ]);


    $footer=Footer::findorFail($id)->update([
    'address'=>$request->address,
    'phone'=>$request->phone,
    'email'=>$request->email,
    'linkden'=>$request->link,
    'behance'=>$request->be,
    'instagram'=>$request->insta,
    'privacy'=>$request->privacy,
    'refund'=>$request->refund,
    'terms'=>$request->terms,
    ]);
    $notification=array(
      'message'=>'Footer Updated Successfully',
      'alert-type'=>'success',

  );
  return Redirect()->route('all_footer')->with($notification); 
}

public function deletefooter($id){
    $footer=Footer::findorFail($id)->delete();

    $notification=array(
        'message'=>'Footer Deleted Successfully',
        'alert-type'=>'success',
  
    );
    return Redirect()->route('all_footer')->with($notification); 
}
    
}
