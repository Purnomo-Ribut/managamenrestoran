@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/kasir/css/style.css') }}">
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
                <div class="col-12 col-lg-6">
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
                                    <div class="list">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Meja</th>
                                                    <th scope="col">Pesanan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($ordersBelumDibayar as $belum)
                                                    <tr>
                                                        <td class="text-center">
                                                            <b>{{ $belum->customer->no_table }}</b>
                                                        </td>
                                                        <td class="order-name">{{ $belum->order_code }}</td>
                                                        <td class="order-name">{{ $belum->customer->name }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('kasir.checkout', ['id' => $belum->customer->id]) }}"
                                                                class="btn btn-info text-light font-weight-bold">Bayar</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted">Tidak ada Orderan
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
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
                                    <div class="list">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($ordersSudahDibayar as $sudah)
                                                    <tr>
                                                        <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                                        <td class="transaction-name">{{ $sudah->customer->name }}</td>
                                                        <td class="text-center">
                                                            <a href="#"
                                                                class="btn btn-info font-weight-bold">Detail</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted">Belum Ada Transaksi.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <a href="{{ route('reservasi') }}" class="btn btn-warning w-100 mb-3">Buat pesanan</a>
            <div class="card">
                <div class="card-body">
                    <div class="card-title w-100 ">
                        <h5 class="text-center font-weight-bold">Daftar Chef</h5>
                        <hr>
                    </div>
                    <div class="card-text">
                        @if (count($chef) > 0)
                            <table class="table table-borderless">                                
                                <tbody>
                                    @foreach ($chef as $item)
                                        <tr>
                                            <td class="w-25 ">
                                                <img src="{{ asset('assets/kasir/img/user2-160x160.jpg') }}" alt="chef"
                                                    class="w-100 rounded-circle">
                                            </td>
                                            <td class="">{{ $item->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted text-center">Tidak ada data chef.</p>
                        @endif
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
