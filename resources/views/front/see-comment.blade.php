@extends('layouts.front.front_layout_login')

@section('body-content')
<style>
.user_type_sec input[type="file"] {
    position: absolute;
    width: 155px;
    opacity: 0;
}
</style>
	<!-- Middle Content -->
	<div class="middle_content">
		<ul id="myTabs" class="nav nav-pills nav-justified tab_btn_sec" role="tablist" data-tabs="tabs">
			<!-- <li><a href="#Commentary" data-toggle="tab" class="active"><img src="{{asset('assets/images/task_icon.png')}}" alt="Task"/><span>Create Task</span></a></li>
			<li><a href="#Approval" data-toggle="tab"><img src="{{asset('assets/images/approval_icon.png')}}" alt="Approval"/><span>Get Approval</span></a></li> -->
			<li><a href="#Videos" data-toggle="tab" class="active" id="postupdate_click"><img src="{{asset('assets/images/update_icon.png')}}" alt="Update" /><span>Post Update</span></a></li>
		</ul>
		<div class="tab-content">
				
			<!-- Create Task -->
			<div role="tabpanel" class="tab-pane fade in " id="Commentary">
				<div class="block_sec">
					<form class="create_from" action="{{route('create.task')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Assign Task for <i class="fa fa-cog" aria-hidden="true"></i>
								<select name="project" class="form-control" style="display: inline-block; width: auto;" required>
									<option value="">-- Select --</option>
									@foreach($project as $k=>$v)
									<option value="{{$v->id}}">{{$v->project_name}}</option>
									@endforeach
								</select>
								&nbsp;to <i class="fa fa-user" aria-hidden="true"></i> 
								<select name="post_for" class="form-control" style="display: inline-block; width: auto;" required>
									<option value="">-- Select --</option>
								</select>
							</label>
							<h4 class="priority">Priority <span id="prio" style="cursor: pointer">&nbsp;</span>
								<input type="checkbox" name="priority" style="opacity: 0;" checked>
							</h4>
							<textarea class="form-control" name="texts" id="exampleFormControlTextarea1" rows="3" required></textarea>
							<script>
								CKEDITOR.replace('texts');
							</script>
							<div class="user_due_date">
								<div class="form-group due_date">
									<label for="exampleInputEmail1">Due Date</label>
									<div class="due_date_select">
										<input type="date" name="due_date" class="form-control" placeholder="Select Date" style="border: 1px solid #ced4da; opacity: 1; width: 100%;" required>
										<!-- <a class="select_date" href="#">Select Date</a> -->
									</div>
								</div>
								<div class="user_type_sec">
									<h4 class="update_title">Update type:</h4>
									<ul>
										<li>
											<a class="photo" href="#"><img src="{{asset('assets/images/photo_icon.png')}}" alt="Image"/>Photo</a>
										</li>
										<li>
											<a class="doc" href="#"><img src="{{asset('assets/images/notepad.png')}}" alt="Notepad"/>Doc(s)</a>
										</li>
										<!-- <li><a class="location" href="#"><img src="{{asset('assets/images/location_icon.png')}}" alt="Location"/>Location</a></li> -->
									</ul>
									<input type="file" name="file_upload[]" multiple>
								</div>
							</div>
							<div class="bottom_sec">
								<div class="form-group share_droupdown">
									<label for="leve">Share With</label>
									<select class="form-control" id="level" name="level" required>
										<option value="">-- Select --</option>
										<option value="1">Lavel 1</option>
										<option value="2">Lavel 2</option>
										<option value="3">Lavel 3</option>
										<option value="4">Lavel 4</option>
										<option value="5">Lavel 5</option>
									</select>
								</div>
								<div class="btn_group">
									<button type="submit" class="btn btn-primary update_btn">Update</button>
									<button type="button" class="btn btn-primary cancle_btn" onclick="this.form.reset();">Cancle</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				@foreach($task as $k=>$v)
				<!--  Accordion Block -->
				<div class="accordion block_accordion" id="block_accordion_sec">
					<div class="card block_sec">
						<div class="card-header" id="TaskHeadingTwo">
						  <h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#Task{{$v->id}}" aria-expanded="false" aria-controls="Task{{$v->id}}">
								<div class="user_title">
									<div class="user_details">
										<div class="user_photo">
											@if(!$v || !$v->postfor_details || $v->postfor_details->image=='')
											<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
											@else
											<img src="{{asset('upload/profile/'.$v->postfor_details->image)}}" alt="user"/>
											@endif
										</div>
										<div class="text_content">
											<h4 class="name">{{($v->postfor_details) ? $v->postfor_details->name : ''}} <span>assigned by</span> <i class="fa fa-user" aria-hidden="true"></i> <a href="javaScript:void(0);">{{($v->user_details) ? $v->user_details->name : ''}}</a> <span>for</span> <i class="fa fa-cog" aria-hidden="true"></i><a href="javaScript:void(0);">{{($v->project_details) ? $v->project_details->project_name : ''}}</a></h4>
											<h5 class="project"><span>Level {{$v->level}}</span>shared on {{date('d-m-Y',strtotime($v->created_at))}} @ {{date('h:i a',strtotime($v->created_at))}}</h5>
											<br>
											{!! $v->description !!}
										</div>
									</div>
									
									<a class="arrow_btn priority" href="javaScript:void(0);">
									{{($v->priority=='on') ? 'Priority' : ''}}
										<div class="arrow_icon">
											<!-- <img src="{{asset('assets/images/down_arrow3.png')}}" alt="Arrow"/> -->
											<i class="fa fa-paperclip"></i>
										</div>
									</a>
								</div>
							</button>
						  </h2>
						</div>
						@if($v->image != '')
						<div id="Task{{$v->id}}" class="collapse" aria-labelledby="TaskHeadingTwo" data-parent="#block_accordion_sec">
							<div class="card-body">
								<div class="block_poject">
									<h4 class="poject">Project attachments</h4>
									<ul class="project_gallery">
										@php $file = explode(',',$v->image); @endphp
										@foreach($file as $key=>$val)
											@php $ext = substr($val, strrpos($val, '.') + 1); @endphp
											@if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
										<li class="gallery_photo">
											<img src="{{asset('upload/post').'/'.$val}}">
										</li>
											@else
										<li class="gallery_photo" style="width: auto;">
											<a href="{{asset('upload/post').'/'.$val}}" target="_blank"><i class="fas fa-file-alt" style="font-size: 130px;"></i></a>
										</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						@endif
						<div class="bottom_sec">
							<div class="like">
								<a href="#">
									<div class="icon"><i class="fa fa-sticky-note" aria-hidden="true"></i></div> Task Log
								</a>
								
							</div>
							<div class="comment_sec share_comment">
								<a href="#">
									<div class="icon"><i class="fa fa-share-alt" aria-hidden="true"></i></div>Share
								</a>
								<a href="#">
									<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Comment
								</a>
							</div>
						</div>
					
					</div>
				</div>
				<!--  Accordion Block -->
				@endforeach
			</div>
			<!-- Create Task -->
					
					
					
					
			<!-- Approval -->
			<div role="tabpanel" class="tab-pane fade in" id="Approval">
				
				
				<div class="block_sec">
					<form class="create_from">
						<div class="form-group">
							<label>Create Update for <i class="fa fa-users" aria-hidden="true"></i> <a class=""dropdown-item" href="#">Finance Group</a></label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							
							<div class="user_type_sec">
								<h4 class="update_title">Update type:</h4>
								<ul>
									<li><a class="photo" href="#"><img src="images/photo_icon.png" alt="Photo"/>Photo</a></li>
									<li><a class="doc" href="#"><img src="images/notepad.png" alt="Notepad"/>Doc(s)</a></li>
									<li><a class="location" href="#"><img src="images/location_icon.png" alt="Location"/>Location</a></li>
								</ul>
							
							</div>
							<div class="btn_group">
								<button type="submit" class="btn btn-primary update_btn">Update</button>
								<button type="submit" class="btn btn-primary cancle_btn">Cancle</button>
							</div>
							
						</div>
					</form>
				</div>
				
				<!--  Accordion Block -->
				<div class="accordion block_accordion" id="block_accordion_sec">
					<div class="card block_sec">
						<div class="card-header" id="TaskHeadingTwo">
						  <h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#TaskCreateTwo" aria-expanded="false" aria-controls="TaskCreateTwo">
								<div class="user_title">
									<div class="user_details">
										<div class="user_photo">
											<img src="images/user_photo.png" alt="User">
										</div>
										<div class="text_content">
											<h4 class="name">Pritam Roy <span>Shared update on project</span> <i class="fa fa-cog" aria-hidden="true"></i><a href="#">ARS Technologies</a></h4>
											<h5 class="project"><span>Level1</span>shared on 20th January @ 9:30pm</h5>
											<h3 class="title">New workstation installation done.<span>Shared 4 project pics</span></h3>
										</div>
									</div>
									
									<a class="arrow_btn" href="#"><img src="images/down_arrow3.png" alt="Arrow"/></a>
								</div>
							</button>
						  </h2>
						</div>
						<div id="TaskCreateTwo" class="collapse" aria-labelledby="TaskHeadingTwo" data-parent="#block_accordion_sec">
							<div class="card-body">
								<div class="block_poject">
									<h4 class="poject">Project complete and delivery</h4>
									<ul class="project_gallery">
										<li class="gallery_photo">
											<img src="images/project_photo_one.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_two.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_three.png" alt="Project">
										</li>
										
									</ul>
									
								</div>
							</div>
						</div>
						
						<div class="bottom_sec">
							<div class="like">
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div> 12
								</a>
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>6
								</a>
							</div>
							<div class="comment_sec">
								<a href="#">
									<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Comment
								</a>
							</div>
						</div>
					</div>
					
					
					<div class="card block_sec">
						<div class="card-header" id="TaskHeadingOne">
							<h2 class="mb-0">
								<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#TaskCreateTwo" aria-expanded="false" aria-controls="TaskCreateTwo">
									<div class="user_title">
										<div class="user_details">
											<div class="user_photo">
												<img src="images/user_photo.png" alt="User">
											</div>
											<div class="text_content">
												<h4 class="name">Pritam Roy <span>Shared update on project</span> <i class="fa fa-cog" aria-hidden="true"></i><a href="#">ARS Technologies</a></h4>
												<h5 class="project"><span>Level1</span>shared on 20th January @ 9:30pm</h5>
												<h3 class="title">New workstation installation done.<span>Shared 4 project pics</span></h3>
											</div>
										</div>
										
										<a class="arrow_btn" href="#"><img src="images/down_arrow3.png" alt="Arrow"/></a>
									</div>
								</button>
							</h2>
						</div>

						<div id="TaskCreateOne" class="collapse show" aria-labelledby="TaskHeadingOne" data-parent="#block_accordion_sec">
							<div class="card-body">
								<div class="block_poject">
									<h4 class="poject">Project complete and delivery</h4>
									<ul class="project_gallery">
										<li class="gallery_photo">
											<img src="images/project_photo_one.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_two.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_three.png" alt="Project">
										</li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="bottom_sec">
							<div class="like">
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div> 12
								</a>
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>6
								</a>
							</div>
							<div class="comment_sec">
								<a href="#">
									<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Comment
								</a>
							</div>
						</div>
					</div>
					
					
					
					<div class="card block_sec">
						<div class="card-header" id="TaskHeadingThre">
						  <h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#TaskCreateThree" aria-expanded="false" aria-controls="TaskCreateThree">
								<div class="user_title">
									<div class="user_details">
										<div class="user_photo">
											<img src="images/user_photo.png" alt="User">
										</div>
										<div class="text_content">
											<h4 class="name">Pritam Roy <span>Shared update on project</span> <i class="fa fa-cog" aria-hidden="true"></i><a href="#">ARS Technologies</a></h4>
											<h5 class="project"><span>Level1</span>shared on 20th January @ 9:30pm</h5>
											<h3 class="title">New workstation installation done.<span>Shared 3 project pics</span></h3>
										</div>
									</div>
									
									<a class="arrow_btn" href="#"><img src="images/down_arrow3.png" alt="Arrow"/></a>
								</div>
							</button>
						  </h2>
						</div>
						<div id="TaskCreateThree" class="collapse" aria-labelledby="TaskHeadingThree" data-parent="#block_accordion_sec">
							<div class="card-body">
								<div class="block_poject">
									<h4 class="poject">Project complete and delivery</h4>
									<ul class="project_gallery">
										<li class="gallery_photo">
											<img src="images/project_photo_one.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_two.png" alt="Project">
										</li>
										<li class="gallery_photo">
											<img src="images/project_photo_three.png" alt="Project">
										</li>
										
									</ul>
									
								</div>
							</div>
						</div>
						
						<div class="bottom_sec">
							<div class="like">
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div> 12
								</a>
								<a href="#">
									<div class="icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>6
								</a>
							</div>
							<div class="comment_sec">
								<a href="#">
									<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Comment
								</a>
							</div>
						</div>
					</div>
					
					
				</div>
				<!--  Accordion Block -->
				
			
			</div>
			<!-- Approval -->
					
			<!-- Post Update -->
			<div role="tabpanel" class="tab-pane fade active show" id="Videos">
				@php
				$group = $Appservice->get_group();
				@endphp
				<div class="block_sec" id="postupdate_show" style="display:none;">
					<form class="create_from" action="{{route('post.update')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Create Update for <i class="fa fa-users"></i>
								<select name="group" class="form-control" style="display: inline-block; width: auto;" required>
									<option value="">-- Select --</option>
									@foreach($group as $k=>$v)
									<option value="{{$v->id}}">{{$v->group_name}}</option>
									@endforeach
								</select>
							</label>
							<textarea class="form-control" name="texts2" id="exampleFormControlTextarea1" rows="3" required></textarea>
							<script>
								CKEDITOR.replace('texts2');
							</script>
							<div class="user_type_sec">
								<h4 class="update_title">Update type:</h4>
								<ul>
									<li>
										<a class="photo" href="#"><img src="{{asset('assets/images/photo_icon.png')}}" alt="Image"/>Photo</a>
									</li>
									<li>
										<a class="doc" href="#"><img src="{{asset('assets/images/notepad.png')}}" alt="Notepad"/>Doc(s)</a>
									</li>
									<!-- <li><a class="location" href="#"><img src="{{asset('assets/images/location_icon.png')}}" alt="Location"/>Location</a></li> -->
								</ul>
								<input type="file" name="file_upload[]" multiple>
							</div>
							<div class="bottom_sec">
								<div class="form-group share_droupdown">
									<label for="leve">Share With</label>
									<select class="form-control" id="level" name="level" required>
										<option value="">-- Select --</option>
										<option value="1">Lavel 1</option>
										<option value="2">Lavel 2</option>
										<option value="3">Lavel 3</option>
										<option value="4">Lavel 4</option>
										<option value="5">Lavel 5</option>
									</select>
								</div>
								<div class="btn_group">
									<button type="submit" class="btn btn-primary update_btn">Update</button>
									<button type="button" class="btn btn-primary cancle_btn" onclick="this.form.reset();">Cancle</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<!--  Accordion Block -->
				<div class="accordion block_accordion" id="block_accordion_sec">
					@foreach($post_data as $k=>$v)
					<div class="card block_sec">
						<div class="card-header" id="TaskHeadingTwo">
						  <h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#Task{{$v->id}}" aria-expanded="false" aria-controls="Task{{$v->id}}">
								<div class="user_title">
									<div class="user_details">
										<div class="user_photo">
											@if($v->user_details->image=='')
											<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
											@else
											<img src="{{asset('upload/profile/'.$v->user_details->image)}}" alt="user"/>
											@endif
										</div>
										<div class="text_content">
											<h4 class="name">{{$v->user_details->name}} <span>Shared update on </span> <i class="fa fa-cog" aria-hidden="true"></i><a href="javaScript:void(0);">{{$v->group_details->group_name}}</a></h4>
											<h5 class="project"><span>Level {{$v->level}}</span>shared on {{date('d-m-Y',strtotime($v->updated_at))}} @ {{date('h:i a',strtotime($v->updated_at))}}</h5>
											<br>
											{!! $v->description !!}
										</div>
									</div>
									<a class="arrow_btn" href="javaScript:void(0);">
										<img src="{{asset('assets/images/down_arrow3.png')}}" alt="Arrow"/>
									</a>
								</div>
							</button>
						  </h2>
						</div>
						@if($v->image != '')
						<div id="Task{{$v->id}}" class="collapse" aria-labelledby="TaskHeadingTwo" data-parent="#block_accordion_sec">
							<div class="card-body">
								<div class="block_poject">
									<h4 class="poject">Project attachments</h4>
									<ul class="project_gallery">
										@php $file = explode(',',$v->image); @endphp
										@foreach($file as $key=>$val)
											@php $ext = substr($val, strrpos($val, '.') + 1); @endphp
											@if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
										<li class="gallery_photo">
											<img src="{{asset('upload/task').'/'.$val}}">
										</li>
											@else
										<li class="gallery_photo" style="width: auto;">
											<a href="{{asset('upload/task').'/'.$val}}" target="_blank"><i class="fas fa-file-alt" style="font-size: 130px;"></i></a>
										</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						@endif
						<div class="bottom_sec">
							<div class="like">
								<a href="javaScript:void(0);" class="like_dis" data-status="L" data-id="{{$v->id}}" data-table="PostRelation">
									<div class="icon" data-toggle="tooltip" data-placement="top" title="{{$Appservice->userlist('L',$v->id,'PostRelation')}}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div> {{$Appservice->total_likedis('L',$v->id,'PostRelation')}}
								</a>
								<a href="javaScript:void(0);" class="like_dis" data-status="D" data-id="{{$v->id}}" data-table="PostRelation">
									<div class="icon" data-toggle="tooltip" data-placement="top" title="{{$Appservice->userlist('D',$v->id,'PostRelation')}}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div> {{$Appservice->total_likedis('D',$v->id,'PostRelation')}}
								</a>
							</div>
							<div class="comment_sec">
								<a href="{{route('post.comment.reply',['id'=>$v->id])}}">
									<div class="icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Comment
								</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	
    <!-- <div id="page-contents">
    	<div class="container">
    		<div class="row">
		<div class="col-md-7">
            <div class="create-post">
				<form method="post" action="{{route('create.task')}}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<div class="row">
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
								<option value="Wall_Common">Common</option>
							</select>
						</div>
						<input type="radio" name="post_type" id="imgtype" value="I" checked style="display: none;">
						<input type="radio" name="post_type" id="vidtype" value="V" style="display: none;">
						<div class="col-md-1 col-sm-1">
						</div>
						<div class="col-md-2 col-sm-2">
							File Upload: 
						</div>
						<div class="col-md-9 col-sm-9">
							<div class="tools">
								<input type="file" name="image" id="image" class="form-control" style="display: inline-block;" required>
							</div>
						</div>
						<div class="col-md-1 col-sm-1">
						</div>
						<div class="col-md-2 col-sm-2">
							Post For: 
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="tools">
								<select name="post_for" class="form-control">
									<option value="">All</option>
									@foreach($grp as $k=>$v)
									<option value="{{$v->employee_id}}">{{$v->name}}</option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 pull-right">
							<div class="tools">
								<button type="submit" class="btn btn-primary pull-right">Publish</button>
							</div>
						</div>
					</div>
				</form>
            </div>
            <?php 
            if(count($social)!=0){
				foreach ($social as $key => $value) {
            ?>
				<div class="post-content">
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
    		</div>
    	</div>
    </div> -->

  @endsection
  @section('js-content')
  <script>
  	$('#postupdate_click').click(function(){
     $('#postupdate_show').toggle();
  	});
  $('.like_dis').click(function(){
	  var status = $(this).data('status');
	  var id = $(this).data('id');
	  var table = $(this).data('table');
	$.ajax({
		url:'{{route("like-dislike")}}',
		type:'post',
		data:{'_token':'{{csrf_token()}}', status:status, id:id, table:table},
		success:function(res){
			if(res == 1){
				swal({
					title: "Success",
					text: "Update successfull.",
					icon: "success",
					button: "Ok",
				});
			} else {
				swal({
					title: "Error",
					text: "Update not done.",
					icon: "error",
					button: "Ok",
				});
			}
		}
	});
  });
  </script>
  @endsection