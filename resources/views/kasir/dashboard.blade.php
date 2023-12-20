@extends('kasir.master.template')

@section('title', 'Dashboard kasir | ResToGo')

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
                    <div class="card dk l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Orderan Hari Ini</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $orderan }} 
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span>{{ $persenord}}% <i class="fa fa-arrow-up"></i></span>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="{{$persenord}}"
                                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $persenord}}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card dk l-bg-blue-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Pelanggan</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $pelanggan }}
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span>{{ $persenpl }}% <i class="fa fa-arrow-up"></i></span>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="{{ $persenpl }}"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $persenpl }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card dk l-bg-orange-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Pendapatan Sekarang</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-1" style="font-size: 25px; margin-top:5px;">
                                        Rp {{ number_format($pendapatan, 0, ',', '.') }}
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span>{{ $persendp }}% <i class="fa fa-arrow-up"></i></span>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="{{ $persendp }}"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $persendp }}%;"></div>
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
                                    <div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Meja</th>
                                                    <th scope="col">Pesanan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="order-list" class="list">
                                                @forelse ($ordersBelumDibayar as $belum) 
                                                    <tr>
                                                        <td class="text-center">
                                                            <b>{{ $belum->customer->no_table }}</b>
                                                        </td>
                                                        <td class="order-code">{{ $belum->order_code }}</td>
                                                        <td class="order-name">{{ $belum->customer->name }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('kasir.checkout', ['id' => $belum->customer->id]) }}"
                                                                class="btn btn-info text-light font-weight-bold">
                                                                <i class="fa-solid fa-cash-register"></i>
                                                            </a>
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
                                    <div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="transaction-list" class="list">
                                                @forelse ($ordersSudahDibayar as $sudah)
                                                    <tr>
                                                        <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                                        <td class="transaction-name">{{ $sudah->customer->name }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('transaksi.detail', ['id' => $sudah->id]) }}"
                                                                class="btn btn-info font-weight-bold">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted">Belum Ada
                                                            Transaksi.</td>
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

        {{-- konten daftar Chef --}}
        <div class="col-12 col-md-3">
            <a href="{{ route('reservasi') }}" class="btn btn-warning w-100 mb-3" style="font-size: 20px; padding: 15px; border-radius: 10px; text-align: center; color: #fff; text-decoration: none; ">
                Pesan Sekarang
            </a>
            
            <div class="card">
                <div class="card-body">
                    <div class="card-title w-100 ">
                        <h5 class="text-center font-weight-bold">Daftar Chef</h5>
                        <hr>
                    </div>
                    <div class="card-text">
                        @if (count($chef) > 0)
                            <table class="table table-borderless" style="margin-left: 12px;">
                                <tbody>
                                    @foreach ($chef as $item)
                                    <tr>
                                        <td>
                                            <b>{{ $loop->iteration }}</b>
                                        </td>
                                        <td>
                                            {{ ucwords($item->name) }}
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Hadir</span>
                                        </td>
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
    @include('sweetalert::alert')
@endsection

{{-- Javascript --}}
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        var orderlist = new List('order-list', {
            valueNames: ['order-code', 'order-name']
        });
        var transactionList = new List('transaction-list', {
            valueNames: ['transaction-name']
        });
    </script>
@endpush
