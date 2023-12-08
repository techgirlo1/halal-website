<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function allContact(){
        $contact=Contact::get();
     return  $contact; 
    }


    public function insert(Request $request){
        $ContactArray=json_decode($request->getContent(),true);
        $name=$ContactArray['name'];
        $email=$ContactArray['email'];
        $message=$ContactArray['message'];
        

         $contact_insert=new Contact();
         $contact_insert->name=$name;
         $contact_insert->email=$email;
         $contact_insert->message=$message;
         $contact_insert->save();
         if( $contact_insert){
              return('Message sent succesfully');
         }else{
             return(0);
         }

}



public function contact(){
    $contact=Contact::paginate(5);
    return view('backend.contact.all_contact',compact('contact'));
}



public function deletecontact($id){
    $contact=Contact::findorFail($id)->delete();

    $notification=array(
        'message'=>'Message Deleted Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_contact')->with($notification);
}

}
