
@extends('layouts.admin')

@section('contents')

<div class="container my-4">
   
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="fontsize:100px;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="form-control mb-3" name="category">
                @foreach($categories as $cat)
                <option value="{{$cat->name}}"> {{$cat->name}} </option>
                @endforeach
            </select>
            <input type="text" name="name" class="form-control mb-3" placeholder="Item Name ">
            <input type="text" name="price" class="form-control mb-3" placeholder="Item Price ">
            <input type="file" name="photo" class="form-control mb-3">
            <button class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-save"></i> Save </button>
        </form>
    </div>
</div>
        
</div>

    
@endsection('contents')

