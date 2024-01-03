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
                            <input id="title_uz" type="text" name="title_uz" value="{{ old('title_uz') }}"
                                class="form-control" required="" placeholder="Title uz">
                            <div class="invalid-feedback">
                                What's the product title?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Title')</label>
                            <input id="title_ru" type="text" name="title_ru" value="{{ old('title_ru') }}"
                                class="form-control" required="" placeholder="Title ru">
                            <div class="invalid-feedback">
                                What's the product title?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Title')</label>
                            <input id="title_en" type="text" name="title_en" value="{{ old('title_en') }}"
                                class="form-control" required="" placeholder="Title en">
                            <div class="invalid-feedback">
                                What's the product title?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Description')</label>
                            <input id="desc_uz" type="text" name="desc_uz" value="{{ old('desc_uz') }}"
                                class="form-control" required="" placeholder="Description uz">
                            <div class="invalid-feedback">
                                What's the product description?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Description')</label>
                            <input id="desc_ru" type="text" name="desc_ru" value="{{ old('desc_ru') }}"
                                class="form-control" required="" placeholder="Description ru">
                            <div class="invalid-feedback">
                                What's the product description?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Description')</label>
                            <input id="desc_en" type="text" name="desc_en" value="{{ old('desc_en') }}"
                                class="form-control" required="" placeholder="Description en">
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
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                required="" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Discount')</label>
                            <input type="number" name="discount" value="{{ old('discount', 0) }}" class="form-control"
                                placeholder="Discount">
                        </div>

                        <select name="category_id" class="form-control">
                            <option value="" selected disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category['name_' . \App::getLocale()] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">@lang('words.CreateProduct')</button>
                    </div>
                </form>
            </div>
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
