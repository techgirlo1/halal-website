<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function adminlogout(){
        Auth::logout();
        return redirect()->route('login');
    }


    public function profile(){
        $id=Auth::user()->id;
        $user_details=User::find($id);
        return view('backend.user.user_profile',compact('user_details'));
        
    }

    public function editprofile(){
        $id=Auth::user()->id;
        $user_details=User::find($id);
        return view('backend.user.edit_profile',compact('user_details'));
    }


    public function updateprofile(Request $request){
           $request->validate([
             'name'=>'required|min:6',
             'email'=>'required',
             'photo'=>'required|max:2048'
           ]);


           $profile=User::find(Auth::user()->id);
      
        $profile->name= $request->name;
        $profile->email= $request->email;
        
      
   
            if($request->file('photo')) {
           $profile_image= $request->file('photo');
           @unlink("upload/userimages/" .$profile->profile_photo_path);
           $img_name=hexdec(uniqid()). '.' .$profile_image->getClientOriginalExtension();
           $location="upload/userimages/";
           $final_file=$location.$img_name;
           $profile_image->move($location,$img_name);
           $profile['profile_photo_path']= $img_name;
        }

        $profile->save();
        $notification=array(
            'message'=>'Profile updated Successfully',
            'alert-type'=>'success',

        );
      return Redirect()->route('user_profile')->with($notification);
     
    }
      
    
    public function resetpassword(){
        $id=Auth::user()->id;
        $user_details=User::find($id);
        return view('backend.user.change_password',compact('user_details'));
    }

    public function insertpassword( Request $request){
         $request->validate([
              'current_password'=>'required',
              'password'=>'required',
              'password_confirmation'=>'required'
         ]);

        $hashed= Auth::user()->password;
        if(Hash::check($request->current_password,$hashed)){
            $user=User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route("logout");
        }else{
            return Redirect()->back();
        }

    }

}
