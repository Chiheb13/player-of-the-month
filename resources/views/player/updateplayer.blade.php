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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('updateplayer', $data['id']) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" value={{$data['name'] }} name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEquipe">Equipe</label>
                                <select class="form-control" name="equipe_id">
                                    <option selected disabled>Choose the equipe</option>
                                    @foreach($equipes as $equipe)
                                        <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputPostPlayer">Post player</label>
                                <input type="text" id="inputPostPlayer" value={{$data['postplayer'] }} name="postplayer" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Picture</label>
                                <input type="file" name="image" value={{$data['image'] }} id="inputClientCompany" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="row">
                        <div class="col-12">
                          <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                          <input type="submit" value="update player" class="btn btn-success float-right">
                        </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
