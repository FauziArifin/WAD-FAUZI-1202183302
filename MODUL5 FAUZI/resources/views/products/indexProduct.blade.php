@extends('layout/main')


@section('title', 'Products')

@section('container')
    <div class='container' style="width:70%;">
        <h3 class="mt-3" style='text-align: center;'>List Product</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-dark mt-3" href="/products/addProduct" role="button">Add Product</a>
        <br>
        <table class="table mt-3">

            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 50%;">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price,2)}}</td>
                        <td><a href="products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="products/{{ $product->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
