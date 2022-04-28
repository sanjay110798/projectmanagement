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
		<div class="tab-content">
			
		
			<!-- Post Update -->
			<div role="tabpanel" class="tab-pane fade active show" id="Videos">
				
				<div class="block_sec" id="postupdate_show">
					<form class="create_from" action="{{route('grouppost.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Create Update for <i class="fa fa-users"></i>
								<select name="group" class="form-control" style="display: inline-block; width: auto;" required>
									<option value="">-- Select --</option>
									@foreach($list as $k=>$v)
									<option value="{{$v->name}}" {{($v->name==$data->priority) ? 'selected' : ''}}>{{$v->name}}</option>
									@endforeach
								</select>
							</label>
							<textarea class="form-control" name="texts2" id="exampleFormControlTextarea1" rows="8" required>{{$data->description}}</textarea>
							
							<div class="user_type_sec">
								<h4 class="update_title">Update type:</h4>
								<ul>
									<li>
										<a class="photo" href="#"><img src="{{asset('assets/images/photo_icon.png')}}" alt="Image"/>Photo</a>
									</li>
									<li>
										<a class="doc" href="#"><img src="{{asset('assets/images/notepad.png')}}" alt="Notepad"/>Doc(s)</a>
									</li>
									
								</ul>
								<input type="file" name="file_upload[]" multiple>
							</div>
							<div class="bottom_sec">
								<div class="form-group share_droupdown">
									<label for="leve">Share With</label>
									<select class="form-control" id="level" name="level" required>
										<option value="">-- Select --</option>
										<option value="1" {{(1==$data->level) ? 'selected' : ''}}>Manager</option>
										<option value="2" {{(2==$data->level) ? 'selected' : ''}}>Coordinator</option>
										<option value="3" {{(3==$data->level) ? 'selected' : ''}}>Supervisor</option>
									
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
			</div>
		</div>
	</div>




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
<style type="text/css">
	.avatar {
position: relative;
display: inline-block;
width: 3rem;
height: 3rem;
font-size: 1.25rem;
}

.avatar-img,
.avatar-initials,
.avatar-placeholder {
width: 100%;
height: 100%;
border-radius: inherit;
}

.avatar-img {
display: block;
-o-object-fit: cover;
object-fit: cover;
}

.avatar-initials {
position: absolute;
top: 0;
left: 0;
display: -ms-flexbox;
display: flex;
-ms-flex-align: center;
align-items: center;
-ms-flex-pack: center;
justify-content: center;
color: #fff;
line-height: 0;
background-color: #a0aec0;
}

.avatar-placeholder {
position: absolute;
top: 0;
left: 0;
background: #a0aec0
url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e")
no-repeat center/1.75rem;
}

.avatar-indicator {
position: absolute;
right: 0;
bottom: 0;
width: 20%;
height: 20%;
display: block;
background-color: #a0aec0;
border-radius: 50%;
}

.avatar-group {
display: -ms-inline-flexbox;
display: inline-flex;
}

.avatar-group .avatar + .avatar {
margin-left: -0.75rem;
}

.avatar-group .avatar:hover {
z-index: 1;
}

.avatar-sm,
.avatar-group-sm > .avatar {
width: 2.125rem;
height: 2.125rem;
font-size: 1rem;
}

.avatar-sm .avatar-placeholder,
.avatar-group-sm > .avatar .avatar-placeholder {
background-size: 1.25rem;
}

.avatar-group-sm > .avatar + .avatar {
margin-left: -0.53125rem;
}

.avatar-lg,
.avatar-group-lg > .avatar {
width: 4rem;
height: 4rem;
font-size: 1.5rem;
}

.avatar-lg .avatar-placeholder,
.avatar-group-lg > .avatar .avatar-placeholder {
background-size: 2.25rem;
}

.avatar-group-lg > .avatar + .avatar {
margin-left: -1rem;
}

.avatar-light .avatar-indicator {
box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
}

.avatar-group-light > .avatar {
box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
}

.avatar-dark .avatar-indicator {
box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
}

.avatar-group-dark > .avatar {
box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
}

/* Font not working in <textarea> for this version of bs */

textarea {
font-family: inherit;
}
</style>