<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>produk/tambah" class="btn btn-dark">Tambah
                Data Produk Kopi</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data produk kopi.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <h3>Daftar Produk</h3>
            <?php if (empty($produk)) : ?>
                <div class="alert alert-danger" role="alert">
                    data mahasiswa tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($produk as $pr) : ?>
                    <li class="list-group-item">
                        <div>
                            <h5 class="float-right">Kode : <?= $pr['kode']; ?></h5>
                            <h4 class="text-dark"><?= $pr['nama_produk']; ?></h4>
                            <p class="text-secondary">Berat : <?= $pr['berat']; ?> <br>Harga : Rp.<?= $pr['harga']; ?>,00</p>
                        </div>
                        <a href="<?= base_url(); ?>produk/hapus/<?= $pr['kode']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                        <a href="<?= base_url(); ?>produk/ubah/<?= $pr['kode']; ?>" class="badge badge-success float-right">ubah</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>