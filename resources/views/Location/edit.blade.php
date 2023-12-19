@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.EditLocation')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('locations.update', $location->id) }}"
                    method="post" novalidate="">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title_uz">@lang('words.Titleuz'):</label>
                            <input type="text" name="title_uz" id="title_uz" class="form-control"
                                value="{{ $location['title_uz'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title_ru">@lang('words.Titleru'):</label>
                            <input type="text" name="title_ru" id="title_ru" class="form-control"
                                value="{{ $location['title_ru'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title_en">@lang('words.Titleen'):</label>
                            <input type="text" name="title_en" id="title_en" class="form-control"
                                value="{{ $location['title_en'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" name="number" id="number" class="form-control"
                                value="{{ $location->number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $location->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location_uz">@lang('words.Locationuz'):</label>
                            <input type="text" name="location_uz" id="location_uz" class="form-control"
                                value="{{ $location['location_uz'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location_ru">@lang('words.Locationru'):</label>
                            <input type="text" name="location_ru" id="location_ru" class="form-control"
                                value="{{ $location['location_ru'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location_en">@lang('words.Locationen'):</label>
                            <input type="text" name="location_en" id="location_en" class="form-control"
                                value="{{ $location['location_en'] }}" required>
                        </div>
                        <!-- Add more fields as needed -->

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

        $('#location_uz').on('input', function() {
            translateText('location_uz', 'location_en', 'uz', 'en');
            translateText('location_uz', 'location_ru', 'uz', 'ru');
        });
    </script>
@endsection
