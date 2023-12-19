@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h1>@lang('words.EditCategory')</h1>
            </div>
            <div class="text-right mb-3">
                <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">@lang('words.Back')</a>
            </div>
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('categories.update', $category->id) }}"
                    method="post" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('words.Name')</label>
                            <input type="text" name="name" value="{{ $category['name_' . \App::getLocale()] }}"
                                class="form-control" required placeholder="Category Name">
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
