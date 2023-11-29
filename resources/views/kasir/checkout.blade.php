@extends('kasir.master.template')

@section('title', 'Dashboard kasir')

@section('css')
    {{-- <link rel="stylesheet" href=""> --}}
@endsection
    
@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label class="font-weight-normal">Nama</label>
                            <input type="text" class="form-control" name="nama" value="sairul" readonly>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="font-weight-normal">No. Meja</label>
                            <input type="text" class="form-control" name="no_meja" value="25" readonly>
                        </div>
                    </div>
                    <div class="btn btn-warning w-100">Checkout Now</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Ordered Menu</h4>
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="d-flex my-2">
                                <div class="col-3">
                                    <img src="https://hips.hearstapps.com/hmg-prod/images/classic-cheese-pizza-recipe-2-64429a0cb408b.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*" alt="menu" class="w-100 rounded-circle">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex flex-column">
                                        <h6>Classic Cheese Pizza x2</h6>
                                        <h6>Rp. 700.000</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex my-2">
                                <div class="col-3">
                                    <img src="https://hips.hearstapps.com/hmg-prod/images/classic-cheese-pizza-recipe-2-64429a0cb408b.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*" alt="menu" class="w-100 rounded-circle">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex flex-column">
                                        <h6>Classic Cheese Pizza x2</h6>
                                        <h6>Rp. 700.000</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex my-2">
                                <div class="col-3">
                                    <img src="https://hips.hearstapps.com/hmg-prod/images/classic-cheese-pizza-recipe-2-64429a0cb408b.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*" alt="menu" class="w-100 rounded-circle">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex flex-column">
                                        <h6>Classic Cheese Pizza x2</h6>
                                        <h6>Rp. 700.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Javascript --}}
@push('scripts')

@endpush