<div class="container" style="padding-top: 30px;">

    <div class="row mt-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Form Ubah Data Pengiriman</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_pengiriman" value="<?= $pengiriman['id_pengiriman']; ?>">
                        <div class="form-group">
                             <label for="daerah">Daerah</label>
                            <input type="text" name="daerah" class="form-control" id="daerah" value="<?= $pengiriman['daerah']; ?>">
                            <small class="form-text text-danger"><?= form_error('daerah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $pengiriman['harga']; ?>">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-dark float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>

</div>