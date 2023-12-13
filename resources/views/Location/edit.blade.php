@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Edit Location</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('locations.update', $location->id) }}"
                    method="post" novalidate="">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $location->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" name="number" id="number" class="form-control"
                                value="{{ $location->number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $location->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="location" id="location" class="form-control"
                                value="{{ $location->location }}" required>
                        </div>
                        <!-- Add more fields as needed -->

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Update Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
