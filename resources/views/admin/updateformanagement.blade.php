 @extends('layouts.admin.admin_layout')



@section('body-content')

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Update For Management</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Update For Management</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          

          <div class="col-md-12 text-right mb-3"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AexampleModal">Add</a></div>
          
            <!-- Modal -->
          <div class="modal fade" id="AexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Update For List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
          <form action="{{route('add.updatefor')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                <label class="form-group">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-sm-12 text-right mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
          </div>
          
          </div>
          </div>
          </div>


          <div class="col-12">

            <div class="card">

              

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example2" class="table table-bordered table-hover">

                  <thead>

                  <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Action</th>

                  </tr>

                  </thead>

                  <tbody>

                  	<?php

                  	$i=1;

                  	foreach($up as $val){?>

                  <tr>

                  	<td>{{$i++}}</td>

                    <td>{{$val->name}}</td>

                    

                    <td><a href="#" data-toggle="modal" data-target="#EexampleModal{{$val->id}}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;
                    <a href="{{route('delete.updatefor',['id'=>$val->id])}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></a>
                  
                    <!-- Modal -->
                    <div class="modal fade" id="EexampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Update For List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('edit.updatefor',['id'=>$val->id])}}" method="post">
                    @csrf
                    <div class="row">
                    <div class="col-sm-12">
                    <label class="form-group">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$val->name}}" required>
                    </div>
                    <div class="col-sm-12 text-right mt-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </div>
                    </form>
                    </div>

                    </div>
                    </div>
                    </div>

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