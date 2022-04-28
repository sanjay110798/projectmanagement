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
                  <th>Restore</th>
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
                 <td><a href="{{route('user.restore',['id'=>$val->id])}}" class="btn btn-danger btn-xs">Restore</a>
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