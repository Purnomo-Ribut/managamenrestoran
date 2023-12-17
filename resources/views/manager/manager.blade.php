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
    <div class="row">
      <div class="col-12">
        <hr>
        <h5>Monitoring data pelanggan</h5>
        <hr>
        <table class="table">
          <thead>
              <tr>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Total Harga</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td>{{$order->customer_id ? $order->customer->name : '-'}}</td>
                <td>{{$order->total}}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
</body>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush
