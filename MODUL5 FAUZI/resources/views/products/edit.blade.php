@extends('layout/main')

@section('background')
    <style>
        body {
            background-color: whitesmoke;
        }

    </style>
@endsection


@section('title', 'Edit Data Produk')

@section('container')
    <div class='container' style="width:50%;">
        <h4 class="mt-3 text-center">Update Product</h4>
        <form method="POST" , action="/products/{{$product->id}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name='name' value="{{ $product->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$USD</div>
                    </div>
                    <input type="number" class="form-control" id="price" name='price' value="{{ $product->price }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name='description'>{{ $product->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name='stock' value="{{ $product->stock }}">
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image file input</label>
                <input type="file" class="form-control-file" id="image" name='img_path' value="{{ $product->img_path }}">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Confirm</button>
        </form>
    </div>
@endsection
