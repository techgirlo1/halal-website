<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function homeProduct(){
        $product=Product::limit(3)->get();
        return  $product; 
       }
   
   
       public function AllProduct(){
           $product=Product::get();
        return  $product; 
       }



       public function Productdetails($productid){
        $id=$productid ;
        $product=Product::where('id',$id)->get();
        return $product;
         
     
    }

   
    public function Productsearch(Request $request){
        $key=$request->key;
        $productlist=Product::where('prod_desc','LIKE',"%{$key}%")->get();
        return $productlist;
    }

    



       public function allproducts(){
    
        $product=Product::paginate(5);
        
          return view('backend.product.all_product',compact('product'));
    }


    public function addproduct(){
          return view('backend.product.add_product');
    }


    public function insertproduct(Request $request){
        $request->validate([
             'desc'=>'required',
             'price'=>'required',
             'img'=>'required|max:5120|image|mimes:jpeg,png,jpg,gif,jfif'
        ]);

        $product_file=$request->file('img');
        $img_name=hexdec(uniqid()).  "." .$product_file->getClientOriginalExtension();
        $location='upload/product/';
        $final_file='http://127.0.0.1:8000/upload/product/' .$img_name;
        $product_file->move($location,$img_name);


        

        $product=new Product();
        $product->prod_desc=$request->desc;
        $product->prod_price=$request->price;
        
        $product->prod_image=$final_file;
        $product->save();

        $notification=array(
            'message'=>'product inserted Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_product')->with($notification); 
}


public function edit($id){
    $product=Product::findorFail($id);
return view('backend.product.edit',compact('product'));
}



public function editproduct(Request $request,$id){
    $request->validate([
         'desc'=>'required',
         'price'=>'required',
         
         
         
    ]);

    $product_file=$request->file('img');
    if($product_file){
    $img_name=hexdec(uniqid()).  "." .$product_file->getClientOriginalExtension();
    $location='upload/product/';
    $final_file='http://127.0.0.1:8000/upload/product/' .$img_name;
    $product_file->move($location,$img_name);


    $product= Product::findorFail($id)->update([
        'prod_desc' =>  $request->desc ,
        'prod_price'=>$request->price,
        'prod_image'=>$final_file,
        ]);
    
        $notification=array(
            'message'=>'product Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_product')->with($notification);

    }
}



public function deleteproject($id){
   $product=Product::findorFail($id)->forceDelete();
   $notification=array(
    'message'=>'product Deleted Successfully',
    'alert-type'=>'success',

);
return Redirect()->route('all_product')->with($notification);

}
    }