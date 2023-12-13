@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Carousel Details</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('carousels.index') }}" class="btn btn-primary">Back to Carousels</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h3 mb-2 text-gray-800">Carousel Details</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><strong>Title:</strong></td>
                                    <td>{{ $carousel->title }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Description:</strong></td>
                                    <td>{{ $carousel->desc }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Image:</strong></td>
                                    <td>
                                        <img src="{{ asset('storage/carousels/' . $carousel->img) }}"
                                            alt="{{ $carousel->title }}" width="200" class="img-thumbnail">
                                    </td>
                                </tr>
                                <!-- Add more fields as needed -->
                                <tr>
                                    <td><strong>Created At:</strong></td>
                                    <td>{{ $carousel->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Updated At:</strong></td>
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
