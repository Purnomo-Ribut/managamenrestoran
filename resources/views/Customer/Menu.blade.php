<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Restaurant Jaya</title>

    <style>
        body {
            background-color: #D9D9D9;
        }

        nav {
            background-color: #F4CE14;
        }

        .navbar-toggler {
            margin-left: 20px;
        }

        .menu-makan {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            border-radius: 10px;

        }

        .image img {
            width: 100px;
            height: auto;
            float: left;
            margin-right: 20px;
        }

        .content {
            flex: 1;
        }

        .content p,
        h2 {
            font-size: 14px;
            margin-bottom: 4px;
            /* Sesuaikan nilai ini sesuai dengan keinginan Anda */
        }

        .content h1 {
            font-size: 18px;
            margin-bottom: 4px;
        }

        .add-button {
            height: 30px;
        }

        .list-makanan {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;

        }

        .bg-header {
            background-image: url('assets/kasir/img/foto-resto.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 200px;
        }

        .bg-white-header {
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
            height: 200px;
        }

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container d-flex justify-content-center">
                <span class="navbar-toggler-icon"></span>
                <a class="navbar-brand mx-auto" href="#">
                    Restaurant Jaya
                </a>
            </div>
        </nav>
    </header>

    <section class="pt-5">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">Daftar Menu</h1>
                    <div class="row">
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tambahModal modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Body Modal -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="description">Deskripsi Pesanan:</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity">
                        </div>
                    </form>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>