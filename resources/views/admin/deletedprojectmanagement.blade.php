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
         
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Restore</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach($project as $val){?>
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$val->project_name}}</td>
                    
                    <td><a href="{{route('project.restore',['id'=>$val->id])}}" class="btn btn-danger btn-xs">Restore</a>
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