<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Produk Kopi
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pengiriman['id_pengiriman']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pengiriman['daerah']; ?></h6>
                    <p class="card-text"><?= $pengiriman['harga']; ?></p>
                    <a href="<?= base_url(); ?>pengiriman" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>