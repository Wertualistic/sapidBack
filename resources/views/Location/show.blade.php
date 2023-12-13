@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Location Details</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-primary">Back to Locations</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="h3 mb-2 text-gray-800">Location Details</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><strong>Title:</strong></td>
                                    <td>{{ $location->title }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Number:</strong></td>
                                    <td>{{ $location->number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $location->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td>{{ $location->location }}</td>
                                </tr>
                                <!-- Add more fields as needed -->
                                <tr>
                                    <td><strong>Created At:</strong></td>
                                    <td>{{ $location->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Updated At:</strong></td>
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
