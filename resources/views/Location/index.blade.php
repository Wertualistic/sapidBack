@extends('layouts.site')

@section('content')
    <div class="row col-12">
        <div class="col-12 text-center">
            <h1>Location Table</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a href="{{ route('locations.create') }}" class="btn btn-success btn-sm">Create</a>
        </div>
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Title</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ Str::substr($location->title, 0, 8) }}...</td>
                                        <td>{{ Str::substr($location->number, 0, 8) }}...</td>
                                        <td>{{ Str::substr($location->email, 0, 8) }}...</td>
                                        <td>{{ Str::substr($location->location, 0, 8) }}...</td>
                                        <td class="d-flex justify-content-center align-items-center" style="gap: 15px">
                                            <a href="{{ route('locations.show', $location->id) }}"
                                                class="btn btn-primary btn-sm">Show</a>
                                            <a href="{{ route('locations.edit', $location->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('locations.destroy', $location->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirm('Are you want to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
