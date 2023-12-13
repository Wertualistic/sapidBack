@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.CreateProduct')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">@lang('words.BackToProducts')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('products.store') }}" method="post"
                    enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('words.Title')</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                required="" placeholder="Title">
                            <div class="invalid-feedback">
                                What's the product title?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Description')</label>
                            <input type="text" name="desc" value="{{ old('desc') }}" class="form-control"
                                required="" placeholder="Description">
                            <div class="invalid-feedback">
                                What's the product description?
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="mb-3 custom-file-input @error('img') is-invalid @enderror"
                                name="img" id="customFile">
                            <label class="custom-file-label" for="customFile ">Choose file</label>
                            <div class="invalid-feedback">
                                What's image?
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('words.Price')</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                                required="" placeholder="Price">
                            <div class="invalid-feedback">
                                What's the price?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Discount')</label>
                            <input type="number" name="discount" value="{{ old('discount', 0) }}" class="form-control"
                                placeholder="Discount">
                        </div>

                        <select name="category_id" class="form-control">
                            <option value="" selected disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">@lang('words.Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
