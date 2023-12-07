<!-- Modal ADD-->
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
