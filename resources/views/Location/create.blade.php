@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Create Location</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('locations.store') }}" method="post"
                    novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                required="" placeholder="Title">
                            <div class="invalid-feedback">
                                What's the title?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number</label>
                            <input type="text" name="number" value="{{ old('number') }}" class="form-control"
                                required="" placeholder="Number">
                            <div class="invalid-feedback">
                                What's the number?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                required="" placeholder="Email">
                            <div class="invalid-feedback">
                                What's the email?
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control"
                                required="" placeholder="Location">
                            <div class="invalid-feedback">
                                What's the location?
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
