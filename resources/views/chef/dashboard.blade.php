@extends('chef.master.template')

@section('title', 'Dashboard Chef')

@section('css')
    {{-- Add your custom CSS if needed --}}
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }g

        .btn-create-order {
            background-color: #ffc107;
            color: #fff;
            border: none;
        }

        .card-icon {
            font-size: 2rem;
            margin-right: 10px;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .order-list {
            list-style: none;
            padding: 0;
        }

        .order-list-item {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 8px;
            padding: 10px;
        }

        .order-list-item h6 {
            margin-bottom: 5px;
        }

    </style>
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

        <div class="col-12 col-md-9">
            <div class="row">
                <!-- In Progress Orders -->
                <div class="col-12 col-md-6">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-white">
                                <i class="fas fa-spinner card-icon"></i> In Progress
                            </h5>
                            <p class="card-text text-white">View orders currently in progress.</p>
                            <div class="card-value text-white">{{$totalOrder}}</div>
                        </div>
                    </div>
                </div>

                <!-- Completed Orders -->
                <div class="col-12 col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-check-circle card-icon"></i> Completed Orders
                            </h5>
                            <p class="card-text">Review completed orders.</p>
                            <div class="card-value">{{$totalOrder}}</div>
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
                        <div class="d-flex flex-column w-200 list-order" id="order-list">
                            <div class="input-box mb-3">
                                <h5 class="card-title">
                                    <i class="fas fa-check-circle card-icon"></i> Completed Order
                                </h5>
                                <div class="card-body md-4 overflow-auto" style="max-height: 25rem;">
                                    <ul class="order-list">
                                        @foreach ($order as $item)
                                            <li class="order-list-item">
                                                <h6>{{$loop->index + 1}}</h6>
                                                <p>{{$item->customer->name}}</p>
                                                <small>Received: 10 minutes ago</small>
                                                <button class="btn btn-success btn-sm ml-2">Finish Cook</button>
                                            </li>
                                        @endforeach
                                        <br>
                                        <li class="order-list-item">
                                            <h6>Order #125</h6>
                                            <p>Details: Pizza       (1)
                                                        Americano   (1)
                                            </p>
                                            <small>Received: 10 minutes ago</small>
                                            <button class="btn btn-success btn-sm ml-2">Finish Cook</button>
                                        </li>
                                        <li class="order-list-item">
                                            <h6>Order #126</h6>
                                            <p>Details: Pizza Cheese      (2)
                                                        Cola 1L           (1)</p>
                                            <small>Received: 10 minutes ago</small>
                                            <button class="btn btn-success btn-sm ml-2">Finish Cook</button>
                                        </li>
                                        <li class="order-list-item">
                                            <h6>Order #127</h6>
                                            <p>Details: Pizza Cheese      (5)
                                                        Americano         (5)</p>
                                            <small>Received: 10 minutes ago</small>
                                            <button class="btn btn-success btn-sm ml-2">Finish Cook</button>
                                        </li>
                                        <li class="order-list-item">
                                            <h6>Order #128</h6>
                                            <p>Details: Pizza       (1)
                                                        Lemon Tea   (1)</p>
                                            <small>Received: 10 minutes ago</small>
                                            <button class="btn btn-success btn-sm ml-2">Finish Cook</button>
                                        </li>
                                    </ul>
                                </div>
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