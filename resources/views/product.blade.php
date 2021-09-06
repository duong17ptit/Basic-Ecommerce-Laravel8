@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/vendors/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/vendors/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/vendors/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('resources/vendors/linericon/style.css') }}">
<link rel="stylesheet" href="{{ asset('resources/vendors/owl-carousel/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/vendors/owl-carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    {{-- <div class="container-fluid custom-product">

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($products as $item)
                    <div class="carousel-item {{ $item->id == 1 ? 'active' : '' }}">
                        <a href="product/detail/{{ $item->id}}">
                            <img src="{{ $item->gallery }}" class="d-block w-100" alt="{{ $item->name }}">
                            <div class="carousel-caption  d-none d-md-block" style="color: rgb(40, 4, 63)">
                                <h5>{{ $item->name }}</h5>
                                <p>{{ $item->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div> --}}
    <main class="site-main">
    <section class="hero-banner">
        <div class="container">
          <div class="row no-gutters align-items-center pt-60px">
            <div class="col-5 d-none d-sm-block">
              <div class="hero-banner__img">
                <img class="img-fluid" src="{{ asset('resources/images/hero-banner.png') }}" alt="">
              </div>
            </div>
            <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
              <div class="hero-banner__content">
                <h4>Smartphone Shop</h4>
                <h1>Browse Our Premium Product</h1>
                <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                <a class="button button-hero" href="#">Browse Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
   
      {{-- <section class="section-margin mt-0">
   
        <div class="owl-carousel owl-theme hero-carousel">
            @foreach ($products as $item)
                {{ $item->category }}
          <div class="hero-carousel__slide">
            <img src="{{ $item->gallery }}" alt="" class="img-fluid">
            <a href="#" class="hero-carousel__slideOverlay">
              <h3>{{ $item->category }}</h3>
              <p>{{ $item->name }}</p>
            </a>
          </div>
          @endforeach
        </div>
   
      </section> --}}
    <section class="section-margin calc-60px">
        <div class="container">
          <div class="section-intro pb-60px">
            <p>All products</p>
            <h2><span class="section-intro__style">Product</span></h2>
          </div>
          <div class="row">
            @foreach ($products as $item)
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="card text-center card-product">
                <div class="card-product__img">
                  <img class="card-img" src="{{ $item->gallery }}" alt="">
                  <ul class="card-product__imgOverlay">
                    <li><button><a href="product/detail/{{ $item->id}}"><i title="View this product" class="ti-search"></i> </a></button></li>
                    {{-- <li><button><a href=""><i  title="View this product" class="ti-shopping-cart"></i> </a></button></li> --}}
                    {{-- <li><button><i class="ti-heart"></i></button></li> --}}
                  </ul>
                </div>
                <div class="card-body">
                  <p>{{ $item->category }}</p>
                  <h4 class="card-product__title"><a href="product/detail/{{$item->id}}">{{ $item->name }}</a></h4>
                  <p class="card-product__price">${{ $item->price }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
          <div class="row">
            <div class="col-xl-5">
              <div class="offer__content text-center">
                <h3>Up To 20% Off</h3>
                <h4>Winter Sale</h4>
                <p>Let's buy </p>
                <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      </main>
      
@endsection
