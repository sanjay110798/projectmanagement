@extends('layouts.admin.admin_layout')



@section('body-content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit User</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">User</li>

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

                <h3 class="card-title">User Management</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form method="post" action="{{route('edit.user',['id'=>$user->id])}}" enctype="multipart/form-data">

               @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Name</label>

                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter Name" required>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Email</label>

                    <input type="email" class="form-control" name="email" value="{{$user->email}}"  placeholder="Enter Email" required>

                  </div>

                <div class="form-group">

                    <label for="exampleInputEmail1">Password</label>

                    <input type="password" class="form-control" name="password"  placeholder="Enter Password">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Role</label>

                 

                    <select class="form-control" name="role" required>

                      <option value="">Select</option>

                      <?php 

                      foreach ($role as $value) {

                      ?>

                      <option value="{{$value->id}}" <?php if($value->id==$user->role_id){echo"selected";}?>>{{$value->role_name}}</option>

                    <?php } ?>

                    </select>

                  </div>
                   <div class="form-group">

                    <label for="exampleInputEmail1">Level</label>

                 

                    <select class="form-control" name="level" required>

                      <option value="">Select</option>

                      <option value="1"<?php if("1"==$user->level){echo"selected";}?>>Coordinator</option>
                      <option value="2"<?php if("2"==$user->level){echo"selected";}?>>Manager</option>
                      <option value="3"<?php if("3"==$user->level){echo"selected";}?>>Supervisor</option>
                      

                    </select>

                  </div>

                 <?php /*  <div class="form-group">

                    <label for="exampleInputEmail1">Menu Permission</label>

                    

                  </div>  

                  <?php

                  foreach($menu as $val){

                  $premission=$Appservice->checkpermission($val->id,$user->id);

                  ?>

                  <div class="form-group">

                  <label for="exampleInputEmail1">{{$val->menu}} : </label>

                  <input type="hidden" name="menu[]" value="{{$val->id}}">

                  <input type="checkbox" class="" name="list_{{$val->id}}" <?php if($premission && $premission->list_access=='Y'){echo"checked";}?> > List &nbsp;

                  <input type="checkbox" class="" name="add_{{$val->id}}"  <?php if($premission && $premission->add_access=='Y'){echo"checked";}?>> Add &nbsp;

                  <input type="checkbox" class="" name="edit_{{$val->id}}"  <?php if($premission && $premission->edit_access=='Y'){echo"checked";}?> > Edit &nbsp;

                  <input type="checkbox" class="" name="delete_{{$val->id}}" <?php if($premission && $premission->delete_access=='Y'){echo"checked";}?> > Delete &nbsp;

                   

                  </div>   

                  <?php } ?> 

                  */ ?>

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

