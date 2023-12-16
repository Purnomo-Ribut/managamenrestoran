@extends('manager.master.template')

@section('title', 'Dashboard Manager')

@section('css')
<link rel="stylesheet" href="{{asset('assets/manager/css/style.css')}}">
@endsection

@section('content')
<body>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <div class="card bg-success text-white">
            <div class="card-header">
                Pendapatan Bulan Ini
            </div>
            <div class="card-body">
                <h5 class="card-title">Rp 1.000.000</h5>
                <p class="card-text">Ini adalah jumlah pendapatan yang diperoleh pada bulan ini.</p>
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
                  <th scope="col">Menu Yang Dibeli</th>
                  <th scope="col">Total Harga</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                
                  <td>John Doe</td>
                  <td>Item A, Item B</td>
                  <td>$150</td>
              </tr>
              <tr>
                  <td>Jane Smith</td>
                  <td>Item C, Item D, Item E</td>
                  <td>$300</td>
              </tr>
              <!-- Tambahkan baris sesuai dengan data yang ingin ditampilkan -->
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
