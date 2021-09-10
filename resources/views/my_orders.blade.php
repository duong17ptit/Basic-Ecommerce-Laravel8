@extends('master')
@section('content')
<div class="container my-3 my-md-5">
    <link rel="stylesheet" href="{{ asset('resources/css/css_myorders.css') }}">
    <article class="card pt">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}} 
            {{Session::forget('message')}}
        </div>
        @endif
        <header class="card-header"> My Orders / Tracking </header>
        @foreach ($orders as $key => $item_order)

        <div class="card-body">
    
            <article class="card">
                <div class="card-body row">
                    <h6><strong>Product Name:</strong> {{ $item_order->name}} </h6>
                    <div class="col"> <strong>Estimated Delivery time:</strong> 3 days <br></div>
                    <div class="col"> <strong>Status:</strong>  {{$item_order->status}} <br> </div>
                    <div class="col"> <strong>Name:</strong>  {{$item_order->firstname}} {{$item_order->lastname}} <br> </div>
                    <div class="col"> <strong>Address:</strong>  {{$item_order->address}} <br> </div>
                </div>
            </article>
            <div class="track">
                <div class="step {{( $item_order->status =='Pending' || $item_order->status == 'Order confirmed' || $item_order->status == 'Out for Delivery' || $item_order->status == 'Delivered') ? 'active' : ''}}"> <span class="icon"> <i class="fas fa-spinner"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step {{( $item_order->status =='Order confirmed' || $item_order->status == 'Out for Delivery' || $item_order->status == 'Delivered') ? 'active' : ''}}" > <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                <div class="step {{( $item_order->status =='Out for Delivery' || $item_order->status == 'Delivered') ? 'active' : ''}} "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step {{($item_order->status == 'Delivered') ? 'active' : ''}}"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
            <hr>
            <ul class="row">
                <li class="col-md-6 col-sm offset-4 ">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ $item_order->gallery}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$item_order->name}} <br>Color: {{$item_order->color}}</p> 
                            <span class="text-muted">${{$item_order->price}} x {{$item_order->cart_qty}}  </span> <br>
                            <span class="text-muted">Total : ${{$item_order->price * $item_order->cart_qty}}</span> 
                        </figcaption>
                    </figure>
                </li>
            </ul>
          
        </div>
        @endforeach
    </article>
    <hr> <a href="{{URl("/")}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Home</a>
</div>
@endsection
