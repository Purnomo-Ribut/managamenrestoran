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
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Kode Orderan</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$order->customer->name}}</td>
                    <td>{{$order->order_code}}</td>
                    <td>{{$order->metode_pembayaran}}</td>
                    <td>{{$order->total}}</td>
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
