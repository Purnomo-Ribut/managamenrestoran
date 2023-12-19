<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pembelian</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/kasir/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }



        

    </style>
</head>

<body>
    <br><br>
    @foreach ($orders as $order)
    <div class="page-content container">
        <h2 class="text-center"><b>ResToGo</b></h2>
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                ID Pesanan
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    <b>{{ $order->order_code }}</b>
                </small>
            </h1>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Untuk :</span>
                                <span class="text-600 text-110 text-blue align-middle">{{ $order->customer->name }}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    No Meja : <b>{{ $order->customer->no_table }}</b>
                                </div>
                                <div class="my-1">

                                </div>
                                <div class="my-1"> <b class="text-600"></b></div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">

                                </div>

                                <div class="my-2"> 
                                    {{-- <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>  --}}
                                    <span
                                        class="text-600 text-90">Kasir : </span> <span
                                        class="badge badge-warning badge-pill px-25">{{ auth()->user()->name }}</span>
                                </div>

                                @php
                                    $waktu    = $order->created_at;

                                @endphp
                                <div class="my-2">
                                    {{-- <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>  --}}
                                    <span
                                        class="text-600 text-90">Jam : </span> 
                                        {{ $waktu->format('H:i')}}
                                    </div>

                                <div class="my-2">
                                    {{-- <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>  --}}
                                    <span
                                        class="text-600 text-90">Tanggal : </span> 
                                        {{ $waktu->format('Y-m-d') }}
                                    </div>


                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    @endforeach
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered border-0 border-b-2 brc-default-l1">
                                <thead class="bg-none bgc-default-tp1">
                                    <tr class="text-white text-center" style=" background-color: rgba(121, 169, 197, .92) !important;">
                                        <th class="w-25">Menu</th>
                                        <th>Deskipsi</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th width="140">Jumlah</th>
                                    </tr>
                                </thead>

                                <tbody class="text-95 text-secondary-d3">
                                    <tr></tr>
                                    @foreach ($data as $order)
                                    <tr>
                                        <td>{{ $order->nama }}</td>
                                        <td>
                                            @if ($order->description)
                                                {{ $order->description }}
                                            @else
                                                <span class="text-muted"> - </span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $order->qty }}</td>
                                        <td class="text-95 text-center">Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                        @php
                                            $jumlah = $order->qty  * $order->harga;
                                        @endphp
                                        <td class="text-secondary-d2 text-right">Rp {{ number_format($jumlah, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="font-weight-bold text-white" style=" background-color: rgba(36, 53, 61, 0.92) !important;">
                                        <td colspan="3"></td>
                                        <td class="text-right">Total</td>
                                        @php
                                            $totalHarga = 0;
                                        @endphp

                                        @foreach ($data as $harga)
                                            @php
                                                $totalHarga += $harga->price;
                                            @endphp
                                        @endforeach
                                        <td class="text-right">Rp {{ number_format($totalHarga , 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                                                              

                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="text-secondary-d1 text-105">Terima Kasih Telah Membeli Makanan dan Minuman Kami </span>                            
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('kasir.dashboard') }}" id="hai" class="btn btn-info w-25" style="display: none">Kembali</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/kasir/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('assets/kasir/js/adminlte.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        window.onload = function() {  
            // otomatis print
            window.print();

             // Cek status cetak setiap 500 milidetik
             var checkPrintStatus = setInterval(function() {
                if (window.matchMedia('print').matches) {
                    // Proses pencetakan sedang berlangsung
                } else {
                    // Proses pencetakan telah selesai
                    clearInterval(checkPrintStatus);

                    // Tampilkan tombol kembali
                    document.getElementById('hai').style.display = 'block';
                }
            }, 500);
            
        };
    </script>
</body>

</html>
