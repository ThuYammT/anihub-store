@extends('layouts.frontend')

@section('contents')

<div class="container-fluid vh-100" style="margin-top:30px">
    <div class="" style="margin-top:20px">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                <div class="text-center">
                    <h3 class="text-primary">Register </h3>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i
                                    class="bi bi-person-plus-fill text-white"></i></span>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="name" autofocu>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                            <input type="password"  class="form-control" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password"">
                        </div>
                        
                        <div class="d-grid col-12 mx-auto">
                            <button class="btn btn-primary" type="submit"><span></span> Sign up</button>
                        </div>
                        <p class="text-center mt-3">Already have an account?
                           <a href="{{route('login')}}"> <span class="text-primary">Log in</span> </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection('contents')