<div class="d-flex align-items-center justify-content-center mb-1">
  @foreach ([1, 2, 3, 4, 5] as $i)
    @if ($rating >= $i) 
      <small class="fa fa-star text-primary mr-1"></small>
    @elseif (abs($rating - $i) == 0.5)
      <small class="fa fa-star-half-alt text-primary mr-1"></small>
    @else
      <small class="far fa-star text-primary mr-1"></small>
    @endif
  @endforeach
    <small>({{ $rating_count }})</small>
</div>

