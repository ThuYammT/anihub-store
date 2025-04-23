<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;


class CartController extends Controller
{

    
//cart list
public function list(){
    $products=session()->get('cart');
    return view('cart',compact('products'));

}
//add new cart into shopping cart 
public function add($id)
{
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Item added to cart successfully!');
        }

        // if cart not empty then check if this item exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Item added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart successfully!');
}



//update quantity

public function increase($id)
{
       
            $cart = session()->get('cart');

            $cart[$id]["quantity"]++;

            session()->put('cart', $cart);
            return redirect()->back();
        
}


public function decrease($id)
{
       
            $cart = session()->get('cart');

            if($cart[$id]['quantity']<=1){
                unset($cart[$id]);  
            }
            else{
                $cart[$id]["quantity"]--;

            }
            
           

            session()->put('cart', $cart);
            return redirect()->back();
        
}


//remove cart 
public function remove($id)
{
        
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
               
            }

            session()->put('cart', $cart);
            return redirect()->back();
        
    }


    //checkout 
    public function checkout(){

        $cart=session()->get('cart');
    
        return view('checkout',compact('cart'));
    }

    public function placeorder(Request $request){

        $order_no="order_#".rand(1000,9999);
        $order_date=date('d-M-Y');
       

        Order::create([
            'order_no'=>$order_no,

            'order_date'=>$order_date,
            'order_items'=>$request->order_items,
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_phone'=>$request->customer_phone,
            'customer_address'=>$request->customer_address,
            'payment_type'=>$request->payment_type,
            'total_amount'=>$request->total_amount,
            'order_status'=>'none'
        ]);

        $order_cart=session()->get('cart');
        session()->forget('cart');
        return view('ordersuccess',compact('order_cart'));


    }
   


}