
@extends('layouts.admin')

@section('contents')


<div class="container my-2">
    <div class="row">
        <div class="col-lg-6">
            {{$orders->links()}}
        </div>
       
    </div>
</div>
<div class="container my-4 p-5" style="padding:20px;">
    <table class="table table-striped" style="width:80%">
        <tr>
            <td>Id</td>
            <td>Order Date </td>
            <td>Order No </td>
            <td>Customer Name </td>
            <td>Custoemr Phone </td>
            <td>Actions </td>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td> {{$order->id}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->order_no}}</td>
            <td>{{$order->customer_name}}</td>
            <td>{{$order->customer_phone}}</td>
           
            <td class="d-flex justify-content-end" style="display:flex;justify-contents:end">
               <a href="{{route('orders.track',$order->id)}}" class="btn btn-primary">Order Track </a> | 
                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">Details </a> | 
                <form action="{{route('orders.destroy',$order->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                   
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                </form>
            </td>

        </tr>
        @endforeach

       



    </table>
</div>

@endsection('contents')