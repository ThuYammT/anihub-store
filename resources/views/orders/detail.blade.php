
@extends('layouts.admin')

@section('contents')


<div class="container my-2">
    <div class="row"> <a href="{{route('orders.index')}}"> <i class="fa fa-arrow-left"></i> Back </a> </div>

    <div class="row">
       
    <ul>
        <li>Order Info:</li>
    </ul>
    <ul>
        <li>Order No : {{$order->order_no}}</li>
        <li>Order Date : {{$order->order_date}}</li>
       
    </ul>
    <ul>
        <li>Order Info:</li>
    </ul>
    <ul>
    <li>Custoemr Name : {{$order->customer_name}}</li>
        <li>Customer Email : {{$order->customer_email}}</li>
        <li>Customer Phone: {{$order->customer_phone}}</li>
        <li> Shipping Address </li>
        <li>{{$order->shipping_address}}</li>
    </ul>
    <ul>
        <li>Payment  Info:</li>
    </ul>
    <ul>
         <li>Payment Type: {{$order->payment_type}}</li>
        <li>Total Amount: {{$order->total_amount}}</li>
       
    </ul>
    <ul>
        <li>
        Order Status : {{$order->order_status}}
        </li>
    </ul>
       
    </div>
</div>

</div>

@endsection('contents')