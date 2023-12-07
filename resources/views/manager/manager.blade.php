@extends('kasir.master.template')

@section('title', 'Dashboard Manager')

@section('css')
<link rel="stylesheet" href="{{asset('assets/manager/css/style.css')}}">
@endsection

@section('content')
<body>
<div class="container mt-4">
    <h1>Welcome to Dashboard Manager</h1>
    <div class="row">
      
      {{-- batas --}}
      <div class="col-sm-4" onclick="window.location.href='{{ route('lihat_menu') }}';">
        <div class="card  bg-white mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <i class="fas fa-box " style="color: rgb(0, 0, 0);"></i> <!-- Ganti dengan icon yang diinginkan -->
            <h5 class="text-dark m-3"> Data Menu </h5>
          </div>
          <div class="card-body">
            <h5 class="card-title text-dark">Jumlah Makanan : 10</h5>
            <h5 class="card-title text-dark">Jumlah Minuman : 10</h5>
            <h5 class="card-title text-dark">Jumlah Snack : 10</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4" onclick="window.location.href='{{ route('lihat_kategori') }}';">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <i class="fa fa-th-list"  style="color: rgb(0, 0, 0);"></i>
            <h5 class="text-dark m-3">Data kategori</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Makanan</h5> <br>
            <h5 class="card-title">Minuman</h5> <br>
            <h5 class="card-title">Snack</h5> <br>
          </div>
        </div>
      </div>
      <div class="col-sm-4" onclick="window.location.href='{{ route('data_pelanggan') }}';">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <i class="fa fa-users"style="color: rgb(0, 0, 0);"></i>
            <h5 class="text-dark m-3">Data Pelanggan</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Jumlah Pelanggan</h5>
            <p class="card-text">Informsi data pelanggan</p>
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMenu">
              Tambah Menu
          </button>
          <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Daftar Menu</a> --}}
          </div>
        </div>
      </div>

      {{-- belum fix --}}
      <div class="col-sm-4" onclick="window.location.href='{{ route('karyawan') }}';">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <i class="fa fa-briefcase" style="color: rgb(0, 0, 0);"></i>
            <h5 class="text-dark m-3">Data Karyawan</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Secondary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMenu">
              Tambah Menu
          </button>
          <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Daftar Menu</a> --}}
          </div>
        </div>
      </div>
      <div class="col-sm-4" onclick="window.location.href='{{ route('lihat_kategori') }}';">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Data kategori</div>
          <div class="card-body">
            <h5 class="card-title">Secondary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKategori">
              Kategori
            </button>
            <a href="{{ route('lihat_kategori') }}" class="btn btn-primary">Daftar Kategori</a> --}}
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">Data Karyawan</div>
          <div class="card-body">
            <h5 class="card-title">Secondary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMenu">
              Tambah Menu
          </button>
          <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Daftar Menu</a> --}}
          </div>
        </div>
      </div>
    </div>

  <!-- Modal add menu-->
  <div class="modal fade" id="modalAddMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="contoh : Rendang" required>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="contoh : 50000" required>
              </div>
              <div class="mb-3">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                    @foreach ($kategori as $kt)
                    <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="contoh : 20">
            </div>
            <div>
              <label for="image">Gambar Menu</label>
            </div>
            <div class="mb-3">
              {{-- <div class="input-group-prepend">
                <span class="input-group-text" id="image">Upload</span>
              </div> --}}
              <div>
                <input type="file"  id="image" name="image" class="form-control" onchange="validateFile(this)">
                {{-- <label class="custom-file-label" for="image">Choose file</label> --}}
              </div>
            </div>
            @if ($errors->any())
                  <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </div>
                @endif
          <div class="mt-3" id="alertContainer"></div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Desripsi singkat menu tersebut"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  <!-- Modal add menu end-->

  {{-- Modal add kategori --}}
  <div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('kategori.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="contoh : Makanan">
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Desripsi singkat kategori tersebut"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  {{-- Modal add kategori end--}}

  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            alert(successMessage);
        }
    });

function validateFile(input) {
          const file = input.files[0];
          const fileSize = file.size; // File size in bytes
          const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
          const maxSizeMB = 1; // Maximum file size in megabytes
      
          if (!allowedTypes.includes(file.type) || fileSize > maxSizeMB * 1024 * 1024) {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = `
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                File harus berupa PNG, JPEG, atau JPG dengan ukuran maksimum 1MB!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            `;
          } else {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = `
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                File Sesuai, Silahkan Upload !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            `;
          }
        }
</script>

</body>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush
