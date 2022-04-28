<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
	<meta name="robots" content="index, follow" />
	<title>Project Manager</title>
	<link rel="stylesheet" href="{{asset('assets/social/css/ionicons.min.css')}}" />
	<!-- Roboto Font Link -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700" rel="stylesheet"> 
	<!-- slick css  -->
	<link href="{{asset('assets/css/slick.css')}}" rel="stylesheet" type="text/css" />
	<!-- bootstrap min Css -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Jquery Min Js -->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<!-- Style Css -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Jquery Min Js -->
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<!-- slick js  -->
	<script src="{{asset('assets/js/slick.js')}}"></script>
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/social/images/fav.png')}}"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<style type="text/css">
		#loading {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			display: none;
			background: #fff0f163;
		}
		#loading img{
			position: absolute;
			width: 151px;
			height: 151px;
			margin: 226px 208px 30px 600px;
		}
	</style>
	<div id="loading">
		<img src="https://cms.primacyinfotech.com/monitor_webapp/assets/ajaxloder/loader.gif" width="90" height="90"/>
	</div>
	<div class="dashboard_wrapp">
		<nav class="navbar navbar-expand-sm navbar-light bg-light header">
			<a class="navbar-brand logo" href="{{route('home')}}">
				Project Manager
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse right_sec" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown m_notifications">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
							<span class="n_count">&nbsp;</span>
							<i class="fa fa-bell faa-ring animated" aria-hidden="true">&nbsp;</i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
							<ul class="notifications_list">
								<li>
									<a href="#">
										<div class="user_photo">
											@if(!Auth::user() || Auth::user()->image=='')
											<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
											@else
											<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user"/>
											@endif
										</div>
										<div class="text_content">
											<h4 class="name">Pritam Roy</h4>
											<h5 class="project">Shared 3 Drawing files for project<span>Shared 4 project pics</span></h5>
											<p class="hrs">2 hrs ago</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a href="{{route('home')}}" >Home</a>
					</li>
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown user_sec">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
							<div class="user_photo">
								@if(!Auth::user() || Auth::user()->image=='')
								<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
								@else
								<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user"/>
								@endif
							</div>
							<span>{{ Auth::user()->name }}</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item application_it" href="{{route('dashboard')}}">
								<div class="icon">
									<img src="{{asset('assets/images/setting_icon.png')}}" alt="Project">
								</div>
								Dashboard
							</a>
							<a class="dropdown-item application_it" href="{{route('profile')}}">
								<div class="icon">
									<img src="{{asset('assets/images/setting_icon.png')}}" alt="Project">
								</div>
								Profile
							</a>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<div class="icon">
									<img src="{{asset('assets/images/logoout_icon.png')}}" alt="Project">
								</div>
								Log out
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</nav>

		<div class="container-fluid dashboard_contain">
			@include('layouts.front.left-sidebar')
			@yield('body-content')
			@include('layouts.front.right-sidebar')
		</div>
	</div>

	<!-- /////////////////////////// -->
      <!-- Footer
      	================================================= -->
      	<footer id="footer">
      		<div class="container">
      		</div>
      		<div class="copyright">
      			<p>Copyright © <?=date('Y')?>. All rights reserved.</p>
      		</div>
      	</footer>

      	<!--preloader-->
      	<div id="spinner-wrapper">
      		<div class="spinner"></div>
      	</div>


    <!-- Scripts
    	================================================= -->

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    	<script src="{{asset('assets/social/js/jquery-3.1.1.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/bootstrap.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/jquery.sticky-kit.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/jquery.scrollbar.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/script.js')}}"></script>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
    	function encodeImgtoBase64(element) {
    		var el = document.getElementById("imgg");
    		var img = element.files[0];

    		var reader = new FileReader();

    		reader.onloadend = function() {
    			el.value = reader.result;
    		}
    		reader.readAsDataURL(img);
    	}
    </script>
    <script>
    	$("#single").select2({
    		placeholder: "Select",
    		allowClear: true
    	});
    	$("#multiple").select2({
    		placeholder: "Select",
    		allowClear: true
    	});
    </script>
    <script>
    	$(document).ready(function () {
    		$(document).ajaxStart(function(){
	  // Show image container
	  $("#loading").show();
	});
    		$(document).ajaxComplete(function(){
	  // Hide image container
	  $("#loading").hide();
	});

    	});

    	$('.cphoto').click(function(){
    		var id=$(this).data('id');
    		$('#cimg').click();
    	});
    	$('select[name="project"]').change(function(){
    		$.ajax({
    			url: "{{route('get.project.member')}}",
    			type: 'post',
    			data: {
    				val:$(this).val(),
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$('select[name="post_for"]').html(data);
    			}
    		});
    	});
    	$('#prio').click(function(){
    		if($('input[name="priority"]').is(':checked')){
    			$('input[name="priority"]').prop('checked',false);
    			$(this).css('background','#cdcdcd');
    		} else {
    			$('input[name="priority"]').prop('checked',true);
    			$(this).css('background','#6d1715');
    		}
    	});

    	$('.btn_comment').click(function(){
    		var id=$(this).attr('id');
    		var table=$(this).data('table');
    		$('#show_comment'+id).toggle();
    		$.ajax({
    			url: "{{route('see.comment')}}",
    			type: 'post',
    			data: {
    				id:id,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$('#append_'+id).html(data);
    			}
    		});

    	});
   async function sendComments(elem){
        var id=$(elem).attr('id');
        var table=$(elem).data('table');
        var text=$('#comm_'+id).val();
        var post=$('#post_'+id).val();
        $("#cform_"+id).one('submit',function (event) {
            event.preventDefault();
             var formData = new FormData(this);
             formData.append('image', $('input[name=comnt_img]')[0].files[0]); 
            console.log(formData);
            if(formData){
                $.ajax({
            		url: "{{route('post.comment')}}",
            		type: "POST",
            		contentType: false,
                    processData: false,
                    cache: false,
            		data: formData,
            		success: function(data)
            		{
            			$('#comm_'+id).val('');
            			$('#imgg').val('');
            			console.log(data);
            			/*$.ajax({
            				url: "{{route('see.comment')}}",
            				type: 'post',
            				data: {
            					id:id,table:table,
            					_token: '{{csrf_token()}}',
            				},
            				success: function(data) {
            					$('#append_'+id).html(data);
            				}
            			});*/
            		},
            		error: function(e) 
            		{
            			$("#err_"+id).html(e).fadeIn();
            		}          
            	});
            }
        });
         
   } 	
   /*$('.sendcomment').click(function(e){
    		var id=$(this).attr('id');
    		var table=$(this).data('table');
    		var text=$('#comm_'+id).val();
    		var post=$('#post_'+id).val();
    		var img=$('#imgg').val();

    	 var formData = new FormData($("#cform_"+id));
    	//var data = $("#cform_"+id).serializeArray();
    	// alert(formData);
    	 e.preventDefault();
    	 console.log(formData);
    	/*$.ajax({
    		url: "{{route('post.comment')}}",
    		type: "POST",
    		data: {img:img,post:post,table:table,text:text,_token:'{{csrf_token()}}'},
    		success: function(data)
    		{
    			$('#comm_'+id).val('');
    			$('#imgg').val('');
    			$.ajax({
    				url: "{{route('see.comment')}}",
    				type: 'post',
    				data: {
    					id:id,table:table,
    					_token: '{{csrf_token()}}',
    				},
    				success: function(data) {
    					$('#append_'+id).html(data);
    				}
    			});
    		},
    		error: function(e) 
    		{
    			$("#err_"+id).html(e).fadeIn();
    		}          
    	});
   

});*/
   
    
    
    	$('body').on('click','.deleteCom',function(){
    		var id=$(this).data('id');
    		var table=$(this).data('table');
    		var post=$(this).data('postid');

    		$.ajax({
    			url: "{{route('delete.comment')}}",
    			type: 'post',
    			enctype: 'multipart/form-data',
    			data: {
    				id:id,post:post,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$.ajax({
    					url: "{{route('see.comment')}}",
    					type: 'post',
    					data: {
    						id:post,table:table,
    						_token: '{{csrf_token()}}',
    					},
    					success: function(data) {
    						$('#append_'+post).html(data);
    					}
    				});
    			}
    		});


    	});
    </script>
    <script type="text/javascript">
    	
		$(document).ready(function () {
			//$('#cimg').on('change',function(){ 
			//$("#cform").submit();
			// $("#cform").on('submit',(function(e) {
			//   e.preventDefault();
			//   $.ajax({
			//    url: "{{route('ajaxuploadimg')}}",
			//    type: "POST",
			//    data:  new FormData(this),
			//    contentType: false,
			//    cache: false,
			//    processData:false,
			//    beforeSend : function()
			//    {
			//    },
			//    success: function(data)
			//    {
			//      $('#imgg').val(data);
			//    },
			//     error: function() 
			//    {
			    
			//    }          
			//     });
			//  }));

			//});
			
			$('')
			});
    </script>
    @if(Session::has('error'))
    <script>
    	swal({
    		title: "Error",
    		text: "{{Session::get('error')}}",
    		icon: "error",
    		button: "Ok",
    	});
    </script>
    @endif
    @if(Session::has('success'))
    <script>
    	swal({
    		title: "Success",
    		text: "{{Session::get('success')}}",
    		icon: "success",
    		button: "Ok",
    	});
    </script>
    @endif
    <script>
    	function readURL(input) {
    		if (input.files && input.files[0]) {
    			var reader = new FileReader();
    			reader.onload = function(e) {
    				$('#imagePreview').css('background-image', 'url('+e.target.result +')');
    				$('#imagePreview').hide();
    				$('#imagePreview').fadeIn(650);
    			}
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
    	$("#imageUpload").change(function() {
    		readURL(this);
    	});

    	$(document).ready(function(){
    		$('#imageType').on('click',function(){
    			$("#image").click();
    			("#imgtype"). attr('checked', true);
    			("#vidtype"). attr('checked', false);
    		});

    		$('#videoType').on('click',function(){
    			$("#image").click();
    			("#vidtype"). attr('checked', true);
    			("#imgtype"). attr('checked', false);
    		});

    		$('#wall').on('change',function(){
    			var val=$(this).val();
    			$.ajax({
    				url: "{{route('get.walllist')}}",
    				type: 'post',
    				data: {
    					val:val,
    					_token: '{{csrf_token()}}',
    				},
    				success: function(data) {
    					$('#show_wall').html(data);
    				}
    			});
    		});
    		$('#all_project').on('click',function(){
    			alert('hii');
    			$(".project").attr('checked', this.checked);
    		});
    	});
    </script>
    @yield('js-content')
    </html>
    <style type="text/css">
    	.reply-cls{
    		font-size: 12px;
    		font-weight: 900;
    		color: #6d1715;
    		cursor: pointer;
    	}
    </style>