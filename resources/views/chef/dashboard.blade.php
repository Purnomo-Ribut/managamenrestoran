@extends('chef.master.template')

@section('title', 'Dashboard Chef')

@section('css')

@endsection

@section('content')
    <div class="row">
        <!-- Profile Section -->
        <div class="col-12 col-md-3 w-100">
            <div class="card">
                <div class="card-body text-center">
                    <img class="card-img-top rounded-circle w-25" src="https://cdn-icons-png.flaticon.com/512/3461/3461980.png">
                    <h3>{{$profil->name}}</h3>
                </div>
            </div>
        </div>
        <!-- Profile Section End -->

        <div class="col-12 col-md-4">
            <div class="card dk l-bg-cherry card text-white bg-success">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-check-circle card-icon"></i></div>
                    <div class="mb-5">
                        <h5 class="card-title mb-0">Completed Orders</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$totalOrder}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Order Section -->
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column list-order" id="order-list">
                            <div class="card-body md-4 overflow-auto" style="max-height: 50rem;">
                                <table class="table" id="order-list-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$item->customer->name}}</td>
                                                <td>Detail: Menu yang diorder</td>
                                                <td>Selesai</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- List Order Section End -->

@endsection

{{-- Javascript --}}
@push('scripts')
  
@endpush
