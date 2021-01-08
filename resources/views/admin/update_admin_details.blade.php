@extends('layouts.admin_layout.admin_layout')
  @section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif
              <form role="form" method='post' action="{{url('/admin/update-admin-details')}}" name='updateAdminDetails' id='updateAdminDetails'>@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly=''>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input class="form-control" value="{{Auth::guard('admin')->user()->type}}" readonly=''>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->name}}"  placeholder="Enter Admin Name" id='admin_name' name='admin_name' required=''>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" class="form-control"  value="{{Auth::guard('admin')->user()->mobile}}" placeholder="Enter Admin Mobile" id='admin_mobile' name='admin_mobile' required=''>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id='admin_image' name='admin_image'>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

        
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  @endsection