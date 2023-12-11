<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/reservation.css')}}">
</head>

<body style="background-image: url({{asset('assets/img/reserv-back.jpg')}})">
    <div class="container h-100">
        <div class="wrapper-card">
            <div class="card rounded shadow">
                <form action="{{route('reservasi.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="card-title text-center font-weight-semibold">Reservasi Sekarang</div>

                        <div class="card-text">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="no_meja">Pilih meja</label>
                                <select name="no_meja" class="form-control" id="no_meja">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <button class="btn btn-warning w-100 text-light">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
