<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartOrder;
use App\Models\User;
use Illuminate\Support\Str;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {



        
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $email = $request->input('email');


        // Find the product by ID
        $productDetails = Product::where('id', $id)->first();
        // If the product is not found, return a 404 response
        if (!$productDetails) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        $price = $productDetails->prod_price;


        $cart = Cart::insert([
            'email' =>$email,
            'quantity' => $quantity,
            'image' => $productDetails->prod_image,
            'product_name' => $productDetails->prod_desc,
            'product_id' => $productDetails->id,
            'unit_price' => $price,
            'total_price' => $price * $quantity,
            
        ]);

        return $cart;
    }


    public function CartCount(Request $request){
        $id=$request->id;
        $result = User::where('id', $id)->count();
        return $result;
   }



   public function getUserCart(Request $request)
{
    $email=$request->email;
    $result=Cart::where('email',$email)->get();
    return $result;
}

public function removeCartList(Request $request)
{
    $id=$request->id;
    $result=Cart::where('id',$id)->delete();
    return $result;
}


public function cartItemPlus($id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return response()->json(['error' => 'Cart item not found'], 404);
    }

    // Increment quantity and update total price
    $cartItem->quantity++;
    $cartItem->total_price = $cartItem->quantity * $cartItem->unit_price;
    $cartItem->save();

    return response()->json(['success' => true]);
}

public function cartItemMinus($id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return response()->json(['error' => 'Cart item not found'], 404);
    }

    // Increment quantity and update total price
    $cartItem->quantity--;
    $cartItem->total_price = $cartItem->quantity * $cartItem->unit_price;
    $cartItem->save();

    return response()->json(['success' => true]);
}



public function CartOrder(Request $request)
    {



        
        $state = $request->input('state');
        $name = $request->input('name');
        
        $email = $request->input('email');
        $delivery_address = $request->input('delivery_address');
        $delivery_charge = $request->input('delivery_charge');
        $invoice_no = $request->input('invoice_no');
        
        date_default_timezone_set('Africa/Lagos');
        $request_time=date('h:i:sa');
        $request_date=date('d-m-Y');


        // Find the product by ID
        $cartlist = Cart::where('email', $email)->get();
        // If the product is not found, return a 404 response
        $cartinsertDelete="";
        foreach($cartlist as $cartlists){
            
            $cart = CartOrder::insert([
                'invoice_no'=>'halal'.$invoice_no,
                'email' =>$cartlists->email,
                'quantity' =>$cartlists->quantity,
                'product_name' => $cartlists->product_name,
                'product_id' => $cartlists->product_id,
                'unit_price' => $cartlists->unit_price,
                'total_price' => $cartlists->total_price,
                'name'=>$name,
                'delivery_address'=>$delivery_address,
                'delivery_charge' =>$delivery_charge,
                'state'=>$state,
                'order_date'=>$request_date,	
                'order_time'=>$request_time,	
                'order_status'=>'Pending',
            ]);
             if( $cart==1){
                $cartDelete=Cart::where('id',$cartlists['id'])->delete();

                if($cartDelete){
                    $cartinsertDelete==1;  
                }else{
                    $cartinsertDelete==0;
                }
             }
            
        }
      return $cart;
       
    }


    public function orderlist(Request $request){
        $email=$request->email;
        $order_status=$request->order_status;
         $orderlist=CartOrder::where('email',$email)->where('order_status',$order_status)->orderBy('id','DESC')->get();
         return $orderlist;
    }


//order process form backend
    public function pendingOrder(){
     $order=CartOrder::where('order_status','Pending')->orderBy('id','DESC')->get();
     return view('backend.order.pending',compact('order'));
    }


    public function processingOrder(){
        $order=CartOrder::where('order_status','Processing')->orderBy('id','DESC')->get();
        return view('backend.order.processing',compact('order'));
       }



       public function completeOrder(){
        $order=CartOrder::where('order_status','Complete')->orderBy('id','DESC')->get();
        return view('backend.order.complete',compact('order'));
       }


       public function pendingDetails($id){
        $order=CartOrder::findOrFail($id);
        return view('backend.order.editpending',compact('order'));
       }

       public function pendingprocess($id){
        CartOrder::findOrFail($id)->update([
            'order_status'=>'Processing'
             ]);


             $notification=array(
                'message'=>'Order Processing Successful',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('processing')->with($notification);
        
       }


       public function completeprocess($id){
        CartOrder::findOrFail($id)->update([
            'order_status'=>'Complete'
             ]);


             $notification=array(
                'message'=>'Order Completed Successfully',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('complete')->with($notification);
        
       }

       public function deleteprocess($id){
        CartOrder::findOrFail($id)->delete();


             $notification=array(
                'message'=>'Order Deleted Successfully',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('complete')->with($notification);
        
       }

}


