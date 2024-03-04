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

<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $teamsCount }}</h3>

          <p>Teams</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('showtableequipe') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $playersCount }}</h3>

          <p>Players</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('afficheplayer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $compititionsCount }}</h3>

          <p>Compititions</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('showcompititiontable') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $votersCount }}</h3>

          <p>Voters</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
    
@endsection