@extends('manager.master.chef.template')

@section('title', 'Manager | Data Karyawan')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')

<body>
    {{-- <h1>Lihat Data karyawan</h1> --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addChef">Tambah Chef</button>
    <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama chef</th>
                <th scope="col">email</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chefs as $chef)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$chef->name}}</td>
                <td>{{$chef->email}}</td>
                <td>{{$chef->password}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#editChef{{$chef->id}}">
                        Edit
                    </button>
                    <a href="{{ route('deleteChef', ['id' => $chef->id]) }}" class="btn btn-primary">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- edit karyawan --}}
    @foreach ($chefs as $chef)
    <div class="modal fade" id="editChef{{$chef->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit data Chef</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateChef', $chef->id)}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Chef</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$chef->name}}" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$chef->email}}" placeholder="example@gmail.com" required>
                  </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="{{$chef->password}}">
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
    <div class="modal fade" id="addChef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah data Karyawan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('chef.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Chef</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                  </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
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
