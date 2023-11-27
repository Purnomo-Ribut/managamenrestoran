@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
    {{-- <link rel="stylesheet" href=""> --}}
@endsection
    
@section('content')
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card bg-primary">
                        <div class="card-body">test</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">test</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">test</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <a href="#" class="btn btn-warning w-100 mb-3">Buat pesanan</a>
            <div class="card">
                <div class="card-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae similique, iste, quam inventore eveniet dicta ullam ducimus voluptas nostrum reprehenderit dignissimos. Alias ipsa, iste quo impedit sit optio veniam porro!
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush