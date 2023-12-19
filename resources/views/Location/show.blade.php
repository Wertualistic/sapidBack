@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.Locations')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-primary">@lang('words.Back')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h3 mb-2 text-gray-800">@lang('words.Locations')</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><strong>@lang('words.Title'):</strong></td>
                                    <td>{{ $location['title_' . \App::getLocale()] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.PhoneNumber'):</strong></td>
                                    <td>{{ $location->number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.Email'):</strong></td>
                                    <td>{{ $location->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.Locations'):</strong></td>
                                    <td>{{ $location['location_' . \App::getLocale()] }}</td>
                                </tr>
                                <!-- Add more fields as needed -->
                                <tr>
                                    <td><strong>@lang('words.CreatedAt'):</strong></td>
                                    <td>{{ $location->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.UpdatedAt'):</strong></td>
                                    <td>{{ $location->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
