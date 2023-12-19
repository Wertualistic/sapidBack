@extends('layouts.site')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>@lang('words.CategoryDetails')</h1>
            </div>
            <div class="text-right mb-3">
                <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>@lang('words.Id'):</strong></td>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.Name'):</strong></td>
                                    <td>{{ $category['name_' . \App::getLocale()] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.CreatedAt'):</strong></td>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>@lang('words.UpdatedAt'):</strong></td>
                                    <td>{{ $category->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
