@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User / Employee Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User - Employee Management</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 text-left mb-3"><a href="{{route('archive.user')}}" class="btn btn-danger">Archive</a></div>
       <?php if($Appservice->checkAddaccess('user.management')==true){?>
        <div class="col-md-6 text-right mb-3"><a href="{{route('add.user')}}" class="btn btn-primary">Add</a></div>
      <?php } ?>
      <div class="col-12">
        <div class="card">

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Access/Block</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $i=1;
               foreach($user as $val){?>
                <tr>
                 <td>{{$i++}}</td>
                 <td>{{$val->name}}</td>
                 <td>{{$val->role->role_name}}</td>
                 <td>{{$val->email}}</td>
                 <td>@if($val->id!='1')
                   @if($Appservice->checkEditaccess('user.management')==true)
                   @if($val->status=='Y')
                   <a href="javaScript:void(0);" class="btn btn-success btn-xs">Access</a>
                   <a href="{{route('user.status',['id'=>$val->id,'status'=>'N'])}}">Block</a>
                   @else
                   <a href="{{route('user.status',['id'=>$val->id,'status'=>'Y'])}}">Access</a>
                   <a href="javaScript:void(0);" class="btn btn-danger btn-xs">Block</a>
                   @endif
                   @endif
                   @endif
                 </td>
                 <td> <?php if($Appservice->checkEditaccess('user.management')==true){?><a href="{{route('edit.user',['id'=>$val->id])}}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;<?php } if($Appservice->checkDeleteaccess('user.management')==true){?>
                  <?php if($val->id!='1'){?><a href="#" data-url="{{route('delete.user',['id'=>$val->id])}}" class="deleteBtn"><i class="fa fa-trash-o text-red"></i></a><?php } } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>

        </table>
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