@extends('layouts.dashboard.index')
@section('content')
@if(session('success'))
    <div class="alert alert-success" id="success-alert">
      {{ session('success') }}
    </div>
    @endif
@if(session('valider'))
    <div class="alert alert-success" id="update-alert">
        {{ session('valider') }}
    </div>
    {{ session()->forget('valider') }}
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $("#update-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
        $("#success-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Players</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Players</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Players</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0"><br>
          <a href="{{ route('addplayer') }}" class="btn btn-success float-right">add new player</a><br>
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      
                      <th style="width: 20%">
                          player Name
                      </th>
                      <th style="width: 30%">
                          post player
                      </th>
                      <th style="width: 30%">
                       team Name
                    </th>
                    <th style="width: 30%">
                        player picture
                     </th>
                     <th>

                     </th>
                     <th>

                     </th>
                  </tr>
              </thead>
              
              <tbody>
                @if (!@empty($data))
          @foreach ($data as $info )
                  <tr>
                    <td>
                        {{$info->name}}
                      </td>
                      <td>
                        {{$info->postplayer}}
                      </td>
                      <td>
                        {{$info->equipe->name}}
                      </td>
                      <td><img src="uploads/{{ $info->image }}" style="width:70px;height:50px;" alt=""></td>
                    </td>

                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('updateformplayer',$info->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Update
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{ route('deleteplayer',$info->id)}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>  
                    </td>  
                  </tr>
                  @endforeach
                    @else <h1>the data not found</h1>
                @endif
                </tbody>
            </table>
            
          </div>
    
@endsection