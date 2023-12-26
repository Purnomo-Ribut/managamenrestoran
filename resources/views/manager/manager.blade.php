@extends('manager.master.template')

@section('title', 'Dashboard Manager | ResToGo')

@section('css')
<link rel="stylesheet" href="{{asset('assets/manager/css/style.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('assets/kasir/css/style.css') }}"> --}}
@endsection

@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card dk2 l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Pendapatan</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-7">
                                <h2 class="d-flex align-items-center mb-1" style="margin-top: 5px;">
                                    @if ($pendapatan > 10000000)
                                        <span style="font-size: 14px;">Rp {{ number_format($pendapatan, 0, ',', '.') }}</span>
                                    @else
                                        <span style="font-size: 16px;">Rp {{ number_format($pendapatan, 0, ',', '.') }}</span>
                                    @endif
                                </h2>

                            </div>
                            <div class="col-5 text-right ">
                                <span style="font-size: 14px">{{ $persendp }}% <i class="fa fa-arrow-up"></i></span>
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
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <h4 class="text-center">Data Pemasukan</h4>
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Customer</th>
                            <th scope="col" class="text-center">Total Harga</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        @if ($order->status_pembayaran === 'Sudah Dibayar')
                        <tr>
                            <td class="text-center font-weight-bold" data-label="No.">{{$loop->index + 1}}</td>
                            <td data-label="Customer">{{$order->customer_id ? $order->customer->name : '-'}}</td>
                            <td class="text-right" data-label="Total Harga">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td class="text-center" data-label="Aksi">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail{{$order->id}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

    @foreach ($orders as $order)
    <div class="modal fade" id="modalDetail{{$order->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detail Orderan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h2>Detail Orderan</h2>
                <ul>
                    <li><strong>Nama Customer: </strong>{{$order->customer_id ? $order->customer->name : '-'}}</li>
                    {{-- <li><strong>Kasir:</strong> Sarah Smith</li> --}}
                    <li><strong>Chef: </strong>{{$order->user_id ? $order->user->name : '-'}}</li>
                    <li><strong>Metode Pembayaran: </strong>{{$order->metode_pembayaran}}</li>
                    <li><strong>Total yang Dibeli: </strong>Rp {{ number_format($order->total, 0, ',', '.') }}</li>
                    <li><strong>Kode Pesanan: </strong>{{$order->order_code}}</li>
                    <li><strong>Waktu Beli: </strong>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, j F Y, H:i') }}</li>

                </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
            </div>
          </div>
        </div>
      </div>
    @endforeach

    @include('sweetalert::alert')
</body>
@endsection

{{-- Javascript --}}
@push('scripts')
<script>
    let table = new DataTable('#myTable');
</script>
@endpush
