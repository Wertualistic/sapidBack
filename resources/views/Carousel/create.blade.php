@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Create Carousel</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('carousels.store') }}" method="post"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('words.Titleuz')</label>
                            <input type="text" name="title_uz" id="title_uz" value="{{ old('title_uz') }}"
                                class="form-control" required="" placeholder="Title uz">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Titleru')</label>
                            <input type="text" name="title_ru" id="title_ru" value="{{ old('title_ru') }}"
                                class="form-control" required="" placeholder="Title ru">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Titleen')</label>
                            <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}"
                                class="form-control" required="" placeholder="Title en">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Descriptionuz')</label>
                            <input type="text" name="desc_uz" id="desc_uz" value="{{ old('desc_uz') }}" class="form-control"
                                required="" placeholder="Description uz">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Descriptionru')</label>
                            <input type="text" name="desc_ru" id="desc_ru" value="{{ old('desc_ru') }}" class="form-control"
                                required="" placeholder="Description ru">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Descriptionen')</label>
                            <input type="text" name="desc_en" id="desc_en" value="{{ old('desc_en') }}" class="form-control"
                                required="" placeholder="Description en">
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="mb-3 custom-file-input" name="img" id="customFile">
                            <label class="custom-file-label" for="customFile ">Choose file</label>

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">@lang('words.Create')</button>
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
