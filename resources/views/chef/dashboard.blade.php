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
        }

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

       
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            min-width: 200px;
        }

        .dropdown-menu-right {
            right: 90;
            left: auto;
        }

    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12 col-md-9">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-tasks card-icon"></i> Pending Orders
                            </h5>
                            <p class="card-text">Check and process pending orders.</p>
                            <div class="card-value">10</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-white">
                                <i class="fas fa-spinner card-icon"></i> In Progress
                            </h5>
                            <p class="card-text text-white">View orders currently in progress.</p>
                            <div class="card-value text-white">15</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-check-circle card-icon"></i> Completed Orders
                            </h5>
                            <p class="card-text">Review completed orders.</p>
                            <div class="card-value">25</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
    <!-- Profile Section -->
    <div class="dropdown ml-auto">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="path/to/your/user-icon.png" alt="User Icon" class="user-icon">
            Chef Name <!-- Replace with the actual chef name -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
            <!-- Add profile information here, e.g., links to profile page, settings, etc. -->
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p>
                Welcome to your chef dashboard! Here, you can manage your orders and create new ones.
            </p>
        </div>
    </div>
</div>
        <div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="col-15">
                <div class="card border-warning">
                    <br>
                    <h5 class="card-title col-md-10 mb-1">
                        <i class="fas fa-tasks card-icon"></i> New Orders to Process
                    </h5>
                    <div class="card-body md-4 overflow-auto" style="max-height: 25rem;">
                        <ul class="order-list">
                            <li class="order-list-item">
                                <h6>Order #123</h6>
                                <p>Details: Lorem ipsum dolor sit amet.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #124</h6>
                                <p>Details: Consectetur adipiscing elit.</p>
                                <small>Received: 15 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #125</h6> 
                                <p>Details: Lorem ipsum dolor sit amet.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #126</h6>
                                <p>Details: Lorem ipsum dolor sit amet.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="col-15">
                <div class="card border-success mb-3">
                    <br>
                <h5 class="card-title col-md-10 mb-1">
                            <i class="fas fa-spinner card-icon"></i> orders that are being processed
                        </h5>
                        <div class="card-body md-4 overflow-auto" style="max-height: 25rem;">
                        <ul class="order-list">
                            <li class="order-list-item">
                                <h6>Order #123</h6>
                                <p>Details: Lorem ipsum dolor sit amet.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #124</h6>
                                <p>Details: Consectetur adipiscing elit.</p>
                                <small>Received: 15 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #125</h6> 
                                <p>Details: Consectetur adipiscing elit.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                            <li class="order-list-item">
                                <h6>Order #126</h6>
                                <p>Details: Consectetur adipiscing elit.</p>
                                <small>Received: 10 minutes ago</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Javascript --}}
@push('scripts')
    {{-- Add your custom scripts if needed --}}
@endpush
