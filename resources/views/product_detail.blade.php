@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-6">
                <img src="{{ $item->gallery }}" class="d-block w-100" alt="{{ $item->name }}">

            </div>
            <div class="pt-5 col-6 col-sm-5">
                 <a href="{{url('/') }}"><button class="btn btn-secondary"> Go back</button></a>
                <h3>{{ $item->name }}</h3>
                <h3> Category : {{ $item->category }}</h3>
                <h3> Price : {{ $item->price }}</h3>
                <p> Details : {{ $item->description }}</p>
                <form action="{{url('/add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button class="btn btn-primary"> Add to cart </button>
                </form>
                
                <br>
                <button class="btn btn-success"> Buy now </button>
            </div>
        </div>
    </div>
@endsection
