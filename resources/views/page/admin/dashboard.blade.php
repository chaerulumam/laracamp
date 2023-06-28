@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Camps</h4>
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($checkout as $data)
                                    <tr>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->camp->title }}</td>
                                        <td>{{ $data->camp->price }}</td>
                                        <td>{{ $data->created_at->format('d M, Y') }}</td>
                                        <td>
                                            @if ($data->is_paid)
                                            <span class="badge bg-success">paid</span>
                                            @else
                                            <span class="badge bg-warning">waiting</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$data->is_paid)
                                                <form action="{{ route('admin.checkout.update', $data->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Set to Paid</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data camp registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection