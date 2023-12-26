<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian | ResToGo</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/manager/img/restogo.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/kasir/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <style>
        body {
            margin-top: 20px;
            color: #484b51;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .page-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: black;
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .page-title a {
            color: black;
        }

        .order-info span {
            display: block;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }
        
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            background-color: #333;
            color: #fff;
        }

        .text-right {
            text-align: right;
        }

        .thank-you {
            font-size: 1rem;
            margin-top: 20px;
            text-align: center;
        }

        /* .back-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #478fcc;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
        } */
        @media print {
            @page {
                size: 25cm 20cm;                
            }
        }
    </style>
</head>

<body>
    @foreach ($orders as $order)
        <div class="container">
            <div class="page-content">
                <a href="{{ route('kasir.dashboard') }}">
                    <h2>ResToGo</h2>
                </a>
                <div class="page-title">
                    {{ $order->order_code }}
                </div>

                {{-- kebutuhan waktu --}}
                @php
                    $waktu = $order->created_at;
                @endphp

                <div class="order-info">

                    <div class="row">
                        <div class="col-lg-6">
                            <span>To {{ $order->customer->name }}</span>
                            <span>Meja {{ $order->customer->no_table }}</span>
                        </div>
                        <div class="col-lg-6 text-right">
                            <span>Kasir {{ auth()->user()->name }}</span>
                            <span>{{ $waktu->format('Y-m-d H:i:s') }}</span>
                        </div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr class="text-center">
                            <th>Menu</th>                            
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $order)
                            <tr>
                                <td>{{ $order->nama }}</td>                            
                                <td class="text-center">{{ $order->qty }}</td>
                                <td class="text-right">Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                @php
                                    $jumlah = $order->qty * $order->harga;
                                @endphp
                                <td class="text-right">Rp {{ number_format($jumlah, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        {{-- total harga --}}
                        @php
                            $totalHarga = 0;
                        @endphp

                        @foreach ($data as $harga)
                            @php
                                $totalHarga += $harga->price;
                            @endphp
                        @endforeach
                        <tr class="total-row">
                            <td colspan="3" class="text-right">Total</td>
                            <td class="text-right">Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="thank-you">
                    <p>Terima Kasih Telah Membeli Makanan dan Minuman Kami</p>
                </div>

                {{-- <a href="{{ route('kasir.dashboard') }}" class="back-btn" id="hai"
                    style="display: none">Kembali</a> --}}
            </div>
        </div>
    @endforeach

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/kasir/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('assets/kasir/js/adminlte.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>


</html>
