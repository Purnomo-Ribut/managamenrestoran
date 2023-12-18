@extends('manager.master.template')

@section('title', 'Dashboard Manager')

@section('css')
<link rel="stylesheet" href="{{asset('assets/manager/css/style.css')}}">
@endsection

@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-header">
                        <i class="fas fa-dollar-sign"></i> Total Pendapatan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@rupiah($totalHarga)</h5>
                        <p class="card-text">Ini adalah jumlah pendapatan yang diperoleh</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Total harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$order->customer_id ? $order->customer->name : '-'}}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{route('order.detail', $order->id)}}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
@endsection

{{-- Javascript --}}
@push('scripts')
<script>
    let table = new DataTable('#myTable');
  </script>
@endpush
