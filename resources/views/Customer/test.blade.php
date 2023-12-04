@extends('customer.master.template')

@section('content')
<section class="pt-5">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">Daftar Makanan</h1>
                    <div class="row">
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-0 shadow">
                                <img src="{{asset('assets/customer/img/rendang.jpg')}}" class="card-img-top w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>Pizza Original</h1>
                                        <h2>Rp 20,000</h2>
                                        <p>Pizza Original, tidak pedas, isi daging dan sosis</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center w-100" data-toggle="modal" data-target="#myModal"
                                            style="font-size: 12px;">
                                            ADD <span class="material-symbols-outlined"
                                                style="font-size: 12px;">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="tambahModal modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Deskripsi Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Body Modal -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="description">Deskripsi Pesanan:</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity">
                        </div>
                    </form>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                </div>

            </div>
        </div>
    </div>
@endsection