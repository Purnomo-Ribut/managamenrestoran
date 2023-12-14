@extends('manager.master.kategori.template')

@section('title', 'Manager | Data Kategori')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')

<body>
    {{-- <h1>Lihat Daftar Kategori</h1> --}}
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKategori">Tambah Kategori</button>
    <a href="{{ route('manager_index') }}" class="btn btn-danger">Home</a>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kt)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$kt->nama}}</td>
                <td>{{$kt->deskripsi}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#editkategori{{$kt->id}}">
                        Edit
                    </button>
                    <a href="{{ route('deleteKategori', ['id' => $kt->id]) }}" class="btn btn-primary">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- modal edit --}}
    @foreach ($kategoris as $kt)
    <div class="modal fade" id="editkategori{{$kt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updateKategori', $kt->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$kt->nama}}"
                                placeholder="contoh : Makanan">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                placeholder="Desripsi singkat kategori tersebut">{{$kt->deskripsi}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- modal tambah --}}
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
  @include('sweetalert::alert')
</body>


@endsection

{{-- Javascript --}}
@push('scripts')

@endpush
