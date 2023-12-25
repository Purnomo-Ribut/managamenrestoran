@extends('customer.master.template')


@section('content')
<section class="pt-5">

    <div class="d-flex justify-content-center">
        <form action="/search/menu" method="GET">
            {{-- @csrf --}}
            <div class="row">
                <input type="search" name="search" class="form-control col" placeholder="Cari">
                <button type="submit" class="btn ms-1 search">
                    <span class="material-symbols-outlined fw-bold">search</span>
                </button>
            </div>
        </form>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Kategori
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                <li><a class="btn justify-content-center d-flex align-items-center" onclick="window.location.href='{{route('makanan.index', $category->id)}}'">{{$category->nama}}</a></li>
                                @endforeach
                            </ul>
                          </div>
                        {{-- @foreach ($categories as $category)
                    <button type="button"
                        class="btn btn-warning mb-2 me-2 justify-content-center d-flex align-items-center"
                        onclick="window.location.href='{{route('makanan.index', $category->id)}}'">
                        {{$category->nama}}
                    </button>
                    @endforeach --}}
                    </div>
                </div>

                <div class="row py-3">
                    @foreach ($menu as $item)
                    <div class="col-6 col-md-3 mb-3 tabel">
                        <div class="card border-0 shadow">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('storage/assets/manager/gambarMenu/'.$item->image)}}"
                                    class="card-img-top foto" alt="Gambar Tidak ada">
                            </div>
                            <div class="card-body p-1">
                                <div class="content-makanan d-flex justify-content-center">
                                    <h1 class="Judul">{{$item->nama}}</h1>
                                </div>
                                <div class="content-makanan d-flex justify-content-center">
                                    <h2 class="makanan">@rupiah($item->harga)</h2>
                                </div>
                                {{-- <p class="makanan">{{$item->deskripsi}}</p> --}}
                                <div>
                                    <button data-target="#addCart" data-toggle="modal"
                                        data-product-name="{{$item->nama}}" data-id-menu="{{$item->id}}"
                                        data-price-menu="{{$item->harga}}"
                                        class="add-button btn btn-kuning d-flex align-items-center container-fluid justify-content-center mt-3"
                                        style="font-size: 12px;">ADD <span class="material-symbols-outlined"
                                            style="font-size: 15px; font-weight: bold">add</span>
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
                    <div class="cart d-flex justify-content-center align-items-center btn-kuning mb-2 p-2 shadow">
                        <span class="material-symbols-outlined cart">shopping_cart</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('Customer.modal')

<script>
    const addButton = document.querySelectorAll('.add-button');
    addButton.forEach(element => {
        element.addEventListener('click', function () {
            // const productName = document.querySelector('#productName');
            let idMenu = this.getAttribute('data-id-menu');
            let priceMenu = this.getAttribute('data-price-menu');
            let productName = this.getAttribute('data-product-name');
            document.querySelector('#menu_id').value = idMenu
            document.querySelector('#price').value = priceMenu
            document.querySelector('#productName').textContent = productName
        })
    });

</script>

<script>
    const priceItem = document.querySelectorAll('#price-item');
    const totalPrice = document.querySelector('#total-price');
    const price = [];

    function formatRupiah(number) {
        if (typeof number !== 'number') {
            return 'Invalid input';
        }
        var parts = number.toFixed(2).split('.');

        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        var result = 'Rp ' + parts.join(',');

        return result;
    }

    priceItem.forEach(el => {
        const originalPrice = parseInt(el.value);
        price.push(originalPrice);
    })
    const total = price.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
    console.log(total)
    totalPrice.textContent = formatRupiah(total);

</script>

@endsection
