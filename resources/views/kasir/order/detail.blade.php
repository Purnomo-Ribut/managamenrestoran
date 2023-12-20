@extends('kasir.master.template')

@section('title', 'Detail Transaksi | ResToGo')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('header', '')

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <h3 class="text-center mb-4">Detail Transaksi</h3>        
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>ID Pesanan</strong> <br> 
                    {{ $order->order_code }}
                </p>
            </div>
            <div class="col-md-6 text-md-right">
                <p><strong>Tanggal Pesanan </strong> <br> 
                    {{ $order->created_at->format('d M Y H:i:s') }}
                </p>
            </div>
        </div>

        <table class="table table-striped" id="myTable">
            <thead>
                <tr class="bg-dark">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Ketegori</th>
                    <th scope="col" class="text-center">Nama Menu</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    <th scope="col" class="text-center">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $orderDetail)
                    {{-- {{dd($orderDetail->menu)}} --}}
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                        <td>{{ $orderDetail->menu->kategori ? $orderDetail->menu->kategori->nama : '-' }}</td>
                        <td>{{ $orderDetail->menu->nama }}</td>
                        <td class="text-right">@rupiah($orderDetail->menu->harga)</td>
                        <td>{{ $orderDetail->menu->deskripsi }}</td>
                        <td class="text-center">
                            <img src="{{ $orderDetail->menu->image ? asset('storage/assets/manager/gambarMenu/' . $orderDetail->menu->image) : asset('assets/img/no-image.png') }}"
                                alt="gambarmenu" style="max-width: 100px; max-height: 100px;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-left">
            <a href="{{ route('transaksi.list') }}" class="btn btn-info mt-3">Kembali</a>
        </div>
    </div>
</div>

@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush
