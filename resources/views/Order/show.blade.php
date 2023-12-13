@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Order Details</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $order->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone number:</strong></td>
                                    <td>{{ $order->telephone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Created at:</strong></td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Updated at:</strong></td>
                                    <td>{{ $order->updated_at }}</td>
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
                                @foreach ($order->products as $product)
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
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Total Price: {{ $order->total_price }} sum</h5>
                    <a class="btn btn-warning" href="#"
                        onclick="completeOrder({{ $order->id }})">Completed</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function completeOrder(orderId) {
            // Create a form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('orders.update', ':orderId') }}".replace(':orderId', orderId);
            form.style.display = 'none'; // Hide the form

            // CSRF token
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = "{{ csrf_token() }}";
            form.appendChild(csrfToken);

            // Method spoofing for PATCH
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PATCH';
            form.appendChild(methodField);

            // Status field
            var statusField = document.createElement('input');
            statusField.type = 'hidden';
            statusField.name = 'status';
            statusField.value = 'completed';
            form.appendChild(statusField);

            // Append the form to the body and submit
            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection
