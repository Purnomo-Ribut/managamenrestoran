@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
{{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')
<body>
  <h1>Lihat daftar Menu</h1>
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
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$menu->kategori ? $menu->kategori->nama : '-' }}</td>
            <td>{{$menu->nama}}</td>
            <td>{{$menu->harga}}</td>
            <td>{{$menu->stock}}</td>
            <td>{{$menu->deskripsi}}</td>
            <td><img src="{{ asset('storage/assets/manager/gambarMenu/' . $menu->image) }}" alt="gambarmenu" style="max-width: 200px; max-height: 200px;"></td>
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