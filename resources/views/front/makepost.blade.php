@extends('layouts.front.front_layout')

@section('body-content')

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="profile-card">
              <?php if(Auth::user()->image==''){?>
              <img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user" class="profile-photo" />
              <?php }else{?>
              <img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="profile-photo" />
              <?php } ?>
            	<h5><a href="{{route('user.profile')}}" class="text-white">{{Auth::user()->name}}</a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
           @include('layouts.front.navbar')
         <!--    <div id="chat-block">
              <div class="title">Chat online</div>
              <ul class="online-users list-inline">
                <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="{{asset('assets/social/images/users/user-2.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="{{asset('assets/social/images/users/user-3.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="John Doe"><img src="{{asset('assets/social/images/users/user-4.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="{{asset('assets/social/images/users/user-5.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="James Carter"><img src="{{asset('assets/social/images/users/user-6.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="{{asset('assets/social/images/users/user-7.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="{{asset('assets/social/images/users/user-8.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Anna Young"><img src="{{asset('assets/social/images/users/user-9.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="{{asset('assets/social/images/users/user-10.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div> --><!--chat block ends-->
          </div>
    			<div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
         
           
            <div class="post-content">
				<div class="post-container">
					<form method="post" action="{{route('upload.post')}}" enctype="multipart/form-data">
					@csrf
						<div class="row">
							<!--<div class="col-md-6">
								<label class="form-group">Post Type</label>
								<div class="form-group">
									<input type="radio" name="post_type" value="I" checked> <span style="padding: 8px;">Image</span>
									<input type="radio" name="post_type" value="V" > <span style="padding: 8px;">Video</span>
								</div>
							</div>-->
							<div class="col-md-12">
								<label class="form-group">Wall</label>
								<select class="form-control" name="share_type" id="wall">
									<option value="Wall_Common">Common</option>
									<option value="Wall_Project">Project</option>
									<option value="Wall_Employee">Employee</option>
									<option value="Wall_Group">Group</option>
									<option value="Wall_Notification">Notification</option>
								</select>
							</div>
							<!-- <div class="col-md-6" style="margin-left: -2px;">
								<label class="form-group">Announcements</label>
								<select class="form-control" name="announce_type" id="ann">
									<option value="Ann_Common">Common</option>
									<option value="Ann_Project">Project</option>
									<option value="Ann_Department">Department</option>
								</select>
							</div> -->
							<div class="col-md-6" id="show_wall" style="margin-left: -2px;">
							</div>
							<div class="col-md-6" id="show_ann" style="margin-left: -2px;">
							</div>
							<!--<div class="col-md-12" style="margin-top: 10px">
								<label class="form-group">Post Title</label>
								<input type="text" name="title" class="form-control" placeholder="Enter Title">
							</div>-->
							<div class="col-md-12" style="margin-top: 10px">
								<label class="form-group">Post Description</label>
								<textarea class="form-control" name="texts" placeholder="Enter Description"></textarea>
								<script>
									CKEDITOR.replace('texts');
								</script>
							</div>
							<div class="col-md-12" style="margin-top:10px">
								<div class="tools">
									<!--<label class="form-group">Image/Video</label>-->
									<input type="file" name="image" placeholder="Enter Title" style="display: inline-block;">
									<button type="submit" class="btn btn-primary pull-right">Post</button>
								</div>
							</div>
						</div>
					</form>
				</div>
            </div>
            
          </div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<!-- <div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              <div class="follow-user">
                <img src="{{asset('assets/social/images/users/user-11.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/social/images/users/user-12.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Cris Haris</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/social/images/users/user-13.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Brian Walton</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/social/images/users/user-14.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Olivia Steward</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{asset('assets/social/images/users/user-15.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sophia Page</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
            </div>
          </div> -->
    		</div>
    	</div>
    </div>
    <style type="text/css">
    .select2-container--default.select2-container--focus .select2-selection--multiple {
     border: none!important; 
    /* outline: 0; */
    }
    </style>
  @endsection