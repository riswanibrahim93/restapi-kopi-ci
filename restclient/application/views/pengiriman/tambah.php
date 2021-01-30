<div class="container" style="padding-top: 30px;">

    <div class="row mt-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="text-white">Form Tambah Data Pengiriman</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_pengiriman">Id Pengiriman</label>
                            <input type="text" name="id_pengiriman" class="form-control" id="id_pengiriman">
                            <small class="form-text text-danger"><?= form_error('id_pengiriman'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="daerah">Daerah</label>
                            <input type="text" name="daerah" class="form-control" id="daerah">
                            <small class="form-text text-danger"><?= form_error('daerah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-dark float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-md-3">
        </div>
    </div>

</div>