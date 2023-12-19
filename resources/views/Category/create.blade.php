@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Create Category</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('categories.store') }}" method="post"
                    enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name_uz" value="{{ old('name_uz') }}" class="form-control"
                                id="name_uz" required placeholder="Category Name_uz">
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control"
                                id="name_ru" required placeholder="Category Name_ru">
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control"
                                id="name_en" required placeholder="Category Name_en">
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#name_uz').on('input', function() {
            translateText('name_uz', 'name_en', 'uz', 'en');
            translateText('name_uz', 'name_ru', 'uz', 'ru');
        });

        $('#address_uz').on('input', function() {
            translateText('address_uz', 'address_en', 'uz', 'en');
            translateText('address_uz', 'address_ru', 'uz', 'ru');
        });
    </script>
@endsection
