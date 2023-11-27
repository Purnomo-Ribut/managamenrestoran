<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">    
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                @csrf
                <h1>Login</h1>
                <hr>
                <p>Restoran Jaya </p>
                {{-- input email --}}
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="example@gmail.com" autocomplete="off">
                </div>
                
                {{-- input password --}}
                <div>
                    <label for="pass">Password</label>
                    <input type="password" id="pass" name="pass" placeholder="Password" autocomplete="off">
                </div>
                <button type="submit">Login</button>
                <p>
                    <a href="{{ route('kasir.dashboard') }}">Sementara Pake Ini Dulu Yaa</a>
                </p>
                {{-- <p>
                    <a href="">Forgot Password?</a>
                </p> --}}
            </form>
        </div>

        {{-- konten kanan --}}
        <div class="right">
            <img src="https://img.freepik.com/free-vector/healthy-breakfast-meals-set-flat-illustration_74855-14424.jpg?w=740&t=st=1701076192~exp=1701076792~hmac=bacee3adfe0e5380357de80653a80222cd764f35c8aa74fce12ad47c6943ff52"
                alt="Gambar Makanan">
        </div>
    </div>
</body>

</html>
