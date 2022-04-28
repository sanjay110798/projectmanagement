<!-- Left Side Sec -->
<div class="sidebar left_sec navbar-collapse left_sec" id="navbarSupportedContent2">
	@php
		$project = $Appservice->project();
	@endphp
	<a href="#" class="d-inline-block d-sm-none sssd"><i class="fa fa-times"></i></a>
	<div class="accordion" id="accordionExample">
		<!-- Side Block -->
		<div class="card sidebar_block ">

			<div class="card-header sidebar_title" id="headingOne">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<div class="icon">
						<img src="{{asset('assets/images/side_task_icon.png')}}" alt="Task">
					</div>
					Task
				</button>
			</div>
			<div id="collapseOne" class="collapse {{(Request::segment(1)=='') ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionExample">
				<ul class="droupdown_sec">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="javaScript:void(0);">
							Personal Task
						</a>
						<!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<div class="dropdown_sec">
								<a class="dropdown-item" href="#">Task 1</a>
								<a class="dropdown-item" href="#">Task 2</a>
								<a class="dropdown-item" href="#">Task 3</a>
								<a class="dropdown-item" href="#">Task 4</a>
							</div>
						</div>-->
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="javaScript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
							 Project Task
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<div class="dropdown_sec">
								@foreach($project as $k=>$v)
								<a class="dropdown-item" href="{{route('home',$v->id)}}">{{$v->project_name}}</a>
								@endforeach
							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="javaScript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
							 Assigned Task
						</a>
						<!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<div class="dropdown_sec">
								<a class="dropdown-item" href="#">Assigned Task 1</a>
								<a class="dropdown-item" href="#">Assigned Task 2</a>
								<a class="dropdown-item" href="#">Assigned Task 3</a>
								<a class="dropdown-item" href="#">Assigned Task 4</a>
							</div>
						</div>-->
					</li>
				
				</ul>
			</div>
		</div>
		<!-- Side Block -->
		
		<!-- Side Block -->
		<div class="card sidebar_block">
			<div class="card-header sidebar_title" id="headingTwo">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<div class="icon">
						<img src="{{asset('assets/images/ongoing_project_icon.png')}}" alt="Project">
					</div>
					Ongoing Project
				</button>
			</div>
			<div id="collapseTwo" class="collapse {{(Request::segment(1)=='project') ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<ul class="droupdown_sec">
					@if(count($project)>0)
					@foreach($project as $k=>$v)
					@if($v->status!='Complete')
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="{{route('project.view',$v->id)}}" id="navbarDropdown_{{$v->id}}">
							<div class="icon bg">
								<img src="{{asset('assets/images/nav_building_icon.png')}}" alt="Task">
							</div>
							{{$v->project_name}}
						</a>
						
					</li>
					@endif
					@endforeach
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="" id="">
						<div class="icon bg">
							<img src="{{asset('assets/images/nav_building_icon.png')}}" alt="Task">
							
						</div>
						No Project Found!!
					</a>
					</li>
					@endif
				</ul>
			</div>
		</div>
		<!-- Side Block -->
		
		
		<!-- Side Block -->
		<div class="card sidebar_block">
			<div class="card-header sidebar_title" id="headingThree">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<div class="icon">
						<img src="{{asset('assets/images/official_group_icon.png')}}" alt="Task">
					</div>
					Official Group
				</button>
			</div>
			@php
			$group = $Appservice->get_group();
			@endphp
			<div id="collapseThree" class="collapse {{(Request::segment(1)=='group') ? 'show' : ''}}" aria-labelledby="headingThree" data-parent="#accordionExample">
				<ul class="droupdown_sec">
					@if(count($group)>0)
					@foreach($group as $k=>$v)
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="{{route('group.details',['id'=>$v->id])}}" id="navbarDropdown_{{($k+1)}}"aria-expanded="false">
							<div class="icon bg">
								<img src="{{asset('assets/images/nav_building_icon.png')}}" alt="Task">
							</div>
							{{$v->group_name}}
						</a>
					</li>
					@endforeach
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle sidebar_title" href="" id="">
						<div class="icon bg">
							<img src="{{asset('assets/images/nav_building_icon.png')}}" alt="Task">
							
						</div>
						No Group Found!!
					</a>
					</li>
					@endif

				</ul>
			</div>
		</div>
		<!-- Side Block -->
		
	</div>
	
</div>	
<!-- Left Side Sec -->