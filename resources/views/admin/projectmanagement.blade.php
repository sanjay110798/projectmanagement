 @extends('layouts.admin.admin_layout')

@section('body-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <?php if($Appservice->checkAddaccess('project.management')==true){?>
          <div class="col-md-6 text-left mb-3"><a href="{{route('archive.project')}}" class="btn btn-danger">Archive</a></div>
          <div class="col-md-6 text-right mb-3"><a href="{{route('add.project')}}" class="btn btn-primary">Add</a></div>
          <?php } ?>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Project Name</th>

                    <?php if($Appservice->checkEditaccess('project.management')==true || $Appservice->checkDeleteaccess('project.management')==true){?>
                    <th>Status</th>
                    <th>Action</th>
                    <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$i=1;
                  	foreach($project as $val){?>
                  <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$val->project_name}}</td>
                    <?php if($Appservice->checkEditaccess('project.management')==true || $Appservice->checkDeleteaccess('project.management')==true){?>
                    <td>
                      <select class="form-control status_change" data-id="{{$val->id}}">
                      <option value="Pending" {{($val->status=='Pending') ? 'selected' : ''}}>Pending</option>
                      <option value="Process" {{($val->status=='Process') ? 'selected' : ''}}>Process</option>
                      <option value="Complete" {{($val->status=='Complete') ? 'selected' : ''}}>Complete</option>
                      
                      </select>
                    </td>
                    <td><?php if($Appservice->checkEditaccess('project.management')==true){?><a href="{{route('edit.project',['id'=>$val->id])}}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                    <?php } if($Appservice->checkDeleteaccess('project.management')==true){ ?><a href="#" data-url="{{route('delete.project',['id'=>$val->id])}}" class="deleteBtn"><i class="fa fa-trash-o"></i></a><?php }  ?>
                    </td>
                  <?php } ?>
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