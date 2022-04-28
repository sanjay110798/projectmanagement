@extends('layouts.front.front_layout')

@section('body-content')
  <div id="lp-register" style="background: linear-gradient(to right, rgba(0,0,0, 0.7) , rgba(0,0,0, 0.7)), url(../assets/social/images/bg/bg-3.jpg) fixed no-repeat;">
        <div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
            <div class="intro-texts">
                <h1 class="text-white">Make Cool Friends !!!</h1>
                <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
            <div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Register Now !!!</h3>
                  <p class="text-muted">Be cool and join today. Meet millions</p>
                  
                  <!--Register Form-->
                  <form name="registration_form" id='registration_form' class="form-inline" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="4">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="firstname" class="sr-only">Name</label>
                        <input id="name" type="text" class="form-control input-group-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" title="Enter Name" placeholder="Your Name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        
                        <input id="email" type="email" class="form-control input-group-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" title="Enter Email" placeholder="Your Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        
                        <input id="password" type="password" class="form-control input-group-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Confirmed Password</label>
                        
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmed Password" required autocomplete="new-password">

                          
                      </div>
                    </div>
                  
                  
                  
                  <p><a href="{{ route('login') }}">Already have an account?</a></p>
                  <button type="submit" class="btn btn-primary">Register Now</button>
                 </form><!--Register Now Form Ends-->
                </div><!--Registration Form Contents Ends-->
                
                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                  
                  <!--Login Form-->
                
                    <form  name="Login_form" id='Login_form' method="POST" action="{{ route('login') }}">
                    @csrf
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" type="email" class="form-control input-group-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        
                        <input id="my-password" type="password" class="form-control input-group-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  <!--Login Form Ends--> 
                  <p><a href="#">Forgot Password?</a></p>
                  <button type="submit" class="btn btn-primary">Login Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
        #footer{
            display: none!important;
        }
    </style>
@endsection
