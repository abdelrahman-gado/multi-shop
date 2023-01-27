<div class="text-primary mb-2">
    @foreach ([1, 2, 3, 4, 5] as $i)
    @if ($rating >= $i) 
      <i class="fa fa-star text-primary"></i>
    @elseif (abs($rating - $i) == 0.5)
      <i class="fa fa-star-half-alt text-primary"></i>
    @else
      <i class="far fa-star text-primary"></i>
    @endif
  @endforeach
</div>
