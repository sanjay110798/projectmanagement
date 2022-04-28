 @extends('layouts.admin.admin_layout')

@section('body-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if($Appservice->checkAddaccess('general.management')==true){?>
          <div class="col-md-12 text-right mb-3"><a href="{{route('add.general')}}" class="btn btn-primary">Add</a></div>
          <?php } ?>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body element2">
                <div class="col-md-12">
                  <form method="post" action="{{route('update.general')}}" enctype="multipart/form-data">
                    @csrf
                    
                   <div class="row mb-2">
                      <div class="col-md-4"><label>SITE TITLE</label></div>
                      <div class="col-md-8">
                     
                        <input type="text" name="site_title" class="form-control" value="{{$Appservice->getsetting('site_title')}}">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><label>SITE LOGO</label></div>
                      <div class="col-md-8">
                     
                        <input type="file" name="site_logo" class="form-control" value="{{$Appservice->getsetting('site_logo')}}">
                      </div>
                      <div class="col-md-6">
                        <img src="{{asset('upload/general/'.$Appservice->getsetting('site_logo'))}}" style="">
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-4"><label>SITE ICON</label></div>
                      <div class="col-md-8">
                     
                        <input type="file" name="site_icon" class="form-control" value="{{$Appservice->getsetting('site_icon')}}">
                      </div>
                      <div class="col-md-6">
                        <img src="{{asset('upload/general/'.$Appservice->getsetting('site_icon'))}}" style="">
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-4"><label>SITE ADDRESS</label></div>
                      <div class="col-md-8">
                     
                        <input type="text" name="address" class="form-control" value="{{$Appservice->getsetting('address')}}">
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-4"><label>ADMIN EMAIL</label></div>
                      <div class="col-md-8">
                     
                        <input type="email" name="admin_email" class="form-control" value="{{$Appservice->getsetting('admin_email')}}">
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-4"><label>PHONE</label></div>
                      <div class="col-md-8">
                     
                        <input type="text" name="phone" class="form-control" value="{{$Appservice->getsetting('phone')}}">
                      </div>
                    </div>
                     <div class="row mb-2">
                      <div class="col-md-4"><label>SITE DESCRIPTION</label></div>
                      <div class="col-md-8">
                      <textarea class="form-control" rows="8" name="site_description">{{$Appservice->getsetting('site_description')}}</textarea>
                      <script>
                      CKEDITOR.replace('site_description');
                      </script>
                      </div>
                    </div>
                   
                   <div class="row mt-3">
                     <div class="col-md-12">
                     <h2>Social Icon</h2>
                    </div>
                  </div>
                  <?php 
                  foreach($social as $val){
                  ?>
                   <div class="row mb-3 mt-3">
                    <div class="col-md-4">
                      <label>Name</label>
                      <input type="text" value="{{$val->name}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Link</label>
                      <input type="text" value="{{$val->value}}" class="form-control">
                    </div>
                    <div class="col-md-1 pt-2"><i class="social_edit fa fa-pencil" data-toggle="modal" data-target="#myModal" data-id="{{$val->id}}"></i></div>

                    <div class="col-md-1 pt-2"><a href="{{route('social.delete',['id'=>$val->id])}}"><i class="fa fa-times"></i></a></div>
                  </div>
                  <?php } ?>
                 
                   <div class="row mb-3 mt-3 iconelement2" id="div_1">
                    <div class="col-md-4">
                      <label>Name</label>
                      <input type="text" name="name[]" class="form-control">
                    </div>
                    <div class="col-md-8">
                      <label>Link</label>
                      <input type="text" name="value[]" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3 mt-3">
                    <div class="col-md-12 text-right">
                      <button type="button" class="btn btn-success" id="addicon">More Row</button>
                    </div>
                  </div>
                  <div class="row mb-3 mt-3">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                  </div>
                  </form>
                </div>
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
   <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 128%;">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <form method="post" action="{{route('update.social')}}">
        @csrf
        <input type="hidden" name="social_id" id="social_id" value="">
        <div id="content"></div>
        <div class="row">
        <div class="col-md-12 mt-2 text-right">
        <button type="submit" class="btn btn-primary">Edit</button>  
        </div>
        </div>

        </form>
        </div>
        <div class="modal-footer">
       
        </div>
        </div>

        </div>
        </div>