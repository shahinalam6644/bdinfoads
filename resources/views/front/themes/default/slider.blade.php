<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  
  <div class="carousel-indicators">
    @php $data = 0;  @endphp 
    @foreach($sliders as $slider)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$data}}" class="{{ $data == 0? 'active':''}}" aria-current="true" aria-label="Slide {{ $data }}"></button>    
    @php $data++  @endphp 
    @endforeach  
  </div>
  <div class="carousel-inner">
  @php $data = 0;  @endphp 
    @foreach($sliders as $slider)
    <div class="carousel-item {{ $data == 0? 'active':''}}">
      <img src="{{ $slider->thamb_path }}" class="d-block" alt="...">      
      <!-- <img src="{{ $slider->thamb_path }}" class="d-block w-100" alt="..."> -->
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $slider->title }}</h5>
        <p>{{ $slider->short_des }}</p>
      </div>
    </div>  
    @php $data++  @endphp   
@endforeach

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>