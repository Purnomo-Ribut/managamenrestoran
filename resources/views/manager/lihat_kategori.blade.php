@extends('manager.master.template')

@section('title', 'Data Kategori | ResToGo')

@section('css')
@endsection

@section('content')

<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <h3 class="text-center font-weight-500">Daftar Kategori</h3>
                        <div class="col mb-3 text-right">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKategori">Tambah Kategori</button>
                        </div>
        <table class="table table-bordered table-hover" id="myTable">
          <thead>
              <tr class="bg-dark">
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Kategori</th>
                  <th scope="col" class="text-center w-75">Deskripsi</th>
                  <th scope="col" class="text-center w-25">Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($kategoris as $kt)
              <tr>
                  <td scope="row" class="text-center" data-label="No.">{{$loop->index + 1}}</td>
                  <td data-label="Nama">{{ucwords($kt->nama)}}</td>
                  <td data-label="Deskripsi">{{$kt->deskripsi}}</td>
                  <td class="text-center" data-label="Aksi">
                    {{-- hapus --}}
                    <a onclick="confirmDelete(this)" data-url="{{ route('deleteKategori', ['id' => $kt->id]) }}" class="btn btn-danger" role="button">
                      <i class="fa-solid fa-trash"></i>
                    </a>

                    {{-- edit --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal"
                          data-target="#editkategori{{$kt->id}}">
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

    {{-- modal edit --}}
    @foreach ($kategoris as $kt)
    <div class="modal fade" id="editkategori{{$kt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
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
