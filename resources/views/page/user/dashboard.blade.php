@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @forelse ($checkout as $data)
                            <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('assets/images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $data->camp->title }}</strong>
                                </p>
                                <p>
                                    {{ $data->created_at->format('M d, Y') }}
                                </p>
                            </td>
                            <td>
                                <strong>${{ $data->camp->price }}</strong>
                            </td>
                            <td>
                                @if ($data->is_paid)
                                    <strong class="text-success">Success</strong>
                                @else
                                    <strong class="text-warning">Waiting for Payment</strong>
                                @endif
                            </td>
                            <td>
                                <a href="https://wa.me/+6281311745927?text=Hi, saya ingin membayar kelas yang telah saya beli." class="btn btn-primary" target="_blank">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center text-primary">No Data Yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
@endsection