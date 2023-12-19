@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.CompletedOrders')</h1>
        </div>
        <div class="col-12">
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-2">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>@lang('words.Name')</th>
                                    <th>@lang('words.TotalPrice')</th>
                                    <th>@lang('words.Status')</th>
                                    <th colspan="3">@lang('words.Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($completedOrders as $completedOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::substr($completedOrder['name'], 0, 8) }}...</td>
                                        <td>{{ Str::substr($completedOrder->total_price, 0, 8) }}... $</td>
                                        <td>@lang('words.Completed')</td>
                                        <td class="d-flex justify-content-center align-items-center" style="gap: 15px">
                                            <a href="{{ route('completedOrders.show', $completedOrder->id) }}"
                                                class="btn btn-primary btn-sm">@lang('words.Show')</a>
                                            <form action="{{ route('completedOrders.destroy', $completedOrder->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirm('Are you sure you want to delete?')">@lang('words.Delete')</button>
                                            </form>
                                            <!-- Add more actions as needed -->
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
