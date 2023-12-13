@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Completed Order Details</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('completedOrders.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $completedOrder->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{ $completedOrder->address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone number:</strong></td>
                                    <td>{{ $completedOrder->telephone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Created at:</strong></td>
                                    <td>{{ $completedOrder->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Updated at:</strong></td>
                                    <td>{{ $completedOrder->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Products Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $products = json_decode($completedOrder->products, true);
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>{{ $product['price'] }} sum</td>
                                        <td>{{ $product['quantity'] * $product['price'] }} sum</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Total Price: {{ $completedOrder->total_price }} sum</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
