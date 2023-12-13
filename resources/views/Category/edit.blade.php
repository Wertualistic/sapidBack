@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h1>Edit Category</h1>
            </div>
            <div class="text-right mb-3">
                <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">Back</a>
            </div>
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('categories.update', $category->id) }}"
                    method="post" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required
                                placeholder="Category Name">
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
