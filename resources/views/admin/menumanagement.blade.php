 @extends('layouts.admin.admin_layout')

@section('body-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-right mb-3"><a href="{{route('add.menu')}}" class="btn btn-primary">Add</a></div>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu Name</th>
                    <!-- <th>Route Name</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$i=1;
                  	foreach($menu as $val){?>
                  <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$val->menu}}</td>
                   <!--  <td>{{$val->route_name}}</td> -->
                    <td><a href="{{route('edit.menu',['id'=>$val->id])}}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                    <?php if($val->name!='Admin'){?><a href="{{route('delete.menu',['id'=>$val->id])}}"><i class="fa fa-trash-o"></i></a><?php } ?>
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