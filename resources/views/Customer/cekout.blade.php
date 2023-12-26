<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Pembayaran | ResToGo</title>
    <!--jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/kasir/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/cekout.css')}}">
    <!-- icon-google -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,0" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center mt-3">
            <img src="{{asset('assets/customer/img/restogo.png')}}" alt="No Picture Added" class="rounded-circle logo-co">
        </div>
        <div class="d-flex justify-content-center align-items-center mt-2 container-fluid">
            <div class="card w-100">
                <div class="card-body">
                    <div class="container rounded-1 mb-3">
                        <div class="d-flex justify-content-center ikon">
                            <i class="fa-solid fa-circle-check check" style="color: #37fe34;"></i>
                        </div>
                        <div class="content d-flex justify-content-center text-center flex-column">
                            <p class="m-0 fs-3">Total pembayaran anda sebesar </p>
                            <div class="fs-3 fw-bold text-success mt-2">
                                @rupiah($totalPrice)
                            </div>
                        </div>
                        <div class="content d-flex justify-content-center text-center flex-column">
                            <p class="m-0 p-2 fs-5">ID Pelanggan = <span class="fw-bold"> {{$order->order_code}}</span></p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{route('reservasi.logout')}}" class="btn btn-info"
                                    style="width: fit-content">Menu Utama</a>
                                <a href="{{route('cancel.order', $order->customer_id)}}" class="btn btn-danger">Batalkan
                                    Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-end">
                    <p>Terima Kasih!</p>
                </div>
            </div>
            <div class="mt-3">
                <img src="{{asset('assets/customer/img/restogo.png')}}" alt="No Picture Added" class="rounded-circle logo-co">
             </div>
        </div>
    </div>

