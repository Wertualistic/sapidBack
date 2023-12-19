@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.CreateLocation')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('locations.store') }}" method="post"
                    novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('words.Titleuz')</label>
                            <input type="text" name="title_uz" value="{{ old('title_uz') }}" id="title_uz"
                                class="form-control" required="" placeholder="Title_uz">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Titleru')</label>
                            <input type="text" name="title_ru" value="{{ old('title_ru') }}" id="title_ru"
                                class="form-control" required="" placeholder="Title_ru">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Titleen')</label>
                            <input type="text" name="title_en" value="{{ old('title_en') }}" id="title_en"
                                class="form-control" required="" placeholder="Title_en">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.PhoneNumber')</label>
                            <input type="number" name="number" value="{{ old('number') }}" class="form-control"
                                required="" placeholder="Number">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Email')</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                required="" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Locationuz')</label>
                            <input type="text" name="location_uz" value="{{ old('location_uz') }}" id="location_uz"
                                class="form-control" required="" placeholder="Location_uz">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Locationru')</label>
                            <input type="text" name="location_ru" value="{{ old('location_ru') }}" id="location_ru"
                                class="form-control" required="" placeholder="Location_ru">
                        </div>
                        <div class="form-group">
                            <label>@lang('words.Locationen')</label>
                            <input type="text" name="location_en" value="{{ old('location_en') }}" id="location_en"
                                class="form-control" required="" placeholder="Location_en">
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

        $('#location_uz').on('input', function() {
            translateText('location_uz', 'location_en', 'uz', 'en');
            translateText('location_uz', 'location_ru', 'uz', 'ru');
        });
    </script>
@endsection
