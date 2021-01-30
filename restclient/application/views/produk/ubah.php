<div class="container" style="padding-top: 30px;">

    <div class="row mt-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Form Ubah Data Produk Kopi</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="kode" value="<?= $produk['kode']; ?>">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?= $produk['nama_produk']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="berat">Berat</label>
                            <input type="text" name="berat" class="form-control" id="berat" value="<?= $produk['berat']; ?>">
                            <small class="form-text text-danger"><?= form_error('berat'); ?></small>
                        </div>
                         <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $produk['harga']; ?>">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                         <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $produk['deskripsi']; ?>">
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
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