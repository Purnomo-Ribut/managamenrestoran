@extends('customer.master.template')


@section('content')
<section class="pt-5">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-3">Daftar Makanan</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    @foreach ($menu as $item)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="card border-0 shadow d-flex align-items-center">
                            <img src="{{asset('storage/assets/manager/gambarMenu/'.$item->image)}}"
                                class="card-img-top w-100" alt="Pizza Original">
                            <div class="card-body p-1">
                                <div class="content-makanan">
                                    <h1>{{$item->nama}}</h1>
                                    <h2>{{$item->harga}}</h2>
                                    <p>{{$item->deskripsi}}</p>
                                </div>
                                <div>
                                    <button
                                        class="add-button btn btn-warning d-flex justify-content-center align-items-center"
                                        data-toggle="modal" data-id-menu="{{$item->id}}"
                                        data-price-menu="{{$item->harga}}" data-target="#myModal"
                                        style="font-size: 12px;">ADD <span class="material-symbols-outlined"
                                            style="font-size: 12px;">add</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('Customer.modal')
<script>
    $(document).ready(function () {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    // Pastikan nilai tidak kurang dari 1
                    input.val(Math.max(currentVal - 1, 1));
                } else if (type == 'plus') {
                    input.val(currentVal + 1);
                }
            } else {
                input.val(1);
            }
        });
    });

</script>

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
@endsection
