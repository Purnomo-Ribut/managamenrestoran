<!-- Modal ADD-->
<div class="tambahModal modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Checkout Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Body Modal -->
            <div class="modal-body border-bottom">
                <form action="{{route('checkout.cart')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($carts as $cart)
                    <input type="hidden" value="{{$cart->menu->id}}" name="menu_id[]">
                    <input type="hidden" value="{{$cart->menu->harga * $cart->qty}}" id="price-item" name="price[]">
                    <div class="form-group pb-3 border-bottom">
                        <div class="input-group d-flex align-items-center">
                            <div class="label">
                                <div class="d-flex flex-column">
                                    <label for="quantity" class="mr-2">{{$cart->menu->nama}}</label>
                                    <p class="mr-2">@rupiah($cart->menu->harga * $cart->qty)</p>
                                    <a href="{{route('remove.cart', $cart->id)}}">Hapus Item</a>
                                </div>
                            </div>
                            <div class="d-block ml-auto">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-default btn-number border-0" data-type="minus"
                                        data-field="quantity">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div style="width: 25%" class="d-flex justify-content-center">
                                        <input type="number" name="quantity[]"
                                            class="input form-control text-center border-0" id="quantity"
                                            value="{{$cart->qty}}" min="1">
                                    </div>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="plus"
                                            data-field="quantity">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="d-flex justify-content-between">
                        <h3>Total</h3>
                        <h3 id="total-price">Rp. 300.000</h3>
                    </div>
                    <!-- Footer Modal -->
                    <div class="modal-footer">
                        <button class="btn btn-warning">Checkout pesanan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- Add Cart Modal --}}

<div class="modal fade" id="addCart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan detail pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addcart')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="menu_id" id="menu_id" value="">
                    <input type="hidden" name="price" id="price" value="">
                    <div class="d-flex align-items-center w-100">
                        <button type="button" class="btn btn-default btn-number border-0" data-type="minus"
                            data-field="quantity">
                            <i class="fas fa-minus"></i>
                        </button>
                        <div style="width: 25%" class="d-flex justify-content-center">
                            <input type="number" name="quantity" class="input form-control text-center border-0"
                                id="quantity" value="1" min="1">
                        </div>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                data-field="quantity">
                                <i class="fas fa-plus"></i>
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="desc" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
