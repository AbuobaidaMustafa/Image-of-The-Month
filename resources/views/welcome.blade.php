<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Image fo the Month</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="card col-md-2">
                <img class="card-img-top" src="{{$photo->photo}}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{$photo->title}}</h4>
                    <p class="card-text">{{$photo->description}}</p>
                </div>
            </div>
             @empty
            <p>No Photos</p>
            @endforelse        
        </div>

    </div> --}}
<!-- Carousel wrapper -->
<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
  <!-- Controls -->
  <div class="d-flex justify-content-center mb-4">
    <button
      class="carousel-control-prev position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Inner -->
  <div class="carousel-inner py-4">
    <!-- Single item -->

    <div class="carousel-item active">
      <div class="container">
        <div class="row">
            @forelse ($photos as $photo)
          <div class="col-lg-4">
            <div class="card">
              <img
                src="{{$photo->photo}}"
                class="card-img-top"
                alt="{{$photo->title}}"
              />
              <div class="card-body">
                <h5 class="card-title">{{$photo->title}}</h5>
                <p class="card-text">
                 {{$photo->description}}
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
          @empty
        <p>No Photos</p>
        @endforelse  
        </div>
      </div>
    </div>
    
  </div>
  <!-- Inner -->
</div>
<!-- Carousel wrapper -->
</body>

</html>
