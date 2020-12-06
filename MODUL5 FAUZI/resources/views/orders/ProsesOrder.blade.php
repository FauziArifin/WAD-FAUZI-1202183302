@extends('layout/main')

@section('style')
    <style>
        body {
            background-color: whitesmoke;
        }

    </style>
@endsection

@section('title', 'Order')

@section('container')
    <h4 class="mt-3 text-center">Order</h4>
    <div class='container' style="width:60%;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-8">
                    <img src="/img/{{ $product->img_path }}" class="card-img" alt="Gambar Produk">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small>Stock: {{ $product->stock }}</small></p>
                        <h4 class="card-title">${{ $product->price }}.00</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="width:60%;">
        <h4 class="text-center">Buyer Information</h4>
        <form method="POST" action="/orders/{{ $product->id }}">
            @csrf
            <input type="hidden" name="product_id" value='{{ $product->id }}'>
            <input type="hidden" name="stock" value='{{ $product->stock }}'>
            <input type="hidden" name="price" value='{{ $product->price }}'>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name='name' value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name='contact' value="{{ old('contact') }}">
                @error('contact')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name='quantity' value="{{ old('quantity') }}"
                        max="{{ $product->stock }}">
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @if ($product->stock == 0)
                <button type="submit" class="mt-3 btn-seccondary" disabled>Confirm</button>
            @else
                <button type="submit" class="mt-3 btn-success">Confirm</button>
            @endif

        </form>
    </div>
@endsection
