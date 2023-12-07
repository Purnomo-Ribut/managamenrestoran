@extends('customer.master.template')


@section('content')
<section class="pt-5">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">Daftar Makanan</h1>
                    <div class="row">
                        @foreach ($menu as $item)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card border-0 shadow d-flex align-items-center">
                                <img src="{{asset('storage/assets/manager/gambarMenu/'.$item->image)}}" class="card-img-top img-food w-100"
                                    alt="Pizza Original">
                                <div class="card-body">
                                    <div class="content-makanan">
                                        <h1>{{$item->nama}}</h1>
                                        <h2>{{$item->harga}}</h2>
                                        <p>{{$item->deskripsi}}</p>
                                    </div>
                                    <div>
                                        <button class="add-button btn btn-warning d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#myModal"
                                        style="font-size: 12px;">ADD <span class="material-symbols-outlined"style="font-size: 12px;">add</span>
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

    <!-- Modal List -->
    <div class="tambahModal modal fade" id="modalAdd">
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
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quantity">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </span>
                                <input type="number" name="quantity" class="form-control input-number w-50" id="quantity" value="1" min="1">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="options">Pilih Opsi:</label>
                            <select class="form-control" id="options">
                                <option value="1">Tidak Pedas</option>
                                <option value="2">Sedang</option>
                                <option value="3">Pedas</option>
                            </select>
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
@endsection
