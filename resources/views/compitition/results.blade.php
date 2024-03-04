<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.dashboard.header')
</head>
<body class="backgroundacceuilpage">

  <input type="hidden" name="compitition_id" value="{{ $competition->id }}">

  @if($players->isNotEmpty())
    <div class="winner-message alert alert-info">
      <center><h3 class="winner-text">The winner is: {{ $players->first()->name }} with note {{ $players->first()->note }}</h3></center>
    </div>
    <center><img src="{{ asset('/vendors/images/winner.png') }}" width="50px" height="50px"><div class="coach-card coach-cardwinner">
        <p>{{ $players->first()->name }}</p>
        <p>Note: {{ $players->first()->note }}</p>
        <img style=" height: 220px;" src="{{ asset('uploads/' . $players->first()->image) }}" alt="{{ $players->first()->name }} Image">
    </div></center>
  @endif

 
  <div id="coaches-container" class="coach-container">
    @foreach ($players->slice(1) as $player) 
      <div class="coach-card">
        <p>{{ $player->name }}</p>
        <p>Note: {{ $player->note }}</p>
        <img src="{{ asset('uploads/' . $player->image) }}" alt="{{ $player->name }} Image">
      </div>
    @endforeach
  </div>
</body>
</html>
