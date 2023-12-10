<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Halaman Login | {{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- bostrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="/login" method="post">
                @csrf
                <h1>Login</h1>
                <hr>
                <p>Restoran Jaya </p>
                {{-- input email --}}
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="example@gmail.com" autocomplete="off"
                        value="{{ old('email')}}" autofocus required>
                </div>

                {{-- input password --}}
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" autocomplete="off"
                        required>
                </div>

                {{-- @if(session('error'))
                <div class="alert alert-danger my-2">
                    {{ session('error') }}
                </div>
                @endif --}}
                @if ($errors->any())
                <div class="alert alert-danger my-1">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                <button type="submit">Login</button>
                {{-- <p>
                    <a href="{{ route('kasir.dashboard') }}">Sementara Pake Ini Dulu Yaa</a>
                </p> --}}
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

{{-- list user 
<h1>List of Users</h1>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }} - {{$user->password}}</li>
@endforeach
</ul>


--}}
