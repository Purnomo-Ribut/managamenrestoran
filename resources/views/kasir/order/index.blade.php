@extends('kasir.master.template')

@section('title', 'List Transaksi')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('header', 'List Transaksi')

@section('content')
<div class="card">
    <div class="card-body table-responsive ">
        <table class="table table-striped" id="order-table">
            <thead>
                <tr class="bg-dark">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Kode Orderan</th>
                    <th scope="col" class="text-center">Metode Pembayaran</th>
                    <th scope="col" class="text-center">Total Pembayaran</th>
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$loop->index + 1}}</th>
                    <td>{{$order->customer->name}}</td>
                    <td class="text-center">{{$order->order_code}}</td>
                    <td class="text-center">{{$order->metode_pembayaran}}</td>
                    <td >Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    {{-- <td>{{$order->total}}</td> --}}
                    <td class="text-center">
                        <a href="{{route('transaksi.detail', $order->id)}}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#order-table');
    </script>
@endpush
