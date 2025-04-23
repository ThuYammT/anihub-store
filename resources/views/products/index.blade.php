
@extends('layouts.admin')

@section('contents')

<div class="container my-2">
    <a href="{{route('products.create')}}" class="btn btn-primary"><i class="faf fa-plus"></i> Create New Product </a>
</div>
<div class="container my-2">
    <div class="row">
        <div class="col-lg-6">
            {{$products->links()}}
        </div>
        <div class="col-lg-6">
            <form action="{{route('products.search')}}" method="get" class="d-flex justified-content-end">
                <input type="text" name="search_term" id="" style="width:200px;">
                <button type="submit"><i class="fa fa-search"></i> Search </button>
            </form>
        </div>
    </div>
</div>
<div class="container my-4">
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Category </td>
            <td>Name </td>
            <td>Price </td>
            <td>Photo </td>
            <td>Actions </td>
        </tr>
        @foreach($products as $product)
        <tr>
            <td> {{$product->id}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{asset('uploads')}}/{{$product->photo}}" style="width:100px;"></td>
            <td class="d-flex justify-content-end"  style="display:flex;justify-contents:end;">
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit </a> | 
                <form action="{{route('products.destroy',$product->id)}}" method="post">
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