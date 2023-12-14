@extends('kasir.master.template')

@section('title', 'Halaman Pembayaran | Restogo')

@section('css')
    {{-- <link rel="stylesheet" href=""> --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach ($orders as $order)
                        <form action="{{ route('bayar', ['idCustomer' => $order->customer->id]) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <label class="font-weight-normal" id="name">Nama</label>
                                    {{-- id customer --}}
                                    <input type="text" class="form-control" name="id"
                                        value="{{ $order->customer->id }}" hidden>

                                    {{-- harga total --}}
                                    @php
                                        $totalHarga = 0;
                                    @endphp

                                    @foreach ($data as $menu)
                                        @php
                                            $totalHarga += $menu->harga;
                                        @endphp
                                    @endforeach
                                    <input type="text" class="form-control" name="total" value="{{ $totalHarga }}"
                                        hidden>

                                    {{-- and total harga  --}}

                                    {{-- nama custome --}}
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $order->customer->name }}" readonly>
                                </div>

                                {{-- nomer meja --}}
                                <div class="col-12 col-md-6 mb-2">
                                    <label class="font-weight-normal" id="no_meja">No. Meja</label>
                                    <input type="text" class="form-control" name="no_meja"
                                        value="{{ $order->customer->no_table }}" readonly>
                                </div>

                                {{-- pembayaran --}}
                                <div class="col-12 col-md-6">
                                    <label class="font-weight-normal">Pilih metode pembayaran</label>
                                    <select name="metode" id="" class="form-control">
                                        <option value="Debit">Debit</option>
                                        <option value="Qris">Qris</option>
                                        <option value="Tunai" selected>Tunai</option>
                                    </select>
                                </div>

                                {{-- chef yang ada --}}
                                <div class="col-12 col-md-6 mb-2">
                                    <label class="font-weight-normal">Chef</label>
                                    <input type="text" class="form-control" name="chef" value="2" readonly>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('kasir.dashboard') }}" class="btn btn-info w-100">Kembali</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-warning w-100">Checkout Now</button>
                                </div>
                            </div>

                           
                        </form>
                    @endforeach

                </div>
            </div>
        </div>


        {{-- konten list menu  --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Ordered Menu</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Menu</th>                                
                                <th>Deskripsi</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $menu)
                                <tr>
                                    <td>
                                        <img src="https://hips.hearstapps.com/hmg-prod/images/classic-cheese-pizza-recipe-2-64429a0cb408b.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*"
                                            alt="menu" class="w-100 rounded-circle">
                                    </td>
                                    <td>{{ $menu->nama }}</td>                                    
                                    <td>{{ $menu->description }}</td>
                                    <td>{{ $menu->harga }}</td>
                                </tr>
                            @endforeach
                            {{-- perhitungan jumlah total --}}
                            @php
                                $totalHarga = 0;
                            @endphp

                            @foreach ($data as $menu)
                                @php
                                    $totalHarga += $menu->harga;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td>Total</td>
                                <td>{{ $totalHarga }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

{{-- Javascript --}}
@push('scripts')
@endpush

{{-- 
catatan 
 <h4>Ordered Menu</h4>
    <div class="d-flex flex-column">
        @foreach ($data as $menu)
            <div class="row">
                <div class="d-flex my-2">
                    <div class="col-3">
                        <img src="https://hips.hearstapps.com/hmg-prod/images/classic-cheese-pizza-recipe-2-64429a0cb408b.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*"
                            alt="menu" class="w-100 rounded-circle">
                    </div>
                    <div class="col-9">
                        <div class="d-flex flex-column">
                            <h6>{{ $menu->nama }}</h6>
                            <h6>{{ $menu->harga }}</h6>
                            <p> {{ $menu->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-between">
            <h3 class="font-weight-normal">Total:</h3>
            @php
                $totalHarga = 0;
            @endphp

            @foreach ($data as $menu)
                @php
                    $totalHarga += $menu->harga;
                @endphp
            @endforeach

            <h3>{{ $totalHarga }}</h3>
        </div>

    --}}
