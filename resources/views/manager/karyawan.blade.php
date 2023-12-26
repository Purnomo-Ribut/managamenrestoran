@extends('manager.master.template')

@section('title', 'Data Karyawan | ResToGo')

@section('css')
@endsection

@section('content')

    <body>
        {{-- <h1>Lihat Data karyawan</h1> --}}
        {{-- <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a> --}}
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h3 class="text-center font-weight-500">Daftar Karyawan</h3>
                        <div class="col mb-3 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKar">Tambah
                                Karyawan</button>
                        </div>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="bg-dark">
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Karyawan</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Kota</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Divisi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $kar)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                                        <td>{{ $kar->name }}</td>
                                        <td>{{ $kar->alamat }}</td>
                                        <td class="text-center">{{ $kar->kota }}</td>
                                        <td class="text-center">{{ $kar->gender }}</td>
                                        <td class="text-center">
                                            @switch($kar->role)
                                                @case('manager')
                                                    Manager
                                                @break

                                                @case('kasir')
                                                    Kasir
                                                @break

                                                @case('chef')
                                                    Chef
                                                @break

                                                @default
                                                    Belum Ada
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            {{-- button hapus --}}
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('deleteKaryawan', ['id' => $kar->id]) }}"
                                                class="btn btn-danger" role="button">
                                                <i class="fa-solid fa-trash"></i>
                                              </a>

                                              {{-- button edit --}}
                                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#editKar{{ $kar->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- edit karyawan --}}
        @foreach ($karyawans as $kar)
            <div class="modal fade" id="editKar{{ $kar->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('updateKaryawan', $kar->id) }}">
                                {{-- <form method="POST" action="{{ route('updateKategori', $kt->id)}}"> --}}
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $kar->name }}" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $kar->alamat }}" placeholder="contoh : Jl, Ir. Soekarno No 41" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" class="form-control" id="kota" name="kota"
                                        value="{{ $kar->kota }}" placeholder="contoh : Kota Surabaya / Kab.Malang">
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="pria"
                                            value="Laki - Laki" {{ $kar->gender === 'Laki - Laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pria">
                                            Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="wanita"
                                            value="Perempuan" {{ $kar->gender === 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wanita">
                                            Wanita
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="divisi" class="form-label">Divisi</label>
                                    <select class="custom-select" name="divisi" id="divisi">
                                        <option value="manager" {{ $kar->role === 'manager' ? 'selected' : '' }}>Manager
                                        </option>
                                        <option value="chef" {{ $kar->role === 'chef' ? 'selected' : '' }}>Chef</option>
                                        <option value="kasir" {{ $kar->role === 'kasir' ? 'selected' : '' }}>Kasir
                                        </option>
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
        <div class="modal fade" id="addKar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="contoh : Jl, Ir. Soekarno No 41" required>
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota"
                                    placeholder="contoh : Kota Surabaya / Kab.Malang">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="pria"
                                        value="pria">
                                    <label class="form-check-label" for="pria">
                                        Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="Perempuan"
                                        value="Perempuan">
                                    <label class="form-check-label" for="wanita">
                                        Wanita
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="divisi" class="form-label">Divisi</label>
                                <select class="custom-select" name="divisi" id="divisi">
                                    <option value="manager">Manager</option>
                                    <option value="chef">Chef</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>

                            <hr>
                            <h6>Akun Karyawan</h6>
                            <div class="mb-3">
                                <label for="user" class="form-label">Username</label>
                                <input type="email" class="form-control" id="user" name="user"
                                    placeholder="example@gmail.com" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="text" class="form-control" id="pass" name="pass"
                                    placeholder="Masukkan Password " required autocomplete="off">
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
        @include('sweetalert::alert')

    </body>
@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endpush
