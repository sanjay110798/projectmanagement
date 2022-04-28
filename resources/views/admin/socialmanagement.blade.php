 @extends('layouts.admin.admin_layout')

@section('body-content')
<!-- <link rel="stylesheet" href="{{asset('assets/social/css/bootstrap.min.css')}}" /> -->
<link rel="stylesheet" href="{{asset('assets/social/css/style.css')}}" />
<!-- <link rel="stylesheet" href="{{asset('assets/social/css/ionicons.min.css')}}" /> -->
<link rel="stylesheet" href="{{asset('assets/social/css/font-awesome.min.css')}}" />
<link href="css/emoji.css" rel="stylesheet">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Your Post</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if($Appservice->checkAddaccess('social.management')==true){?>
          <div class="col-md-12 text-right mb-3"><a href="{{route('add.social')}}" class="btn btn-primary">Add</a></div>
          <?php } ?>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                <?php 
                foreach ($post as $value) {
                ?>
              <div class="col-md-6">
                <div class="post-content" style="height: 464px;">
                @if($value->image!='')
                <a href="{{asset('upload/post/'.$value->image)}}">
                 @php $ext = substr($value->image, strrpos($value->image, '.') + 1); @endphp
                    @if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
                          <img src="{{asset('upload/task/'.$value->image)}}" alt="post-image" class="img-responsive post-image" style="height: 338px;" />
                    @else
                          <i class="fas fa-file-alt" style="font-size: 66px;display: block;"></i>
                          
                    @endif
                  

                </a>
                @endif
               
                <div class="post-container">
                  <?php if(Auth::user()->image==''){?>
                  <img src="{{asset('assets/social/images/users/user-5.jpg')}}" alt="user" class="profile-photo-md pull-left" />
                  <?php }else{?>
                  <img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="profile-photo-md pull-left" />
                  <?php } ?>
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="" class="profile-link">{!!substr($value->description,0,10)!!}..</a> <span class="following"></span></h5>
                      <p class="text-muted">Update For {{$value->priority}}</p>
                      <p class="text-muted">Published {{$value->updated_at}}</p>

                    </div>
                    <div class="reaction">
                      
                      <?php if($Appservice->checkEditaccess('social.management')==true){ if($value->user_id==Auth::id() || Auth::user()->role_id=='10' || Auth::user()->role_id=='1'){?>
                      <a class="btn text-green" href="{{route('edit.social',['id'=>$value->id])}}"><i class="fa fa-pencil-square-o"></i></a>
                      <a class="btn text-red deleteBtn" href="#" data-url="{{route('delete.social',['id'=>$value->id])}}" ><i class="fa fa-trash-o"></i></a><?php } } ?>
                    </div>
                    <div class="line-divider"></div>
                  </div>
                </div>
                </div>
                </div>


               <?php } ?>
              </div>
           
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection