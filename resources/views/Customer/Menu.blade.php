<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Restaurant Jaya</title>

    <style>
        body {
            background-color: #D9D9D9;
        }
        nav{
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

          .content p,h2 {
            font-size: 14px;
            margin-bottom: 4px; /* Sesuaikan nilai ini sesuai dengan keinginan Anda */
          }

          .content h1 {
            font-size: 18px;
            margin-bottom: 4px;
          }

          .add-button {
            height: 30px;
          }

          .list-makanan{
            display: flex;
            flex-wrap: wrap;
            gap:10px;

          }

          .bg-header{
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

    <div class="container-fluid bg-header px-0">
        <div class="container-fluid bg-white-header">
            <div class="container main-content-header">
                <h1>Resto Jaya</h1>
                <div class="d-flex align-items-center" style="gap: 6px;">
                    <span class="material-symbols-outlined" style="font-size: 18px;">nest_clock_farsight_analog</span>
                    <h2>10.00 - 21.00</h2>
                </div>
                <div class="d-flex align-items-center" style="gap: 6px;">
                    <span class="material-symbols-outlined" style="font-size: 18px;">map</span>
                    <h2>Klaten - Jawa Tengah - Indonesia</h2>
                </div>
                <div class="d-flex align-items-center" style="gap: 6px;">
                    <span class="material-symbols-outlined" style="font-size: 18px;">phone_in_talk</span>
                    <h2>081234567891</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="content-wrap list-makanan p-2">
        <div class="container-fluid menu-makan">
            <div class="image">
              <img src="assets/kasir/img/rendang.png" alt="Pizza Original">
            </div>
            <div class="content">
              <h1>Pizza Original</h1>
              <h2>Rp 20,000</h2>
              <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
            </div>
            <div>
                <a href="#" class="add-button btn btn-warning d-flex justify-content-center align-items-center" style="font-size: 12px;">
                    ADD <span class="material-symbols-outlined" style="font-size: 12px;">add</span>
                </a>
            </div>
          </div>

          <div class="container-fluid menu-makan">
            <div class="image">
              <img src="{{ asset('assets/kasir/img/rendang.png') }}" alt="Pizza Original">
            </div>
            <div class="content">
              <h1>Rendang</h1>
              <h2>Rp 20,000</h2>
              <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
            </div>
            <div>
                {{-- <button type="button" class="add-button btn btn-warning d-flex justify-content-center align-items-center" style="font-size: 12px;" data-toggle="modal" data-target="#tambahModal">>
                    ADD <span class="material-symbols-outlined" style="font-size: 12px;">add</span>
                </button> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                    Launch demo modal
                  </button>
            </div>
          </div>

          <div class="container-fluid menu-makan">
            <div class="image">
              <img src="{{ asset('assets/kasir/img/rendang.png') }}" alt="Pizza Original">
            </div>
            <div class="content">
              <h1>Pizza Original</h1>
              <h2>Rp 20,000</h2>
              <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
            </div>
            <div>
                <a href="#" class="add-button btn btn-warning d-flex justify-content-center align-items-center" style="font-size: 12px;">
                    ADD <span class="material-symbols-outlined" style="font-size: 12px;">add</span>
                </a>
            </div>
          </div>

          {{-- Modal tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    </section>

    {{-- <div class="tambahModal" id="myModal">
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
    </div> --}}

</body>
</html>
