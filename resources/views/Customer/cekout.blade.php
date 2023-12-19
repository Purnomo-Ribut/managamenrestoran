<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div class="d-flex justify-content-center align-items-center h-100 flex-column">
            <div class="card w-100">
                <div class="card-body">
                    <div class="container rounded-1 mb-3">
                        <div class="d-flex justify-content-center ikon">
                            <i class="fa-solid fa-circle-check check" style="color: #37fe34;"></i>
                        </div>
                        <div class="content d-flex justify-content-center text-center flex-column">
                            <p class="m-0 fs-3">Total pembayaran anda sebesar: </p>
                            <div class="fs-3 fw-bold text-success">
                                @rupiah($totalPrice)
                            </div>
                        </div>
                        <div class="content d-flex justify-content-center text-center flex-column">
                            <p class="m-1 fs-4">Silahkan tunjukan ID pelanggan ke kasir!</p>
                            <a href="{{route('makanan.index')}}" class="btn btn-info m-auto" style="width: fit-content">Selesai Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card d-flex align-items-center rounded-2">
                <div class="card-body">
                    <p class="m-0 p-1 fs-5">ID Pelanggan = <span class="fw-bold"> {{$order->order_code}}</span></p>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
