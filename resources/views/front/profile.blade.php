@extends('layouts.front.front_layout')

@section('body-content')

 <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <?php if(Auth::user()->image==''){?>
				<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user" class="img-responsive profile-photo" />
				<?php }else{?>
				<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="img-responsive profile-photo" />
				<?php } ?>
                <h3>{{Auth::user()->name}}</h3>
                <p class="text-muted">{{Auth::user()->role->role_name}}</p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="">Timeline</a></li>
                  <li><a href="{{route('user.profile')}}" class="active">About</a></li>
                  <li><a href="">Album</a></li>
                  <li><a href="">Friends</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li>1,299 people following her</li>
                  <li><button class="btn-primary">Add Friend</button></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
             
				<?php if(Auth::user()->image==''){?>
				<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user" class="img-responsive profile-photo" />
				<?php }else{?>
				<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="img-responsive profile-photo" />
				<?php } ?>
              <h4>{{Auth::user()->name}}</h4>
              <p class="text-muted">{{Auth::user()->role->role_name}}</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="">Timeline</a></li>
                <li><a href="{{route('user.profile')}}" class="active">Profile</a></li>
                <li><a href="">Album</a></li>
                <li><a href="">Friends</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">
              
              <!--Edit Profile Menu-->
              <ul class="edit-menu">
              	<li class="active"><i class="icon ion-ios-information-outline"></i><a href="{{route('user.profile')}}">Basic Information</a></li>
              	<li><i class="icon ion-ios-briefcase-outline"></i><a href="">Education and Work</a></li>
              	<li><i class="icon ion-ios-heart-outline"></i><a href="">My Interests</a></li>
                <li><i class="icon ion-ios-settings"></i><a href="">Account Settings</a></li>
              	<li><i class="icon ion-ios-locked-outline"></i><a href="">Change Password</a></li>
              </ul>
            </div>
            <div class="col-md-7">

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                  <div class="line"></div>
                  
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form method="post" action="{{route('user.profile')}}" name="basic-info" id="basic-info" class="form-inline" enctype="multipart/form-data">
                  	@csrf
                    <div class="row">
                    <div class="form-group col-xs-4">
						<div class="avatar-upload">
						<div class="avatar-edit">
						<input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
						<label for="imageUpload"></label>
						</div>
						<div class="avatar-preview">
						<div id="imagePreview" >
						</div>
						</div>
						</div>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="firstname">Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="name" title="Enter Name" placeholder="First name" value="{{Auth::user()->name}}" required />
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email">My email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="My Email" value="{{Auth::user()->email}}" required />
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
              
              <!--Sticky Timeline Activity Sidebar-->
         <!--      <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
    	.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #ffffff;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: "FontAwesome";
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
      border: 6px solid #29abe2;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

    </style>
@endsection