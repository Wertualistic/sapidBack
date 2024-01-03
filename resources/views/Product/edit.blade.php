@extends('layouts.site')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="h3 mb-2 text-gray-800">@lang('words.EditProduct')</h4>
            <div class="card-header-action">
                <a href="{{ route('products.index') }}" class="btn btn-primary">@lang('words.BackToProducts')</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">@lang('words.Title'):</label>
                            <input type="text" name="title_uz" id="title_uz" class="form-control"
                                value="{{ old('title_uz', $product->title_uz) }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_ru">@lang('words.Titleru'):</label>
                            <input type="text" name="title_ru" id="title_ru" class="form-control"
                                value="{{ old('title_ru', $product->title_ru) }}" required>
                            @error('title_ru')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_en">@lang('words.Titleen'):</label>
                            <input type="text" name="title_en" id="title_en" class="form-control"
                                value="{{ old('title_en', $product->title_en) }}" required>
                            @error('title_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc">@lang('words.Descriptionuz'):</label>
                            <textarea name="desc_uz" id="desc_uz" class="form-control" rows="3" required>{{ old('desc_uz', $product->desc_uz) }}</textarea>
                            @error('desc_uz')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc_ru">@lang('words.Descriptionru'):</label>
                            <textarea name="desc_ru" id="desc_ru" class="form-control" rows="3" required>{{ old('desc_ru', $product->desc_ru) }}</textarea>
                            @error('desc_ru')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc_en">@lang('words.Descriptionen'):</label>
                            <textarea name="desc_en" id="desc_en" class="form-control" rows="3" required>{{ old('desc_en', $product->desc_en) }}</textarea>
                            @error('desc_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" class="mb-3 custom-file-input" name="img" id="customFile">
                            <label class="custom-file-label" for="customFile ">Choose file</label>
                            <img src="{{ asset('/storage/products/' . $product->img) }}" alt="" width="200">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">@lang('words.Price'):</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount">@lang('words.Discount'):</label>
                            <input type="number" name="discount" id="discount" class="form-control"
                                value="{{ old('discount', $product->discount) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">@lang('words.Category'):</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category['name_' . \App::getLocale()] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">@lang('words.EditProduct')</button>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('js')
    <script>
        $('#title_uz').on('input', function() {
            translateText('title_uz', 'title_en', 'uz', 'en');
            translateText('title_uz', 'title_ru', 'uz', 'ru');
        });

        $('#desc_uz').on('input', function() {
            translateText('desc_uz', 'desc_en', 'uz', 'en');
            translateText('desc_uz', 'desc_ru', 'uz', 'ru');
        });
    </script>
@endsection
