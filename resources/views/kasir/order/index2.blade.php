@extends('kasir.master.template')

@section('title', 'List Orderan')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('header', 'List Orderan')

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped" id="order-table">
            <thead>
                <tr class="bg-dark">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Kode Orderan</th>                    
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$loop->index + 1}}</th>
                    <td>{{$order->customer->name}}</td>
                    <td class="text-center">{{$order->order_code}}</td>                    
                    <td class="text-center">
                        {{-- hapus orderan --}}
                        <a href="{{route('order.hapus', ['id' => $order->id ])}}" class="btn btn-danger text-light font-weight-bold">Hapus</a>

                        {{-- bayar orderan --}}
                        <a href="{{ route('kasir.checkout', ['id' => $order->customer->id]) }}"
                            class="btn btn-info text-light font-weight-bold">Bayar</a>
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
