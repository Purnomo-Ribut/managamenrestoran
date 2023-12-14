@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
<link rel="stylesheet" href="{{asset('assets/kasir/css/style.css')}}">
@endsection

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card bg-primary position-relative">
                    <div class="card-body">
                        <h5 class="card-title">Total pesanan</h5>
                        <div class="icon">
                            <i class="fa-regular fa-note-sticky" style="color: #000000;"></i>
                        </div>
                        <div class="card-text">
                            <h3 class="pt-3">80</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card bg-info position-relative">
                    <div class="card-body">
                        <h5 class="card-title">Total pesanan</h5>
                        <div class="icon">
                            <i class="fa-regular fa-note-sticky" style="color: #000000;"></i>
                        </div>
                        <div class="card-text">
                            <h3 class="pt-3">80</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card bg-secondary position-relative">
                    <div class="card-body">
                        <h5 class="card-title">Total pesanan</h5>
                        <div class="icon">
                            <i class="fa-regular fa-note-sticky" style="color: #000000;"></i>
                        </div>
                        <div class="card-text">
                            <h3 class="pt-3">80</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>List Order</h4>
                        </div>
                        <div class="card-text">
                            <div class="d-flex flex-column w-100 list-order" id="order-list">
                                <div class="input-box mb-3">
                                    <input type="search" class="form-control fuzzy-search" placeholder="Search...">
                                </div>
                                <div class="list d-flex flex-column">
                                    @foreach ($ordersBelumDibayar as $order) 
                                    {{-- @foreach ($orders as $order) --}}
                                    <div class="row align-items-center w-100">
                                        <div class="col-3 position-relative">
                                            <div class="table-box bg-success">
                                                {{$order->customer->no_table}}
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="order-name">{{$order->customer->name}}</p>
                                        </div>
                                        <div class="col-4">
                                            <div><a href="{{ route('kasir.checkout', ['id' => $order->customer->id]) }}"class="btn btn-warning" > Pay now</a> </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>List Transaksi</h4>
                        </div>
                        <div class="card-text">
                            <div class="d-flex flex-column w-100 list-order" id="transaction-list">
                                <div class="input-box mb-3">
                                    <input type="search" class="form-control fuzzy-search" placeholder="Search...">
                                </div>
                                <div class="list d-flex flex-column">
                                    @foreach ($ordersSudahDibayar as $order) 
                                    <div class="row align-items-center w-100">
                                        <div class="col-3 position-relative">                                            
                                            <div class="table-box bg-success">
                                                {{$order->customer->no_table}}
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="transaction-name">{{$order->customer->name}}</p>
                                        </div>
                                        <div class="col-4">
                                            <div ><a href="#" class="btn btn-info"> Detail</a> </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <a href="#" class="btn btn-warning w-100 mb-3">Buat pesanan</a>
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-3">
                    <h5>Daftar Chef</h5>
                </div>
                <div class="card-text">
                    @foreach ($chef as $item)
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('assets/kasir/img/user2-160x160.jpg')}}" alt="chef"
                                class="w-100 rounded-circle">
                        </div>
                        <div class="col-9">
                            <p>{{$item->name}}</p>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Javascript --}}
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var orderlist = new List('order-list', {
        valueNames: ['order-name']
    });
    var transactionList = new List('transaction-list', {
        valueNames: ['transaction-name']
    });

</script>
@endpush
