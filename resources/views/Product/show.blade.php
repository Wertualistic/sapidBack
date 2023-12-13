@extends('layouts.site')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="h3 mb-2 text-gray-800">@lang('words.ProductDetails')</h4>
            <div class="card-header-action">
                <a href="{{ route('products.index') }}" class="btn btn-primary">@lang('words.BackToProducts')</a>
            </div>
        </div>

        <div class="card-body">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('words.ProductDetails')</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td><strong>@lang('words.Title'):</strong></td>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.Description'):</strong></td>
                                        <td>{{ $product->desc }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.Image'):</strong></td>
                                        <td>
                                            <img src="{{ asset('storage/products/' . $product->img) }}" alt="{{ $product->title }}"
                                                class="img-thumbnail" style="max-width: 200px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.Price'):</strong></td>
                                        <td>${{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.Discount'):</strong></td>
                                        <td>{{ $product->discount }}%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.Category'):</strong></td>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.CreatedAt'):</strong></td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('words.UpdatedAt'):</strong></td>
                                        <td>{{ $product->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
