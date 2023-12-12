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
                <form>
                    <div class="form-group mb-1">
                        <div class="input-group d-flex align-items-center">
                            <div class="label">
                                <label for="quantity" class="mr-2">Rendang</label> <!-- Tambahkan label di sini -->
                            </div>
                            <div class="d-block ml-auto">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-default btn-number border-0" data-type="minus"
                                        data-field="quantity">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div style="width: 25%" class="d-flex justify-content-center">
                                        <input type="number" name="quantity"
                                            class="input form-control text-center border-0" id="quantity" value="1"
                                            min="1">
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
                    <div class="form-group">
                        <textarea name="deskripsi" id="deskripsi" rows="1" placeholder="Deskripsi..."
                            style="width: 100%;" class="form-control border-0"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-body border-bottom">
                <form>
                    <div class="form-group mb-1">
                        <div class="input-group d-flex align-items-center">
                            <div class="label">
                                <label for="quantity" class="mr-2">Rendang</label> <!-- Tambahkan label di sini -->
                            </div>
                            <div class="d-block ml-auto">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-default btn-number border-0" data-type="minus"
                                        data-field="quantity">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div style="width: 25%" class="d-flex justify-content-center">
                                        <input type="number" name="quantity"
                                            class="input form-control text-center border-0" id="quantity" value="1"
                                            min="1">
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
                    <div class="form-group">
                        <textarea name="deskripsi" id="deskripsi" rows="1" placeholder="Deskripsi..."
                            style="width: 100%;" class="form-control border-0"></textarea>
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