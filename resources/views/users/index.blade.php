
@extends('layouts.admin')

@section('contents')


<div class="container my-2">
    <div class="row">
        <div class="col-lg-6">
            {{$users->links()}}
        </div>
        <div class="col-lg-6">
            <form action="{{route('users.search')}}" method="get" class="d-flex justified-content-end">
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
            <td>Name </td>
            <td>Email </td>
            <td>User Type </td>
            
            <td>Actions </td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td> {{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_type}}</td>
            
            <td class="d-flex justify-content-end" style="display:flex;justify-contents:end;">
                <a href="{{route('users.show',$user->id)}}" class="btn btn-primary">Details </a> | 
                <form action="{{route('users.destroy',$user->id)}}" method="post">
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