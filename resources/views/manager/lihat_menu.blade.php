@extends('manager.master.menu.template')

@section('title', 'Manager | Data Menu')

@section('addJavascript')
@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')
<body>
  <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMenu">Tambah Menu</button>
    <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kategroi</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Stock</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($menus as $menu)
          <tr>
            <th scope="row">{{$loop->index + 1}}.</th>
            <td>{{$menu->kategori ? $menu->kategori->nama : '-' }}</td>
            <td>{{$menu->nama}}</td>
            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
            <td>{{$menu->stock}}</td>
            <td>{{$menu->deskripsi}}</td>
            <td>
              @if($menu->image)
                  <img src="{{ asset('storage/assets/manager/gambarMenu/' . $menu->image) }}" alt="gambarmenu" style="max-width: 200px; max-height: 200px;">
              @else
                  <p>Tidak ada gambar</p>
              @endif
          </td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editMenu{{$menu->id}}">
                Edit
            </button>
              <a href="{{ route('deleteMenu', ['id' => $menu->id]) }}" class="btn btn-primary">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      
      @foreach ($menus as $menu)
      <div class="modal fade" id="editMenu{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('updateMenu', ['id' => $menu->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$menu->nama}}" placeholder="contoh : Rendang" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{$menu->harga}}" placeholder="contoh : 50000" required>
                  </div>
                  <div class="mb-3">
                    <label for="id_kategori">Kategori</label>
                    <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                      @foreach ($categories as $kt)
                      <option value="{{$kt->id}}" {{ $kt -> id == $menu->id_kategori ? 'selected' : ''}}>{{$kt->nama}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{$menu->stock}}"  placeholder="contoh : 20">
                </div>
                <div>
                  <label for="image">Gambar Menu</label>
                </div>
                <div class="mb-3">
                  {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="image">Upload</span>
                  </div> --}}
                  <div>
                    <input type="file"  id="image" name="image" value="{{$menu->image}}"  class="form-control" onchange="validateFile(this)">
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
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Desripsi singkat menu tersebut">{{$menu->deskripsi}}</textarea>
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
      <!-- Modal add menu end-->

      {{-- add menu --}}
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
                        @foreach ($categories as $kt)
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
                  <div>
                    <input type="file" id="image" name="image" class="form-control" onchange="validateFile(this)">
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
              <div class="mt-3" id="alertContainer1"></div>
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
    <script>
      function validateFile(input) {
        const file = input.files[0];
        const fileSize = file.size; // File size in bytes
        const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        const maxSizeMB = 1; // Maximum file size in megabytes
      
        if (!allowedTypes.includes(file.type) || fileSize > maxSizeMB * 1024 * 1024) {
          const alertContainer = document.getElementById('alertContainer1');
          alertContainer.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              File harus berupa PNG, JPEG, atau JPG dengan ukuran maksimum 1MB!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
            `;
          } else {
            const alertContainer = document.getElementById('alertContainer1');
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