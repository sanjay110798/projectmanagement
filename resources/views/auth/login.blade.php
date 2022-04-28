@extends('layouts.front.front_layout')

@section('body-content')
 <div class="col-md-6">
          <img src="{{asset('assets/front_login/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">Project Management Application Login</p>
            </div>
            <form action="{{ route('login') }}" method="post">
                 @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="username" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="{{ old('remember') ? 'checked' : '' }}" name="remember"/>
                  <div class="control__indicator"></div>
                </label>
                <!--<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>--> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

             <!-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>-->
            </form>
            </div>
          </div>
          
        </div>
@endsection