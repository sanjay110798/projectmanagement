@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
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
                <h3 class="card-title">General Post Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add.social')}}" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image/Docs</label>
                    <input type="file" class="form-control" name="image" required>
                  </div>
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="exampleInputEmail1">Update For</label>
                        <select class="form-control" name="updatefor" required>
                        <option value="">Select</option>
                        @foreach($list as $l)
                        <option value="{{$l->name}}">{{$l->name}}</option>
                        @endforeach
                        </select> 
                      </div>
                      <div class="col-sm-6">
                        <label for="leve">Share With</label>
                        <select class="form-control" id="level" name="level" required>
                        <option value="">-- Select --</option>
                        <option value="1">Lavel 1</option>
                        <option value="2">Lavel 2</option>
                        <option value="3">Lavel 3</option>
                        
                        </select> 
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                   <textarea class="form-control" name="description" required="" placeholder="Enter Description"></textarea>
                    <script>
                  CKEDITOR.replace('description');
                  </script>
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
