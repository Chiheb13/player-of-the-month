@extends('layouts.dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Team Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Team Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <form method="POST" enctype="multipart/form-data" action="{{ route('addequipe') }}">
                    @csrf
                <label for="inputName">team Name</label>
                <input type="text" id="inputName" name='name'class="form-control">
              </div>
              
              <div class="form-group">
                <label for="inputClientCompany">picture</label>
                <input type="file" name="logo" id="inputClientCompany" class="form-control">
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="row">
            <div class="col-12">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Create new team" class="btn btn-success float-right">
            </form>
            </div>
          </div>
        </div>
      
    </section>
    <!-- /.content -->
  </div>
    
@endsection