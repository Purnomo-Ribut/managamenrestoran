@extends('kasir.master.template')

@section('title', 'Detail Transaksi | ResToGo')

@section('css')
    {{-- <link rel="stylesheet" href=""> --}}
    <style>
        @media (max-width: 500px) {
            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 15px;
                border-top: 1px solid black;
                /* Warna, ketebalan, dan jenis garis dapat disesuaikan */
                border-bottom: 1px solid black;
            }

            .table td {
                text-align: right;
                border: none;
                width: 95%
            }

            .table tr:nth-child(odd) {
                background-color: #e0e0e0;
                /* Warna abu-abu untuk elemen ganjil */
            }

            .table tr:nth-child(even) {
                background-color: #f0f0f0;
                /* Warna abu-abu terang untuk elemen genap */
            }



            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-size: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>

@endsection

@section('header', '')

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <h3 class="text-center mb-4">Detail Transaksi</h3>
            <div class="row mb-3">
                <div class="col-6">
                    <p><strong>ID Pesanan</strong> <br>
                        {{ $order->order_code }}
                    </p>
                </div>
                <div class="col-6 text-right">
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
                            <td data-label="No"scope="row" class="text-center">{{ $loop->index + 1 }}</td>
                            <td data-label="Kategori">
                                {{ $orderDetail->menu->kategori ? $orderDetail->menu->kategori->nama : '-' }}</td>
                            <td data-label="Nama Menu">{{ $orderDetail->menu->nama }}</td>
                            <td data-label="Harga" class="text-right">@rupiah($orderDetail->menu->harga)</td>
                            <td data-label="Deskripsi">{{ $orderDetail->menu->deskripsi }}</td>
                            <td data-label="Gambar" class="text-center">
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

        const tableElement = document.querySelector('.table');
        const textCenterTdElements = document.querySelectorAll('.table td.text-center');

        // Fungsi untuk menyesuaikan kelas pada elemen <td> dan <table>
        function adjustLayout() {
            const windowWidth = window.innerWidth;

            // Jika lebar layar kurang dari atau sama dengan 500px
            if (windowWidth <= 500) {
                // Hapus kelas text-center dari elemen <td>
                textCenterTdElements.forEach(td => {
                    td.classList.remove('text-center');
                });

                // Hapus kelas table-striped dari elemen <table>
                tableElement.classList.remove('table-striped');
            } else {
                // Jika lebar layar lebih dari 500px, tambahkan kembali kelas yang dihapus sebelumnya
                textCenterTdElements.forEach(td => {
                    td.classList.add('text-center');
                });

                tableElement.classList.add('table-striped');
            }
        }

        // Panggil fungsi pertama kali saat dokumen dimuat
        adjustLayout();

        // Tambahkan event listener untuk menanggapi perubahan ukuran layar
        window.addEventListener('resize', adjustLayout);
    </script>
@endpush
