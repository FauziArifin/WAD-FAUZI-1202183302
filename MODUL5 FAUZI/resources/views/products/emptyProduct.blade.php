@extends('layout/main')


@section('title', 'Product')

@section('container')
    <div class='container text-center'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h5 class="mt-4">There is no data..</h5>
        <a class="btn btn-dark mt-2" href="/products/addProduct" role="button">Add Product</a>
    </div>
@endsection
