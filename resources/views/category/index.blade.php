@extends('layouts.admin')

@section('contents')

<div class="container my-2">
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="faf fa-plus"></i> Create new Category </a>
</div>
<div class="container my-4">
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name </td>
            <td>Image</td>
            <td>Actions </td>
        </tr>
        @foreach($categories as $cat)
        <tr>
            <td> {{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td><img src="{{asset('storage/'.$cat->image)}}" width="50"></td>
            <td class="d-flex justify-content-end" style="display:flex;justify-contents:end;">
                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit </a> | 
                <form action="{{route('category.destroy',$cat->id)}}" method="post">
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