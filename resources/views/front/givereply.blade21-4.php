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

  </ul>
  <div class="tab-content">



    <!-- Post Update -->
    <div role="tabpanel" class="tab-pane fade active show" id="Videos">
      <div class="accordion block_accordion">
          
          <h5 style="color: #6d1715;
    font-weight: 600;
    text-shadow: -2px 4px 5px #7c7676ad;">{{$name}}</h5>
          <hr>

  </div>

      <!--  Accordion Block -->
      <div class="com_div" id="show_comment{{$comm->id}}">
        <div class="align-items-center justify-content-center">
          <div class="container" style="margin-top: 0px;">

            <div class="row justify-content-center bg-white mb-4">
              <div class="col-lg-12">
                <div class="accordion block_accordion" id="block_accordion_sec">
                  @foreach($task as $k=>$v)
                  <div class="card block_sec">
                    <div class="card-header" id="TaskHeadingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" >
                          <div class="user_title">
                            <div class="user_details">
                              <div class="user_photo">
                                @if(empty($v->user_details) && !isset($v->user_details->image))
                                <img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
                                @elseif($v->user_details->image=='')
                                <img src="{{asset('assets/social/images/users/user-1.jpg')}}" alt="user"/>
                                @else
                                <img src="{{asset('upload/profile/'.$v->user_details->image)}}" alt="user"/>
                                @endif
                              </div>
                              <div class="text_content">
                                <h4 class="name"><a href="{{route('user.post.details',['u_id'=>($v->user_details) ? base64_encode($v->user_details->id) : ''])}}">{{($v->user_details) ? $v->user_details->name : ''}}</a><span style="font-size: 13px;">Shared update for </span> <i class="fa fa-cog" aria-hidden="true"></i><a href="#">{{$v->priority}}</a></h4>
                                <h5 class="project"><span>@if($v->level=='2')
                          Manager
                          @elseif($v->level=='1')
                          Coordinator
                          @else
                          Supervisor
                          @endif</span>shared on {{date('d-m-Y',strtotime($v->updated_at))}} @ {{date('h:i a',strtotime($v->updated_at))}}</h5>
                                <br>
                                <span style="font-size: 19px;">{!! $v->description !!}</span>
                              </div>
                            </div>
                            @if($v->image != '')
                            <a class="arrow_btn" data-toggle="collapse" data-target="#Task{{$v->id}}" aria-expanded="false" aria-controls="Task{{$v->id}}" href="javaScript:void(0);">
                              <img src="{{asset('assets/images/down_arrow3.png')}}" alt="Arrow"/>
                            </a>
                            @endif
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
                              <a href="{{asset('upload/task').'/'.$val}}" data-toggle="lightbox" class="lightbox{{$v->id}}" data-id="{{$v->id}}" data-lightbox="models" data-gallery="gallery"><img src="{{asset('upload/task').'/'.$val}}"></a>
                            </li>
                            @else
                            <li class="gallery_photo" style="width: auto;">
                              <a  href="{{asset('upload/task').'/'.$val}}" target="_blank" data-toggle="lightbox" class="lightbox{{$v->id}}"  data-id="{{$v->id}}" data-gallery="gallery"><i class="fas fa-file-alt" style="font-size: 130px;"></i></a>
                            </li>
                            @endif
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                    @endif


                  </div>
                  @endforeach

                </div>
              </div>
              <div class="col-lg-12">
                <div class="comments" id="append_{{$comm->id}}">
                  <?php 
                  $user=App\User::where(['id'=>$comm->user_id])->first();
                  $getreply=App\Model\Comment::where(['parent_id'=>$comm->id])->orderBy('id','desc')->get();
                  ?>  
                  <div class="comment d-flex mb-4">
                    <div class="flex-shrink-0 mr-2">
                      <div class="avatar avatar-sm rounded-circle">
                        @if(empty($user->image) && !isset($user->image))
                        <img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user"/>
                        @elseif($user->image && $user->image=='')
                        <img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user" class="avatar-img"/>
                        @else
                        <img src="{{asset('/upload/profile/'.$user->image)}}" alt="user" class="avatar-img"/>

                        @endif
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-2 ms-sm-3">
                      <div class="comment-meta d-flex align-items-baseline">
                        <h6 class="me-2">{{$user->name}}</h6>
                        
                      </div>
                      <div class="comment-body">{{$comm->comment}}
                        @if($comm->img!='')
                        <a href="{{$comm->img}}"> 
                          @php $ext = substr($comm->img, strrpos($comm->img, '.') + 1); @endphp
                          @if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
                          <img src="{{$comm->img}}" style="width: 53px;display: block;">
                          @else
                          <i class="fas fa-file-alt" style="font-size: 66px;display: block;"></i>
                          
                          @endif
                        </a>
                        @endif
                      </div> 
                      <?php
                      if(count($getreply)>0){
                        ?>
                        <div class="comment-replies bg-light p-3 mt-3 rounded">
                          <h6 class="comment-replies-title mb-4 text-muted text-uppercase" style="font-size: 11px;">{{count($getreply)}} replies</h6>
                          <?php 
                          foreach($getreply as $repl){
                            $reuser=App\User::where(['id'=>$repl->user_id])->first();
                            ?>
                            <div class="reply d-flex mb-4">
                              <div class="flex-shrink-0 mr-2">
                                <div class="avatar avatar-sm rounded-circle">
                                @if(empty($reuser->image) && !isset($reuser->image))
                                <img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user"/>
                                @elseif($reuser->image && $reuser->image=='')
                                <img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user" class="avatar-img"/>
                                @else
                                <img src="{{asset('/upload/profile/'.$reuser->image)}}" alt="user" class="avatar-img"/>

                                @endif
                                </div>
                              </div>
                              <div class="flex-grow-1 ms-2 ms-sm-3">
                                <div class="reply-meta d-flex align-items-baseline">
                                  <h6 class="mb-0 me-2">{{$reuser->name}}</h6>&nbsp;&nbsp;
                                  @if($repl->user_id==Auth::id())
                                  <a href="{{route('delete.reply',['id'=>$repl->id])}}" style="color:red;"><i class="fa fa-trash-o"></i></a>
                                  @endif
                                </div>
                                <div class="reply-body">
                                  {{$repl->comment}}
                                  @if($repl->img!='')
                                  <a href="{{$repl->img}}">
                                    @php $ext = substr($repl->img, strrpos($repl->img, '.') + 1); @endphp
                                    @if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'png' || $ext == 'PNG')
                                    <img src="{{$repl->img}}" style="width: 53px;display: block;">
                                    @else
                                    <i class="fas fa-file-alt" style="font-size: 66px;display: block;"></i>

                                    @endif
                                  </a>
                                  @endif
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mb-3" style="background: #6d171512;">
              <div class="col-lg-12 mt-2">
                <div class="comment-form align-items-center">
                  <form method="post" action="{{route('give.reply')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-9">
                        <input type="hidden" name="parent_id" value="{{$comm->id}}">
                        <input type="hidden" name="post_id" value="{{$comm->post_id}}">
                        <input type="hidden" name="table" value="{{$comm->tbl_name}}">
                        <textarea class="form-control" rows="1" placeholder="Start Typing" name="reply" required></textarea>
                        <input type="file" name="img" id="cimg_{{$comm->id}}" style="opacity:0;">
                      </div>
                      <div class="col-md-3">
                        <a class="cphoto" data-id="{{$comm->id}}" href="#0"><img src="{{asset('assets/images/photo_icon.png')}}" alt="Image" style="width: 47px;" /></a>
                        <button type="submit " class="btn btn-primary">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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