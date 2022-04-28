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
          <!--   <div id="chat-block">
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
            </div> -->
          </div>
          <div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
				<form method="post" action="{{route('upload.post')}}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<?php if(Auth::user()->image==''){?>
								<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user" class="profile-photo-md" />
								<?php }else{?>
								<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="profile-photo-md" />
								<?php } ?>
								<div class="row">
									<!--<div class="col-md-12">
										<input type="text" name="title" class="form-control" placeholder="Title">
									</div>-->
									<div class="col-md-12" style="margin-top: 10px;">
										<textarea name="texts" id="exampleTextarea"  class="form-control" placeholder="Write what you wish" required></textarea>
										<script>
											CKEDITOR.replace('texts');
										</script>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2" style="margin-top: 10px;display: none;">
							<select class="form-control" name="share_type" required>
								<option value="Wall_Group">Project</option>
							</select>
						</div>
						<!--<input type="file" name="image" id="image" style="display: none;" required>-->
						<input type="radio" name="post_type" id="imgtype" value="I" checked style="display: none;">
						<input type="radio" name="post_type" id="vidtype" value="V" style="display: none;">
						<div class="col-md-2 col-sm-2">
						</div>
						<div class="col-md-10 col-sm-10">
							<div class="tools">
								<!--<ul class="publishing-tools list-inline">
									<li><a href="#" id="imageType"><i class="ion-images"></i></a></li>
									<li><a href="#" id="videoType"><i class="ion-ios-videocam"></i></a></li>
								</ul>-->
								<input type="file" name="image" id="image" style="display: inline-block;" required>
								<button type="submit" class="btn btn-primary pull-right">Publish</button>
							</div>
						</div>
					</div>
				</form>
            </div><!-- Post Create Box End-->

            <!-- Post Content
            ================================================= -->
            <?php 
            if(count($social)!=0){
				foreach ($social as $key => $value) {
			?>
				<div class="post-content">
					<?php /* if($value->post_type=='I'){?>
					<img src="{{asset('upload/post/'.$value->image)}}" alt="post-image" class="img-responsive post-image" style="height: 338px;" />
					<?php } else{?>
					<video width="320" height="338" controls>
						<source src="{{asset('upload/post/'.$value->image)}}" type="video/mp4">
					</video>
					<?php } */ ?>
					@php
					$ext = substr($value->image, strrpos($value->image, '.') + 1);
					$file = asset('upload/post').'/'.$value->image;
					@endphp
					@if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
						<img src='{{$file}}' class="img-responsive post-image" style="height: 338px;">
					@elseif($ext == 'mp4' || $ext == 'MP4' || $ext == '3gp' || $ext == 'avi' || $ext == 'webm' || $ext == 'wmv')
						<video width='100%' height='338' controls disablepictureinpicture controlslist="nodownload">
							<source src='{{$file}}'>
						</video>
					@else
						<iframe src="https://docs.google.com/gview?url={{$file}}&embedded=true" style="width:100%; height:338px" frameborder="0"></iframe>
					@endif
					<div class="post-container">
						<?php if($value->users->image==''){?>
						<img src="{{asset('assets/social/images/users/user-5.jpg')}}" alt="user" class="profile-photo-md pull-left" />
						<?php }else{?>
						<img src="{{asset('upload/profile/'.$value->users->image)}}" alt="user" class="profile-photo-md pull-left" />
						<?php } ?>
						<div class="post-detail">
							<div class="user-info">
								<h5><a href="timeline.html" class="profile-link">{{$value->users->name}}</a> <span class="following">following</span></h5>
								<p class="text-muted">Published {{date('j, F, Y' ,strtotime($value->created_at))}} <span>{{date('h:i a' ,strtotime($value->created_at))}}</span></p>
							</div>
							<div class="reaction">
								<!-- <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
								<a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
							</div>
							<div class="line-divider"></div>
							<div class="post-text">
								<p>{!!$value->description!!}</p>
							</div>
							<div class="line-divider"></div>
								<?php $comm=$Appservice->getComment($value->id);
								if(count($comm)!=0){
									foreach ($comm as $key => $val) {
								?>
								<div class="post-comment">
									<?php if($val->sender->image==''){?>
									<img src="{{asset('assets/social/images/users/user-11.jpg')}}" alt="user" class="profile-photo-sm" />
									<?php }else{?>
									<img src="{{asset('upload/profile/'.$val->sender->image)}}" alt="user" class="profile-photo-sm" />
									<?php } ?>
									<p><a href="" class="profile-link">{{$val->sender->name}} </a><br>{{$val->comment}} </p>
								</div>
								<div class="row">
									<?php $repl=$Appservice->getReply($val->id);
									if(count($repl)!=0){
										foreach ($repl as $key => $vl) {
									?>
									<div class="col-md-4 text-right">
										<?php if($vl->sender->image==''){?>
										<img src="{{asset('assets/social/images/users/user-11.jpg')}}" alt="user" class="profile-photo-sm" />
										<?php }else{?>
										<img src="{{asset('upload/profile/'.$vl->sender->image)}}" alt="user" class="profile-photo-sm" />
										<?php } ?>
									</div>
									<div class="col-md-8 text-right">
										<p>{!!$vl->reply!!}</p>
									</div>
									<?php } }?>
								</div>
								<div class="row">
									<div class="col-md-12 text-right">
										<a href="{{route('get.reply',['id'=>$val->id])}}"><p><i class="fa fa-reply-all" style="font-size: 17px;"></i></p></a>
									</div>
								</div>
								<?php } }else{ ?>
								<div class="post-comment">
									<p style="text-align: center;">No Comments !!</p>
								</div>
								<?php } ?>
								<div class="post-comment">
									<?php if(Auth::user()->image==''){?>
									<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="" class="profile-photo-sm" />
									<?php }else{?>
									<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="" class="profile-photo-sm" />
									<?php } ?>
									<form action="{{route('post.comment')}}" method="post" style="width: 100%;">
										@csrf
										<div class="row">
											<div class="col-md-10">
												<input type="hidden" name="post_id" value="{{$value->id}}">
												<input type="text" class="form-control" placeholder="Post a comment" name="comment" required> 
											</div>
											<div class="col-md-2"><button type="submit" style="    background: none;border: none;"><i class="fa fa-share" style="padding: 12px 5px;font-size: 21px;color: #76b0e2;"></i></button></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } }else{ ?>
					<div class="post-content">
						<div class="row">
							<div class="col-md-12 text-center">
								<p style="padding: 28px;">No Post !!</p> 
							</div>
						</div>
					</div>
					<?php } ?>
			</div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
          <div class="col-md-2 static">
           <!--  <div class="suggestions" id="sticky-sidebar">
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
            </div> -->
          </div>
        </div>
      </div>
    </div>

  @endsection