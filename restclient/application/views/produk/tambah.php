<div class="container" style="padding-top: 30px;">

    <div class="row mt-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="text-white">Form Tambah Data Produk Kopi</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode">
                            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat</label>
                            <input type="text" name="berat" class="form-control" id="berat">
                            <small class="form-text text-danger"><?= form_error('berat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
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