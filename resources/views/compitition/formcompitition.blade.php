@extends('layouts.dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- ... (unchanged) ... -->
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
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('createcompitition') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEquipe">date debut</label>
                                <input type="date" name="date_debut" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEquipe">date fin</label>
                                <input type="date" name="date_fin" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEquipe">active status</label>
                                <select class="form-control" name="is_activated">
                                    <option selected disabled>Choose the status</option>
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
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new compitition" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
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
