@extends('layout/main')


@section('title', 'History')

@section('container')
    <div class='container' style="width:70%;">
        <h4 class="mt-3" style='text-align: center;'>History</h4>
    
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 40%;">Product</th>
                    <th scope="col" style="width: 25%;">Buyer Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->Product->name}}</td>
                    <td>{{ $order->buyer_name }}</td>
                    <td>{{ $order->buyer_contact }}</td>
                    <td>${{ $order->amount }}.00</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
