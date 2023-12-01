@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')
<body>
  <h1>Lihat daftar Kategroi</h1>
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
              <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Edit</a>
              <a href="{{ route('lihat_menu') }}" class="btn btn-primary">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush