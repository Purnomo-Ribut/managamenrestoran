@extends('customer.master.template')


@section('content')
<section class="pt-5">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="d-flex">
                    @foreach ($categories as $category)
                    <button type="button"
                        class="btn btn-warning mb-2 me-2 justify-content-center d-flex align-items-center"
                        onclick="window.location.href='{{route('makanan.index', $category->id)}}'">
                        <span class="material-symbols-outlined nav-menu">lunch_dining</span> {{$category->nama}}
                    </button>
                    @endforeach
                </div>

                <div class="row">
                    @foreach ($menu as $item)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <img src="{{asset('storage/assets/manager/gambarMenu/'.$item->image)}}"
                                class="card-img-top w-100" alt="Pizza Original">
                            <div class="card-body p-1">
                                <div class="content-makanan">
                                    <h1 class="Judul">{{$item->nama}}</h1>
                                    <h2 class="makanan">@rupiah($item->harga)</h2>
                                    <p class="makanan">{{$item->deskripsi}}</p>
                                </div>
                                <div>
                                    <button data-target="#addCart" data-toggle="modal" data-id-menu="{{$item->id}}"
                                        data-price-menu="{{$item->harga}}"
                                        class="add-button btn btn-warning d-flex justify-content-center align-items-center"
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
                    <div class="kuning d-flex justify-content-center align-items-center bg-warning mb-2 p-2 shadow">
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
            let idMenu = this.getAttribute('data-id-menu');
            let priceMenu = this.getAttribute('data-price-menu');
            document.querySelector('#menu_id').value = idMenu
            document.querySelector('#price').value = priceMenu
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
