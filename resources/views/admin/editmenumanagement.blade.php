@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Role Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('edit.menu',['id'=>$menu->id])}}" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Menu Name</label>
                    <input type="text" class="form-control" name="menu" value="{{$menu->menu}}" placeholder="Enter Name" required>
                  </div>
     
                   <div class="form-group">
                    <label for="exampleInputEmail1">List Route Name </label>
                    <input type="text" class="form-control" name="route_name" value="{{$menu->route_name}}" placeholder="Enter Route Name" required>
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Add Route Name </label>
                    <input type="text" class="form-control" name="add_route" value="{{$menu->add_route}}" placeholder="Enter Route Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edit Route Name </label>
                    <input type="text" class="form-control" name="edit_route" value="{{$menu->edit_route}}" placeholder="Enter Route Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Delete Route Name </label>
                    <input type="text" class="form-control" name="delete_route" value="{{$menu->delete_route}}" placeholder="Enter Route Name" required>
                  </div>                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
