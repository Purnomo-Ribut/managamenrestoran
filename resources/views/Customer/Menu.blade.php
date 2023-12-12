@extends('customer.master.template')


@section('content')
<section class="pt-5">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="d-flex">
                    <button type="button"
                        class="btn btn-warning mb-2 me-2 justify-content-center d-flex align-items-center"
                        onclick="window.location.href='{{route('makanan.index')}}'">
                        <span class="material-symbols-outlined nav-menu">lunch_dining</span> Makanan
                    </button>

                    <button type="button"
                        class="btn btn-warning mb-2 me-2 justify-content-center d-flex align-items-center"
                        onclick="window.location.href='{{route('minuman.index')}}'">
                        <span class="material-symbols-outlined nav-menu">coffee</span> Minuman
                    </button>
                </div>

                <div class="row">
                    @foreach ($menu as $item)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="card border-0 shadow d-flex align-items-center">
                            <img src="{{asset('storage/assets/manager/gambarMenu/'.$item->image)}}"
                                class="card-img-top w-75" alt="Pizza Original">
                            <div class="card-body p-1">
                                <div class="content-makanan">
                                    <h1 class="Judul">{{$item->nama}}</h1>
                                    <h2 class="makanan">{{$item->harga}}</h2>
                                    <p class="makanan">{{$item->deskripsi}}</p>
                                </div>
                                <div>
                                    <button
                                        class="add-button btn btn-warning d-flex justify-content-center align-items-center"
                                        style="font-size: 12px;">ADD <span class="material-symbols-outlined"
                                            style="font-size: 15px; font-weight: bold;">add</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-end">
                <a data-toggle="modal" data-target="#myModal">
                    <div class="kuning d-flex justify-content-center align-items-center bg-warning mb-2 w-20">
                        <span class="material-symbols-outlined cart">shopping_cart</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('Customer.modal')
</div>
</div>
</div>


@endsection