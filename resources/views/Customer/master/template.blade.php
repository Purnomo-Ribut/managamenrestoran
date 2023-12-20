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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/kasir/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/menu.css')}}">
  <!-- icon-google -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,0" />
    {{-- icon title --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/manager/img/restogo.png') }}">
  <title>Document</title>
</head>
<body>
  @include('sweetalert::alert')
    <nav class="navbar navbar-expand navbar-white navbar-light " style="background-color: #f4ce14;">
        <!-- Left navbar links -->
        @include('Customer.master.navbar')
        <div class="container d-flex justify-content-center">
                    <h2 class="navbar-brand mx-auto">
                        Restaurant Jaya
                    </h2>
        </div>

        <!-- Right navbar links -->
      </nav>

    @yield('content')

    {{-- @include('Customer.modal') --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/kasir/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>

