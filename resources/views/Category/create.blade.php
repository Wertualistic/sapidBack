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
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required
                                placeholder="Category Name">
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
