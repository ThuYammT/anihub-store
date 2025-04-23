
@extends('layouts.admin')

@section('contents')


<div class="container my-2">
    <div class="row"> <a href="{{route('users.index')}}"> <i class="fa fa-arrow-left"></i> Back </a> </div>

    <div class="row">
    <ul>
        @if($user->photo=="none")
        <li><img src="{{asset('uploads/admin.png')}}" style="width:100px;"> </li>
       
        @else
        <li><img src="{{asset('uploads')}}/{{$user->photo}}" style="width:200px;"> </li>
        @endif
    </ul>
       
    <ul>
        <li>User Details:</li>
    </ul>
    <ul>
        <li>User Name : {{$user->name}}</li>
        <li>User Email : {{$user->email}}</li>
        <li>User TYpe : {{$user->user_type}}</li>
       
    </ul>
    
     
       
    </div>
</div>

</div>

@endsection('contents')