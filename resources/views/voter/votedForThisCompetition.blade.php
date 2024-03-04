<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.dashboard.header')
</head>
<body class="backgroundacceuilpage">
  @if(session('valider'))
    <div class="alert alert-success" id="update-alert">
        {{ session('valider') }}
    </div>
    {{ session()->forget('valider') }}
    @endif
    @if(session('error'))
    <div class="alert alert-danger" id="error-alert">
        {{ session('error') }}
    </div>
    {{ session()->forget('error') }}
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $("#error-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
        $("#update-alert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
    });
</script>
    <input type="hidden" name="compitition_id" value="{{ $competition->id }}">
    <div id="coaches-container" class="coach-container">
      
      @foreach ($players as $player)
      <div class="coach-card">
          
          <p>{{ $player->name }}</p>
          <!-- You can also display other player information here -->
          <img src="{{ asset('uploads/' . $player->image) }}"  alt="">
          
      </div>
      @endforeach
      
    </div>
 
</body>
</html>
