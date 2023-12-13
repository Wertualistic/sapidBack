@extends('layouts.site')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>Show Category Details</h1>
            </div>
            <div class="text-right mb-3">
                <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">Back</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>ID:</strong></td>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Created At:</strong></td>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Updated At:</strong></td>
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
