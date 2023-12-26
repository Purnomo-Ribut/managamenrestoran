@extends('kasir.master.template')

@section('title', 'List Orderan | ResToGo')

@section('css')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
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
            <h3 class="text-center">Orderan</h3>
            <table class="table table-bordered table-hover" id="order-table">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Customer</th>
                        <th scope="col" class="text-center">Kode Orderan</th>
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td data-label="No" scope="row" class="text-center">{{ $loop->index + 1 }}</td>
                            <td data-label="Customer">{{ $order->customer->name }}</td>
                            <td data-label="Kode Orderan" class="text-center">{{ $order->order_code }}</td>
                            <td data-label="Tanggal" >{{ $order->created_at->format('d M Y') }}</td>
                            <td  data-label="Action" class="text-center">
                                {{-- hapus orderan --}}
                                <a onclick="confirmDelete(this)" data-url="{{ route('order.hapus', ['id' => $order->id]) }}"
                                    class="btn btn-danger" role="button">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                {{-- bayar orderan --}}
                                <a href="{{ route('kasir.checkout', ['id' => $order->customer->id]) }}"
                                    class="btn btn-info text-light font-weight-bold">
                                    <i class="fa-solid fa-cash-register"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#order-table');

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
