@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')
<body>
<div class="container mt-4">
    <h1>Welcome to Dashboard Manager</h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitpring Data Menu</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMenu">
                        Tambah Menu
                    </button>
                    <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Daftar Menu</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Pelanggan</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Pelanggan</a>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Data Karyawan</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#modalAddMenu">Tambah Karyawan</a>
                    <a href="#" class="btn btn-primary">Data Karyawan</a>
                </div>
            </div>
        </div> --}}
    </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monitoring Orderan</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Lihat Orderan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monitoring Kategori</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalKategori">Tambah Kategori</a>
                        <a href="{{ route('lihat_kategori') }}" class="btn btn-primary">Daftar Kategori</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Orderan</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Lihat Orderan</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Data Chef</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Data Chef</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Pendapatan</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">pendapatan</a>
                </div>
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
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="image">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file"  id="image" name="image" class="custom-file-input" onchange="validateFile(this)">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
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

//     $('.custom-file-input').change(function() {
//     var $el = $(this),
//     files = $el[0].files,
//     label = files[0].name;
//     if (files.length > 1) {
//         label = label + " and " + String(files.length - 1) + " more files"
//     }
//     $el.next('.custom-file-label').html(label);
// });

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
