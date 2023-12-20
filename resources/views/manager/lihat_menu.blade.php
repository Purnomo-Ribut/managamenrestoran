@extends('manager.master.template')

@section('title', 'Data Menu | ResToGo')

@section('addJavascript')
@section('css')
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
    {{-- <link rel="stylesheet" href=""> --}}

@endsection

@section('content')

    <body>
        {{-- <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a> --}}
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h3 class="text-center font-weight-500">Daftar Menu</h3>
                        <div class="col mb-3 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalAddMenu">Tambah Menu</button>
                        </div>

                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="bg-dark">
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Kategori</th>
                                    <th scope="col" class="text-center">Nama Menu</th>
                                    <th scope="col" class="text-center">Harga</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Gambar</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $loop->index + 1 }}.</th>
                                        <td>{{ $menu->kategori ? $menu->kategori->nama : '-' }}</td>
                                        <td>{{ $menu->nama }}</td>
                                        <td class="text-right">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                        <td>{{ $menu->deskripsi }}</td>
                                        <td>
                                            @if ($menu->image)
                                                <img src="{{ asset('storage/assets/manager/gambarMenu/' . $menu->image) }}"
                                                    alt="gambarmenu" style="max-width: 200px; max-height: 200px;">
                                            @else
                                                <p>Tidak ada gambar</p>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                           {{-- button hapus --}}
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('deleteMenu', ['id' => $menu->id]) }}"
                                                class="btn btn-danger" role="button">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            {{-- button edit  --}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editMenu{{ $menu->id }}">
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


        @foreach ($menus as $menu)
            <div class="modal fade" id="editMenu{{ $menu->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('updateMenu', ['id' => $menu->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Menu</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $menu->nama }}" placeholder="contoh : Rendang" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        value="{{ $menu->harga }}" placeholder="contoh : 50000" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori">Kategori</label>
                                    <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                                        @foreach ($categories as $kt)
                                            <option value="{{ $kt->id }}"
                                                {{ $kt->id == $menu->id_kategori ? 'selected' : '' }}>
                                                {{ $kt->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="image">Gambar Menu</label>
                                </div>
                                <div class="mb-3">
                                    {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="image">Upload</span>
                  </div> --}}
                                    <div>
                                        <input type="file" id="image" name="image" value="{{ $menu->image }}"
                                            class="form-control" accept="image/*" onchange="validateFile(this)">
                                        {{-- <label class="custom-file-label" for="image">Choose file</label> --}}
                                    </div>
                                </div>
                                {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                      </div>
                    @endif --}}
                                <div class="mt-3" id="alertContainer"></div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Gambar lama</p>
                                        @if ($menu->image)
                                            <img src="{{ asset('storage/assets/manager/gambarMenu/' . $menu->image) }}"
                                                alt="gambarmenu" style="max-width: 200px; max-height: 200px;">
                                        @else
                                            <p>Tidak ada gambar</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                        placeholder="Desripsi singkat menu tersebut">{{ $menu->deskripsi }}</textarea>
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
        <!-- Modal edit menu end-->

        {{-- add menu --}}
        <div class="modal fade" id="modalAddMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="contoh : Rendang" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="contoh : 50000" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                                    @foreach ($categories as $kt)
                                        <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="image">Gambar Menu</label>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <input type="file" id="image" name="image" class="form-control"
                                        accept="image/*" onchange="validateFile(this)">
                                </div>
                            </div>
                            {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                      </div>
                  @endif --}}
                            <div class="mt-3" id="alertContainer2"></div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                    placeholder="Desripsi singkat menu tersebut"></textarea>
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

        <script>
            function validateFile(input) {
                const file = input.files[0];
                const fileSize = file.size; // File size in bytes
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                const maxSizeMB = 1; // Maximum file size in megabytes
                const review = document.getElementById('review');

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

            function validateFile(input) {
                const file = input.files[0];
                const fileSize = file.size; // File size in bytes
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                const maxSizeMB = 1; // Maximum file size in megabytes

                const review = document.getElementById('review');

                if (!allowedTypes.includes(file.type) || fileSize > maxSizeMB * 1024 * 1024) {
                    const alertContainer = document.getElementById('alertContainer2');
                    alertContainer.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              File harus berupa PNG, JPEG, atau JPG dengan ukuran maksimum 1MB!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
            `;
                } else {
                    const alertContainer = document.getElementById('alertContainer2');
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

        @include('sweetalert::alert')

    </body>
@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush
