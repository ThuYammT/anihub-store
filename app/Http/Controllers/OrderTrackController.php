<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderTrackController extends Controller
{
    public  function orderConfirm($id){
         $order=Order::find($id);
         $order->order_status="order_confirm";
         $order->save();

         return redirect()->back();
    }

    public  function orderPackaging($id){
        $order=Order::find($id);
        $order->order_status="order_packaging";
        $order->save();

        return redirect()->back();
   }

   public  function orderOntheway($id){
    $order=Order::find($id);
    $order->order_status="order_ontheway";
    $order->save();

    return redirect()->back();
    }

    public  function orderArrived($id){
        $order=Order::find($id);
        $order->order_status="order_arrived";
        $order->save();

        return redirect()->back();
   }



}
