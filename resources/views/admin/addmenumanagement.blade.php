@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
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
                <h3 class="card-title">Menu Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add.menu')}}" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Menu Name </label>
                    <input type="text" class="form-control" name="menu" placeholder="Enter Name" required>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">List Route Name </label>
                    <input type="text" class="form-control" name="route_name" placeholder="Enter Route Name" required>
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Add Route Name </label>
                    <input type="text" class="form-control" name="add_route" placeholder="Enter Route Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edit Route Name </label>
                    <input type="text" class="form-control" name="edit_route" placeholder="Enter Route Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Delete Route Name </label>
                    <input type="text" class="form-control" name="delete_route" placeholder="Enter Route Name" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
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
