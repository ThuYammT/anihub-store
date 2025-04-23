@extends('layouts.admin')
@section('contents')
<div class="container my-4">
   
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="fontsize:100px;"></i>
    </div>
    <div class="col-lg-6">
    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" class="form-control mb-3" placeholder="Category Name">
    <input type="file" name="image" class="form-control mb-3" required>
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
</form>
    </div>
</div>
        
</div>

    
@endsection('contents')
