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
	
	<!-- Style Css -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
		
	<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/social/images/fav.png')}}"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css"
      integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />


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
    width: 373px;
    height: 172px;
    margin: 221px 212px 28px 525px;
		}
.not_red{
	background: antiquewhite;
}
	</style>
	<div id="loading">
		<img src="{{asset('loader-products.gif')}}" width="90" height="90"/>
	</div>
	<div class="dashboard_wrapp">
		
		<nav class="navbar navbar-expand-sm navbar-light bg-light header">
			<a class="navbar-brand logo d-none d-sm-block" href="{{route('home')}}">
			 <img src="{{asset('upload/general/'.$Appservice->getsetting('site_logo'))}}" style="">
			</a>
			

			<div class="collapse navbar-collapse right_sec" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown sec123" style="display: inline-block;">
					<button class="navbar-toggler leftSecBtn" type="button" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					
					</li>
					<li class="nav-item dropdown" style="display: inline-block;margin: 0px 0px 0px 5px;">
					<a class="d-block d-sm-none" href="{{route('home')}}" style="color: #8b1513;font-size: 13px;
    padding: 6px 0 0 0;">
					<img src="{{asset('upload/general/'.$Appservice->getsetting('site_logo'))}}" style="width: 100px;">
					</a>
					</li>
					<li class="nav-item dropdown sec1234" style="display: inline-block;">
					<div class="ss navbar-toggler"><i class="fa fa-bell faa-ring animated rightSecBtn" aria-hidden="true"></i></div>
					
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
					<li class="nav-item dropdown user_sec user_sec22">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
							<div class="user_photo d-none d-sm-block">
								@if(!Auth::user() || Auth::user()->image=='')
								<img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
								@else
								<img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user"/>
								@endif
							</div>
							<div class="d-block d-sm-none sd"><i class="fa fa-user" style="font-size: 23px;"></i></div>
							<span class="d-none d-sm-block">{{ Auth::user()->name }}</span>
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


		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<!-- Jquery Min Js -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> 
    	<script src="{{asset('assets/social/js/jquery.sticky-kit.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/jquery.scrollbar.min.js')}}"></script>
    	<script src="{{asset('assets/social/js/script.js')}}"></script>
    </body>
    
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

        $('.rightSecBtn').click(function(){
           $('#navbarSupportedContent3').toggle({ direction: "right" }, 1000);
           // $('#navbarSupportedContent2').toggle();
        });
         $('.ssd').click(function(){
           $('#navbarSupportedContent3').toggle();
           // $('#navbarSupportedContent2').toggle();
        });
        $('.leftSecBtn').click(function(){
           $('#navbarSupportedContent2').toggle({ direction: "left" }, 1000);
           // $('#navbarSupportedContent3').toggle();
        });
        $('.sssd').click(function(){
           $('#navbarSupportedContent2').toggle();
           // $('#navbarSupportedContent3').toggle();
        });
    	$('.cphoto').click(function(){
    		var id=$(this).data('id');
    		$('#cimg_'+id).click();
    	});
    	// ///////////////
    	$('.social_cphoto').click(function(){
    		var id=$(this).data('id');
    		$('#social_cimg_'+id).click();
    	});
    	//////////////////
    	$('.group_cphoto').click(function(){
    		var id=$(this).data('id');
    		$('#group_cimg_'+id).click();
    	});
    	//////////////
    	$('.project_cphoto').click(function(){
    		var id=$(this).data('id');
    		$('#project_cimg_'+id).click();
    	});
    	////////////
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
    		$("#loading").show();
    		$.ajax({
    			url: "{{route('see.comment')}}",
    			type: 'post',
    			data: {
    				id:id,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$("#loading").hide();
    				$('#append_'+id).html(data);
					setTimeout(function() {
					 $('textarea#comm_'+id).focus();
					}, 100);
    			}
    		});

    	});
    	//////////////////////////
    	$('.social_btn_comment').click(function(){
    		var id=$(this).attr('id');
    		var table=$(this).data('table');
    		$('#social_show_comment'+id).toggle();
    		$("#loading").show();
    		$.ajax({
    			url: "{{route('see.comment')}}",
    			type: 'post',
    			data: {
    				id:id,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$("#loading").hide();
    				$('#social_append_'+id).html(data);
    			}
    		});

    	});
    	/////////////////////////
    	$('.group_btn_comment').click(function(){
    		var id=$(this).attr('id');
    		var table=$(this).data('table');
    		$('#group_show_comment'+id).toggle();
    		$("#loading").show();
    		$.ajax({
    			url: "{{route('see.comment')}}",
    			type: 'post',
    			data: {
    				id:id,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$("#loading").hide();
    				$('#group_append_'+id).html(data);
    			}
    		});

    	});
    	//////////////////////////////////
    	$('.project_btn_comment').click(function(){
    		var id=$(this).attr('id');
    		var table=$(this).data('table');
    		$('#project_show_comment'+id).toggle();
    		$("#loading").show();
    		$.ajax({
    			url: "{{route('see.comment')}}",
    			type: 'post',
    			data: {
    				id:id,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$("#loading").hide();
    				$('#project_append_'+id).html(data);
    			}
    		});

    	});
    	//////////////////////////
   async function sendComments(elem){
        var id=$(elem).attr('id');
        var table=$(elem).data('table');
        var text=$('#comm_'+id).val();
        var post=$('#post_'+id).val();
        $("#cform_"+id).one('submit',function (event) {
            event.preventDefault();
             var formData = new FormData(this);
   //           var totalfiles = document.querySelector("form[name='second'] input[name='comnt_img[]']").files.length;
			// for (var index = 0; index < totalfiles; index++) {
			// formData.append('image[]', document.querySelector("form[name='second'] input[name='comnt_img[]']").files[index]);
			// }
           formData.append('image[]', $('input[name=comnt_img]')[0].files[0]); 
            console.log(formData);
            if(formData){
            	$("#loading").show();
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
            			$("#loading").hide();
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
            }
        });
         
   } 	
   /////////////////////////////////
   async function social_sendComments(elem){
        var id=$(elem).attr('id');
        var table=$(elem).data('table');
        var text=$('#social_comm_'+id).val();
        var post=$(elem).attr('id');
        $("#social_cform_"+id).one('submit',function (event) {
            event.preventDefault();
             var formData = new FormData(this);
             formData.append('image[]', $('input[name=comnt_img]')[0].files[0]); 
            console.log(formData);
            if(formData){
            	$("#loading").show();
                $.ajax({
            		url: "{{route('post.comment')}}",
            		type: "POST",
            		contentType: false,
                    processData: false,
                    cache: false,
            		data: formData,
            		success: function(data)
            		{
            			$('#social_comm_'+id).val('');
            			$('#imgg').val('');
            			console.log(data);
            			$("#loading").hide();
            			$.ajax({
            				url: "{{route('see.comment')}}",
            				type: 'post',
            				data: {
            					id:id,table:table,
            					_token: '{{csrf_token()}}',
            				},
            				success: function(data) {
            					$('#social_append_'+id).html(data);
            				}
            			});
            		},
            		error: function(e) 
            		{
            			$("#err_"+id).html(e).fadeIn();
            		}          
            	});
            }
        });
         
   } 	
   ///////////////////
   async function peoject_sendComments(elem){
        var id=$(elem).attr('id');
        var table=$(elem).data('table');
        var text=$('#project_comm_'+id).val();
        var post=$(elem).attr('id');
        $("#project_cform_"+id).one('submit',function (event) {
            event.preventDefault();
             var formData = new FormData(this);
             formData.append('image[]', $('input[name=comnt_img]')[0].files[0]); 
            console.log(formData);
            if(formData){
            	$("#loading").show();
                $.ajax({
            		url: "{{route('post.comment')}}",
            		type: "POST",
            		contentType: false,
                    processData: false,
                    cache: false,
            		data: formData,
            		success: function(data)
            		{
            			$('#project_comm_'+id).val('');
            			$('#imgg').val('');
            			console.log(data);
            			$("#loading").hide();
            			$.ajax({
            				url: "{{route('see.comment')}}",
            				type: 'post',
            				data: {
            					id:id,table:table,
            					_token: '{{csrf_token()}}',
            				},
            				success: function(data) {
            					$('#project_append_'+id).html(data);
            				}
            			});
            		},
            		error: function(e) 
            		{
            			$("#err_"+id).html(e).fadeIn();
            		}          
            	});
            }
        });
         
   } 	
   /////////////////////
   async function group_sendComments(elem){
        var id=$(elem).attr('id');
        var table=$(elem).data('table');
        var text=$('#group_comm_'+id).val();
        var post=$(elem).attr('id');
        $("#group_cform_"+id).one('submit',function (event) {
            event.preventDefault();
             var formData = new FormData(this);
             formData.append('image[]', $('input[name=comnt_img]')[0].files[0]); 
            console.log(formData);
            if(formData){
            	$("#loading").show();
                $.ajax({
            		url: "{{route('post.comment')}}",
            		type: "POST",
            		contentType: false,
                    processData: false,
                    cache: false,
            		data: formData,
            		success: function(data)
            		{
            			$('#group_comm_'+id).val('');
            			$('#imgg').val('');
            			console.log(data);
            			$("#loading").hide();
            			$.ajax({
            				url: "{{route('see.comment')}}",
            				type: 'post',
            				data: {
            					id:id,table:table,
            					_token: '{{csrf_token()}}',
            				},
            				success: function(data) {
            					$('#group_append_'+id).html(data);
            				}
            			});
            		},
            		error: function(e) 
            		{
            			$("#err_"+id).html(e).fadeIn();
            		}          
            	});
            }
        });
         
   } 	
   //////////////////////////////////
    
    	$('body').on('click','.deleteCom',function(){
    		var id=$(this).data('id');
    		var table=$(this).data('table');
    		var post=$(this).data('postid');
            $("#loading").show();
    		$.ajax({
    			url: "{{route('delete.comment')}}",
    			type: 'post',
    			enctype: 'multipart/form-data',
    			data: {
    				id:id,post:post,table:table,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    				$("#loading").hide();
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

    	$('body').on('click','.seenoti',function(){
    		var id=$(this).data('id');
    		$.ajax({
    			url: "{{route('read.notify')}}",
    			type: 'post',
    			enctype: 'multipart/form-data',
    			data: {
    				id:id,
    				_token: '{{csrf_token()}}',
    			},
    			success: function(data) {
    			}
    		});


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

    	 setTimeout( function(){	
			$.ajax({
    				url: "{{route('admin.fetch.notification')}}",
    				type: 'get',
    				dataType:'html',
    				success: function(data) {
    					console.log(data);
    					$('#notifilist').html(data);
    				}
    		});
		}, 30000);
    	});
	jQuery.noConflict();	
   jQuery(document).ready(function(){
	jQuery('[data-toggle="tooltip"]').tooltip();
	});
    </script>

    @yield('js-content')
    </html>
    <style type="text/css">
		.tooltip:before {
		content: attr(data-text); /* here's the magic */
		position:absolute;

		/* vertically center */
		top:50%;
		transform:translateY(-50%);

		/* move to right */
		left:100%;
		margin-left:15px; /* and add a small left margin */

		/* basic styles */
		width:200px;
		padding:10px;
		border-radius:10px;
		background:#000;
		color: #fff;
		text-align:center;

		display:none; /* hide by default */
		}
    	.block_sec{
    		box-shadow: none!important;
    	}
		.dashboard_contain .middle_content .accordion.block_accordion .card.block_sec .btn-block .text_content {
		flex: 0 1 90%;
		width: 90%;
		}
		.header .right_sec ul.navbar-nav {
		display: inline!important;
		}
    	.reply-cls{
    		font-size: 12px;
    		font-weight: 900;
    		color: #6d1715;
    		cursor: pointer;
    	}
    	@media only screen and (max-width: 992px){
			.dashboard_contain .middle_content .tab_btn_sec li a span {
			 display: block; 
			}
			.sec123{
				/*width: 60px;*/
			}
			.sec1234{
				width: 60px;
			}
			.leftSecBtn{
				font-size: 14px;
			}
    	}
    	@media only screen and (max-width: 992px)
    	{
			.dashboard_contain .middle_content .tab_btn_sec {
			margin-bottom: 0;
			position: relative;
             bottom: 11px; 
			
			}
			.dashboard_contain .middle_content .tab_btn_sec li {
			width: 100%;
			}
			.header .right_sec ul.navbar-nav {
			display: inline!important;
			width: 60%;
			}
			.user_sec22{
				width: 150px;
                display: inline-block;
			}
			.sec1234{
				    display: inline-block;
			}
			.sec1234 button{
				display: block!important;
			}
			.sidebar.right_sec{
				position: absolute;
				top: 0;
				right:2px;
				/* display: block; */
				width: 258px;
				z-index: 10;
				min-height: 100%;
				overflow-y: scroll;
			}
    	}
		@media only screen and (max-width: 767px)
		{
			.user_sec22{
				display: inline-block;
				width: 150px;
			}
			.dashboard_wrapp button.navbar-toggler {
			 display: block!important; 
			}
			.sidebar.left_sec{
				position: absolute;
				top: 0px;
				left: 0px;
				/*display: block;*/
				width: 280px;
				z-index: 10;
				height: 100%;
                background: #fff;
			}

		}
		@media only screen and (max-width: 575px)
		{
			.sec123{
				/*width: 36%;*/
			}
			.sec1234 {
			width: 8%;
			margin: 0px 0 0 98px;
			}
			.user_sec22 {
			display: inline-block;
			width: auto;
			float: right;
			}
			.sidebar .sidebar_title {
			background: #6d1715;
			color: #fff;
			font-size: 16px;
			padding: 0;
			max-height: 100vh;
			overflow-y: auto;
			}
		}
		@media only screen and (max-width: 411px)
		{
			.sec1234 {
			width: 8%;
			    margin: 0px 0px -6px 95px;
			}
		}
    .ss{
    width: 27px;
    height: 27px;
    background: #8b1614;
    border-radius: 17px;
    position: relative;
    }

   .ss i{
   	color: #fff;
   	top: 5px;
    right: 5px;
    position: absolute;
        font-size: 16px;
   }

.header .right_sec .user_sec .dropdown-menu {
    left: -199px;
}
.ssd{
	display: inline-block;
    position: absolute;
    top: 14px;
    right: 9px;
    color: #fff;
}
.sssd{
	   position: absolute;
    right: -34px;
    top: 1px;
    background: #6d1715;
    color: #fff;
    width: 43px;
    text-align: center;
    height: 50px;
    margin: 0px -4px 0px 0px;
    z-index: 1;
}
	.sssd i{
	margin: 15px auto;
	font-size: 21px;
	}
	.btn2{
		border-color: #029ec117!important;
	}
	.text_content span{
		cursor: text!important;
	}
	.lightbox{
		top: 46px!important;
    left: 0px!important;
    position: fixed;
	}
	
	.lb-image{
		width: 825px!important;
    height: 519px!important;
	}
	.dashboard_contain .middle_content .accordion.block_accordion .card.block_sec .btn-block .user_title .arrow_btn {
    background: #00ffe7bf!important;
    width: 28px!important;
    height: 38px!important;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px;
    flex: 0 0 38px!important;
}
.fa.fa-paperclip
{
	    font-size: 21px!important;
    color: #3e1d74!important;
}
.member-list{
	    font-size: 15px;
    color: #6d1715;
    display: inline-block;
    float: right;
    top: 0px;
    right: 0;
    position: absolute;
    font-weight: 900;
    cursor: pointer;
}
.bx .user_title .user_details .user_photo img {
    width: 40px;
    object-fit: cover;
    height: 40px;
}
.bx .user_title .user_details .user_photo {
    width: 40px;
    height: 40px;
    flex: 0 0 40px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
    border: 2px solid #fff;
}
.bx .user_title .user_details {
        display: flex;
    /* padding: 15px; */
    line-height: 0;
}
.bx .user_title .text_content {
    padding: 0;
    height: 40px;
}
.bx{
    padding: 7px 4px 7px 4px;
    /* background: aliceblue; */
    -webkit-box-shadow: 3px 2px 4px 3px rgba(0,0,0,0.11);
	-moz-box-shadow: 3px 2px 4px 3px rgba(0,0,0,0.11);
	box-shadow: 3px 2px 4px 3px rgba(0,0,0,0.11);
}

[tooltip] {
  position: relative; /* opinion 1 */
  z-index: 999;
}

/* Applies to all tooltips */
[tooltip]::before,
[tooltip]::after {
  text-transform: none; /* opinion 2 */
  font-size: .9em; /* opinion 3 */
  line-height: 1;
  user-select: none;
  pointer-events: none;
  position: absolute;
  display: none;
  opacity: 0;
}
[tooltip]::before {
  content: '';
  border: 5px solid transparent; /* opinion 4 */
  z-index: 1001; /* absurdity 1 */
}
[tooltip]::after {
  content: attr(tooltip); /* magic! */
  
  /* most of the rest of this is opinion */
  font-family: Helvetica, sans-serif;
  text-align: center;
  
  /* 
    Let the content set the size of the tooltips 
    but this will also keep them from being obnoxious
    */
  min-width: 3em;
  max-width: 21em;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  padding: 1ch 1.5ch;
  border-radius: .3ch;
  box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
  background: #333;
  color: #fff;
  z-index: 1000; /* absurdity 2 */
  width: 23em;
}

/* Make the tooltips respond to hover */
[tooltip]:hover::before,
[tooltip]:hover::after {
  display: block;
}

/* don't show empty tooltips */
[tooltip='']::before,
[tooltip='']::after {
  display: none !important;
}

/* FLOW: UP */
[tooltip]:not([flow])::before,
[tooltip][flow^="up"]::before {
  bottom: 100%;
  border-bottom-width: 0;
  border-top-color: #333;
}
[tooltip]:not([flow])::after,
[tooltip][flow^="up"]::after {
  bottom: calc(100% + 5px);
}
[tooltip]:not([flow])::before,
[tooltip][flow^="up"]::before,
[tooltip][flow^="up"]::after {
  left: 50%;
  transform: translate(-50%, -.5em);
}

[tooltip]:not([flow])::after,
[tooltip][flow^="up"]::before,
[tooltip][flow^="up"]::after {
	left: 138px;
	transform: translate(-50%, -0.5em);
	position: absolute;
	right: 0;
}
/* FLOW: DOWN */
[tooltip][flow^="down"]::before {
  top: 100%;
  border-top-width: 0;
  border-bottom-color: #333;
}
[tooltip][flow^="down"]::after {
  top: calc(100% + 5px);
}
[tooltip][flow^="down"]::before,
[tooltip][flow^="down"]::after {
  left: 50%;
  transform: translate(-50%, .5em);
}


/* FLOW: LEFT */
[tooltip][flow^="left"]::before {
  top: 50%;
  border-right-width: 0;
  border-left-color: #333;
  left: calc(0em - 5px);
  transform: translate(-.5em, -50%);
}
[tooltip][flow^="left"]::after {
  top: 50%;
  right: calc(100% + 5px);
  transform: translate(-.5em, -50%);
}

/* FLOW: RIGHT */
[tooltip][flow^="right"]::before {
  top: 50%;
  border-left-width: 0;
  border-right-color: #333;
  right: calc(0em - 5px);
  transform: translate(.5em, -50%);
}
[tooltip][flow^="right"]::after {
  top: 50%;
  left: calc(100% + 5px);
  transform: translate(.5em, -50%);
}

/* KEYFRAMES */
@keyframes tooltips-vert {
  to {
    opacity: .9;
    transform: translate(-50%, 0);
  }
}

@keyframes tooltips-horz {
  to {
    opacity: .9;
    transform: translate(0, -50%);
  }
}

/* FX All The Things */ 
[tooltip]:not([flow]):hover::before,
[tooltip]:not([flow]):hover::after,
[tooltip][flow^="up"]:hover::before,
[tooltip][flow^="up"]:hover::after,
[tooltip][flow^="down"]:hover::before,
[tooltip][flow^="down"]:hover::after {
  animation: tooltips-vert 300ms ease-out forwards;
}

[tooltip][flow^="left"]:hover::before,
[tooltip][flow^="left"]:hover::after,
[tooltip][flow^="right"]:hover::before,
[tooltip][flow^="right"]:hover::after {
  animation: tooltips-horz 300ms ease-out forwards;
}


</style>




