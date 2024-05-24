<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.dashboard.header')
  <!-- Add this in the head section of your HTML -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    .star-rating i {
        cursor: pointer;
        transition: color 0.3s;
    }

    .star-rating i.selected {
        color: gold;
    }
  </style>
</head>
<body class="backgroundacceuilpage">
  <form action="{{ route('addvoter') }}" method="post">
    @csrf
    <input type="hidden" name="compitition_id" value="{{ $competition->id }}">
    <div id="coaches-container" class="coach-container">
      
      @foreach ($players as $player)
      <div class="coach-card">
          
          <p>{{ $player->name }}</p>
          <!-- You can also display other player information here -->
          <img src="{{ asset('uploads/' . $player->image) }}"  alt="">
          
          <!-- Use Font Awesome icons for star ratings -->
          <div class="star-rating" data-player-id="{{ $player->id }}">
              <i class="fas fa-star" data-rating="1"></i>
              <i class="fas fa-star" data-rating="2"></i>
              <i class="fas fa-star" data-rating="3"></i>
              <i class="fas fa-star" data-rating="4"></i>
              <i class="fas fa-star" data-rating="5"></i>
          </div>
          
          <input type="hidden" name="notes[{{ $player->id }}]" id="notes_{{ $player->id }}" value="0">
      </div>
      @endforeach
      
    </div>
    <div class="container ml"  >
      <div class="row justify-content-center mt-4">
          <div class="col-md-6" style="margin-left: -600px; margin-top: -90px;"><br>
              
              
                  <div class="form-group">
                      <label for="name" style="color: black;">Name</label>
                      <input type="text" name="name" class="form-control col-6" id="name">
                  </div>
                  <div class="mb-3">
                      <label for="phone" class="form-label" style="color: black;">Phone</label>
                      <div class="input-group">
                          <input type="tel" name="phone" class="form-control col-6" id="phone" placeholder="Enter your phone">
                      </div>
                  </div>
                  @error('phone')
                      <span class="text-danger h5">{{ $message }}</span>
                  @enderror
                  <input name="add" class="btn btn-success btn-block col-6" type="submit" value="Create Voter">
              
          </div>
      </div>
  </div>
  
</form>

<script>
  $(document).ready(function () {
      $('.star-rating').each(function () {
          var playerId = $(this).data('player-id');

          $(this).find('i').click(function () {
              var rating = $(this).data('rating');
              var hiddenInput = $('#notes_' + playerId);

              if (hiddenInput.val() == rating) {
                  // If the same star is clicked again, deselect it
                  hiddenInput.val(0);
                  $(this).removeClass('selected');
              } else {
                  // Select the clicked star
                  hiddenInput.val(rating);

                  // Add a class to highlight selected stars
                  $(this).prevAll().addBack().addClass('selected');
                  $(this).nextAll().removeClass('selected');
              }
          });
      });
  });
</script>

</body>
</html>
