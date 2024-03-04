@extends('layouts.dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>update compitition </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">update compitition</li>
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('updateformcompitition.post', $data['id']) }}">

                @csrf
                <label for="inputName">compitition Name</label>
                <input type="text" value={{$data['name'] }} id="inputName" name='name'class="form-control">
              </div>
              
              <div class="form-group">
                <label for="inputClientCompany">date_debut</label>
                <input type="date" name="date_debut" value={{$data['date_debut'] }} id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">date_fin</label>
                <input type="date" name="date_fin" value={{$data['date_fin'] }} id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEquipe">active status</label>
                <select class="form-control" name="is_activated">
                    <option selected disabled value="{{$data['is_activated'] }}">{{$data['is_activated'] }}</option>
                    <option value="0">active</option>
                    <option value="1">disactivate</option>
                </select>
            </div>
            <div class="form-group">
              <label>Players</label>
              <select  class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="player_id[]">
                  @foreach($players as $player)
                  
                  <option value="{{ $player->id }}">{{ $player->name }}</option>
                  @endforeach
              </select>
          </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="row">
            <div class="col-12">
              <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="update compitition" class="btn btn-success float-right">

            </form>
            </div>
          </div>
        </div>
      
    </section>
    <!-- /.content -->
  </div>
  <script>
    $(document).ready(function() {
        $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
</script>
@endsection