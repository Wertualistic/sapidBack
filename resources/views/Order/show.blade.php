@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.OrderDetails')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
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
                                    <td><strong>@lang('words.Addressen'):</strong></td>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.PhoneNumber'):</strong></td>
                                    <td>{{ $order->telephone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.CreatedAt'):</strong></td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.UpdatedAt'):</strong></td>
                                    <td>{{ $order->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('words.ProductName')</th>
                                    <th>@lang('words.Quantity')</th>
                                    <th>@lang('words.Price')</th>
                                    <th>@lang('words.ProductsPrice')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>{{ $product['name_' . \App::getLocale()] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>{{ $product['price'] }} @lang('words.sum')</td>
                                        <td>{{ $product['quantity'] * $product['price'] }} @lang('words.sum')</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@lang('words.TotalPrice'): {{ $order->total_price }} @lang('words.sum')</h5>
                    <a class="btn btn-warning" href="#"
                        onclick="completeOrder({{ $order->id }})">@lang('words.Completed')</a>
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
            statusField.name = 'status_en';
            statusField.value = 'completed';
            form.appendChild(statusField);

            // Append the form to the body and submit
            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection
