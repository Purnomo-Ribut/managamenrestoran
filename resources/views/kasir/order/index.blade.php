@extends('kasir.master.template')

@section('title', 'List Transaksi | ResToGo')

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
        <div class="card-body table-responsive ">
            <h3 class="text-center">Transaksi</h3>
            <table class="table table-bordered table-hover" id="order-table">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Customer</th>
                        <th scope="col" class="text-center">Kode Orderan</th>
                        <th scope="col" class="text-center">Metode</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row" class="text-center font-weight-bold" data-label="No">{{ $loop->index + 1 }}</td>
                            <td data-label="Customer">{{ $order->customer->name }}</td>
                            <td data-label="Kode Orderan" class="text-center">{{ $order->order_code }}</td>
                            <td data-label="Metode" class="text-center">{{ $order->metode_pembayaran }}</td>
                            <td data-label="Total" class="text-right">Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                            <td data-label="Tanggal">{{ $order->created_at->format('d M Y') }}</td>
                            {{-- <td>{{$order->total}}</td> --}}
                            <td data-label="Action" class="text-center">
                                <a href="{{ route('transaksi.detail', $order->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
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

        // responsive table
        // Mendapatkan elemen <table>
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
