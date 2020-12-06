@extends('layout/main')

@section('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
        }

    </style>
@endsection
@section('title', 'Order')

@section('container')
    <div class='container'>
        <h4 class="mt-3 text-center">Order</h4>
        <div class="mt-5 card-deck">

            @foreach ($products as $product)
                <div class='col-md-4 col-sm-6 mb-3'>
                    <div class="card" style="width: 18rem;">
                        <img src="img/{{ $product->img_path }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <b class="card-text">${{ number_format($product->price,2)}}</b>
                        </div>
                        <div class="card-footer">
                            @if ($product->stock == 0)
                                <a href="/orders/{{ $product->id }}" class="btn disabled">Order Now</a>
                            @else
                                <a href="/orders/{{ $product->id }}" class="btn btn-success">Order Now</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
