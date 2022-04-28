@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Group</li>
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
                <h3 class="card-title">Group Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add.group')}}" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
				  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Share Type</label>
                    <select id="multiple" class="form-control" name="share_type" required>
                      <option value="">-- Select --</option>
                      <option value="Wall_Common">Wall Common</option>
                      <option value="Wall_Project">Wall Project</option>
                      <option value="Wall_Group">Wall Group</option>
                      <option value="Wall_Employee">Wall Employee</option>
                      <option value="Wall_Notification">Wall Notification</option>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Group Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Employee</label>
                    <select id="multiple" class="form-control" name="employee[]" required multiple>
                      <?php 
                      foreach ($empl as $key => $value) {
                        if(Auth::id() != $value->id){
                      ?>
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
