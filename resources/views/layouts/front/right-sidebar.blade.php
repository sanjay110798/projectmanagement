<!-- Right Side Sec -->
<div class="sidebar right_sec navbar-collapse right_sec" id="navbarSupportedContent3">
	<div class="sidebar_block">
		<div class="sidebar_title position-relative">
			<h4 class="notifications_title  sidebar_title "><i class="fa fa-bell faa-ring animated" aria-hidden="true">&nbsp;</i> Notifications</h4>
		    <a href="#" class="d-inline-block d-sm-none ssd"><i class="fa fa-times"></i></a>
			<div id="notifilist">
			<ul class="notifications_list">
				@php 
				$noti = $Appservice->get_notification(); 
				@endphp
				@foreach($noti as $k=>$v)
				<li class='seenoti {{($v->is_see=="n") ? "not_red" : ""}}' data-id="{{$v->id}}">
					@if($v->tbl_name=='Group')
					<a href="{{route('group.details',['id'=>$v->post_id])}}">
					@elseif($v->tbl_name=='Project')
					<a href="{{route('project.view',['id'=>$v->post_id])}}">
					@elseif($v->tbl_name=='Comment')
					<a href="{{route('get.reply',['id'=>$v->post_id])}}">
                    @else
                    <a href="{{route('show.post',['tbl'=>$v->tbl_name,'id'=>$v->post_id])}}" >
					@endif
					
						<div class="user_photo">
							@if(empty($v->user) && !isset($v->user->image))
							<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
							@elseif($v->user->image=='')
                            <img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
							@else
							<img src="{{asset('upload/profile/'.$v->user->image)}}" alt="user"/>
							@endif
						</div>
						<div class="text_content">
							<h4 class="name">{{($v->user) ? $v->user->name : ''}}</h4>
							<h5 class="project">{!! $v->details !!}...</h5>
							<p class="hrs">{{date('d-m-Y',strtotime($v->created_at))}} @ {{date('h:i a',strtotime($v->created_at))}}</p>
						</div>
					</a>
				</li>
				@endforeach
			</ul>
		   </div>
		</div>	
	</div>	
</div>
<!-- Right Side Sec -->