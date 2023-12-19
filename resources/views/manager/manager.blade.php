@extends('manager.master.template')

@section('title', 'Dashboard Manager')

@section('css')
<link rel="stylesheet" href="{{asset('assets/manager/css/style.css')}}">
<link rel="stylesheet" href="{{ asset('assets/kasir/css/style.css') }}">
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
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Customer</th>
                            <th scope="col" class="text-center">Total harga</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row" class="text-center">{{$loop->index + 1}}</th>
                            <td>{{$order->customer_id ? $order->customer->name : '-'}}</td>
                            <td class="text-center">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td class="text-center">
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
