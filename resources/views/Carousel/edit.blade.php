@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.EditCarousel')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('carousels.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('carousels.update', $carousel->id) }}"
                    method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title_uz">@lang('words.Titleuz'):</label>
                            <input type="text" name="title_uz" id="title_uz" class="form-control"
                                value="{{ $carousel['title_uz'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title_ru">@lang('words.Titleru'):</label>
                            <input type="text" name="title_ru" id="title_ru" class="form-control"
                                value="{{ $carousel['title_ru'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title_en">@lang('words.Titleen'):</label>
                            <input type="text" name="title_en" id="title_en" class="form-control"
                                value="{{ $carousel['title_en'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="desc_uz">@lang('words.Descriptionuz'):</label>
                            <input type="text" name="desc_uz" id="desc_uz" class="form-control"
                                value="{{ $carousel['desc_uz'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="desc_ru">@lang('words.Descriptionru'):</label>
                            <input type="text" name="desc_ru" id="desc_ru" class="form-control"
                                value="{{ $carousel['desc_ru'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="desc_en">@lang('words.Descriptionen'):</label>
                            <input type="text" name="desc_en" id="desc_en" class="form-control"
                                value="{{ $carousel['desc_en'] }}" required>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="mb-3 custom-file-input @error('image') is-invalid @enderror"
                                name="img" id="customFile">
                            <label class="custom-file-label" for="customFile ">Choose file</label>
                            <img src="{{ asset('/storage/carousels/' . $carousel->img) }}" width="200" alt="">
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">@lang('words.Update')</button>
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
