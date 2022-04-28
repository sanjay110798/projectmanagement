@extends('layouts.admin.admin_layout')

@section('body-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$grp->group_name}} - {{str_replace('_',' ',$grp->share_type)}}</h1>
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
                <h3 class="card-title">Update Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add.emp.group',['id'=>$grp->id])}}" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
				  <div class="form-group">
					<label for="exampleInputEmail1">Employee List: </label><br>
					@foreach($emp as $k=>$v)
						<div class="col-md-2" style="display: inline-block; background-color: #007bff; text-align: center; color: #fff;">{{$v['name']}}
						</div>
					@endforeach
				  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Add Employee</label>
                    <select id="multiple" class="form-control" name="employee[]" required multiple>
                      @foreach ($empl as $key => $value)
						@if(!in_array($value->id,$empid))
                      <option value="{{$value->id}}">{{$value->name}}</option>
						@endif
                      @endforeach
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
