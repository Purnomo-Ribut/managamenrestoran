@extends('kasir.master.template')

@section('title', 'List Orderan')

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

@section('header', 'List Orderan')

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped" id="order-table">
            <thead>
                <tr class="bg-dark">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Kode Orderan</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$loop->index + 1}}</th>
                    <td>{{$order->customer->name}}</td>
                    <td class="text-center">{{$order->order_code}}</td>
                    <td class="text-center">
                        {{-- hapus orderan --}}
                        <a onclick="confirmDelete(this)" data-url="{{ route('order.hapus', ['id' => $order->id]) }}" class="btn btn-danger" role="button">Hapus</a>

                        {{-- bayar orderan --}}
                        <a href="{{ route('kasir.checkout', ['id' => $order->customer->id]) }}"
                            class="btn btn-info text-light font-weight-bold">Bayar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('sweetalert::alert')
@endsection

{{-- Javascript --}}
@push('scripts')
    <script>
        let table = new DataTable('#order-table');
    </script>
@endpush
