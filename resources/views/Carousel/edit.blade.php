@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Edit Carousel</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('carousels.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="needs-validation" autocomplete="off" action="{{ route('carousels.update', $carousel->id) }}"
                    method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $carousel->title }}" required>
                            <div class="invalid-feedback">
                                Please provide a title.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <input type="text" name="desc" id="desc" class="form-control"
                                value="{{ $carousel->desc }}" required>
                            <div class="invalid-feedback">
                                Please provide a description.
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="mb-3 custom-file-input @error('image') is-invalid @enderror"
                                name="img" id="customFile">
                            <label class="custom-file-label" for="customFile ">Choose file</label>
                            <img src="{{ asset('/storage/carousels/' . $carousel->img) }}" width="200" alt="">
                            <div class="invalid-feedback">
                                Please upload a valid image file.
                            </div>
                        </div>
                        <!-- Add more fields as needed -->

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Update Carousel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
