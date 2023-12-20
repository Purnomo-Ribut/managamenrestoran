@extends('chef.master.template')

@section('title', 'Dashboard Chef')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/kasir/css/style.css') }}">
@endsection

@section('content')
    <div class="row">
        <!-- Profile Section -->
        <div class="col-12 col-md-3 w-100">
            <a href="{{ route('profil3') }}" style="text-decoration: none; color: #000000; font-weight: bold;">
                <div class="card dk">
                    <div class="card-body text-center">
                        <img class="card-img-top rounded-circle w-25" src="https://cdn-icons-png.flaticon.com/512/3461/3461980.png">
                        <h3>{{$profil->name}}</h3>
                    </div>
                </div>
            </a>
            
        </div>
        <!-- Profile Section End -->

        <div class="col-12 col-md-4">
            <div class="card dk l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Orderan</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $orderan }}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>{{ $persenord}}% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="{{$persenord}}"
                            aria-valuemin="0" aria-valuemax="100" style="width:{{$persenord}}%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Order Section -->
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="bg-info text-white">
                                <th class="text-center">#</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-info btn-sm">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- List Order Section End -->
    @include('sweetalert::alert')
@endsection

{{-- Javascript --}}
@push('scripts')
<script>
    let table = new DataTable('#myTable');
</script>
@endpush
