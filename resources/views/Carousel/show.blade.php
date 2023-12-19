@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.Carousels')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('carousels.index') }}" class="btn btn-primary">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h3 mb-2 text-gray-800">@lang('words.Carousels')</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><strong>@lang('words.Title'):</strong></td>
                                    <td>{{ $carousel['title_' . \App::getLocale()] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.Description'):</strong></td>
                                    <td>{{ $carousel['desc_' . \App::getLocale()] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.Image'):</strong></td>
                                    <td>
                                        <img src="{{ asset('storage/carousels/' . $carousel->img) }}"
                                            alt="{{ $carousel['title_' . \App::getLocale()] }}" width="200"
                                            class="img-thumbnail">
                                    </td>
                                </tr>
                                <!-- Add more fields as needed -->
                                <tr>
                                    <td><strong>@lang('words.CreatedAt'):</strong></td>
                                    <td>{{ $carousel->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.UpdatedAt'):</strong></td>
                                    <td>{{ $carousel->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
