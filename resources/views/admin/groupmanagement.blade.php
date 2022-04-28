@extends('layouts.admin.admin_layout')

@section('body-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Group Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Group Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if($Appservice->checkAddaccess('group.management')==true){?>
          <div class="col-md-12 text-right mb-3"><a href="{{route('add.group')}}" class="btn btn-primary">Add</a></div>
          <?php } ?>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
					<!--<th>Share Type</th>-->
                    <th>Group Name</th>
					<th>Created By</th>
					<!--<th>Status</th>-->
           <?php if($Appservice->checkEditaccess('group.management')==true || $Appservice->checkDeleteaccess('group.management')==true){?>
                    <th>Action</th>
                  <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$i=1;
                  	foreach($gr as $val){?>
                  <tr>
                  	<td>{{$i++}}</td>
                    <!--<td>{{str_replace('_',' ',$val->share_type)}}</td>-->
                    <td>{{$val->group_name}}</td>
					<td>@php 
            $us=App\User::where(['id'=>$val->created_by])->first(); 
            @endphp
            {{($us) ? $us->name : ''}}</td>
					<!--<td>{{($val->accepted == 0) ? 'Not Accepted' : 'Accepted'}}</td>-->
           <?php if($Appservice->checkEditaccess('group.management')==true || $Appservice->checkDeleteaccess('group.management')==true){?>
                    <td>
					@if($Appservice->checkEditaccess('group.management')==true)
						<a href="{{route('edit.group',['id'=>$val->id])}}" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
					@endif
                    @if($Appservice->checkDeleteaccess('group.management')==true)
						<a href="#" data-url="{{route('delete.group',['id'=>$val->id])}}" class="deleteBtn"><i class="fa fa-trash-o"></i></a>
					@endif
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