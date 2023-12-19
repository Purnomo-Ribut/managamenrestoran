@extends('kasir.master.template')

@section('title', 'List Order')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('header', 'List Order')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="order-table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Kode Orderan</th>
                    <th scope="col" class="text-center">Metode Pembayaran</th>
                    <th scope="col" class="text-center">Total Pembayaran</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$order->customer->name}}</td>
                    <td class="text-center">{{$order->order_code}}</td>
                    <td class="text-center">{{$order->metode_pembayaran}}</td>
                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    {{-- <td>{{$order->total}}</td> --}}
                    <td>
                        <a href="{{route('order.detail', $order->id)}}" class="btn btn-info">Detail</a>
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
