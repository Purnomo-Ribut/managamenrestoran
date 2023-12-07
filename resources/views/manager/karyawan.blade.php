@extends('kasir.master.template')

@section('title', 'Manager | Data Karyawan')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')

<body>
    <h1>Lihat Data karyawan</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKar">Tambah Karyawan</button>
    <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kayawan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Divisi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $kar)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$kar->nama}}</td>
                <td>{{$kar->alamat}}</td>
                <td>{{$kar->kota}}</td>
                <td>{{$kar->gender}}</td>
                <td>{{$kar->divisi}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#editKar{{$kar->id}}">
                        Edit
                    </button>
                    <a href="{{ route('deleteKaryawan', ['id' => $kar->id]) }}" class="btn btn-primary">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- edit karyawan --}}
    @foreach ($karyawans as $kar)
    <div class="modal fade" id="editKar{{$kar->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateKaryawan', $kar->id)}}">
                {{-- <form method="POST" action="{{ route('updateKategori', $kt->id)}}"> --}}
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$kar->nama}}" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$kar->alamat}}" placeholder="contoh : Jl, Ir. Soekarno No 41" required>
                  </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" value="{{$kar->kota}}" placeholder="contoh : Kota Surabaya / Kab.Malang">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="pria" value="pria" {{ $kar->gender === 'pria' ? 'checked' : '' }}>
                        <label class="form-check-label" for="pria">
                          Pria
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="wanita" value="wanita" {{ $kar->gender === 'wanita' ? 'checked' : '' }}>
                        <label class="form-check-label" for="wanita">
                          Wanita
                        </label>
                      </div>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <select class="custom-select" name="divisi" id="divisi">
                        <option value="Manager" {{ $kar->divisi === 'Manager' ? 'selected' : '' }}>Manager</option>
                        <option value="Chef" {{ $kar->divisi === 'Chef' ? 'selected' : '' }}>Chef</option>
                        <option value="Chef" {{ $kar->divisi === 'Kasir' ? 'selected' : '' }}>kasir</option>
                        <option value="Pelayan" {{ $kar->divisi === 'Pelayan' ? 'selected' : '' }}>Pelayan</option>
                    </select>
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
    @endforeach

    {{-- add karyawan --}}
    <div class="modal fade" id="addKar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('karyawan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="contoh : Jl, Ir. Soekarno No 41" required>
                  </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="contoh : Kota Surabaya / Kab.Malang">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="pria" value="pria">
                        <label class="form-check-label" for="pria">
                          Pria
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="wanita" value="wanita">
                        <label class="form-check-label" for="wanita">
                          Wanita
                        </label>
                      </div>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <select class="custom-select" name="divisi" id="divisi">
                        <option value="Manager">Manager</option>
                        <option value="Chef">Chef</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Pelayan" selected>Pelayan</option>
                      </select>
                </div>
                {{-- <div>
                  <label for="image">Profil</label>
                </div> --}}
                {{-- <div class="mb-3">
              
                  <div>
                    <input type="file"  id="image" name="image" class="form-control" onchange="validateFile(this)">
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
              <div class="mt-3" id="alertContainer"></div> --}}
                {{-- <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Desripsi singkat menu tersebut"></textarea>
                </div> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            alert(successMessage);
        }
    });
    </script>
</body>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush
