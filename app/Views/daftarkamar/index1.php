<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- start product Area -->
<div class="container" style="margin-top:150px">
    <div class="row justify-content-center">
        <div class="text-center">
            <div class="section-title">
                <h1>Kamar Tersedia</h1>
                <p>Cek kamar tersedia dibawah ini</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($modelkamar as $m) : ?>
            <div class="col-3">
                <div class="single-product">
                    <img class="img-fluid" src="<?= base_url('uploads/' . $m->foto) ?>" alt="">
                    <div class="product-details">
                        <h6><?= $m->no_kamar; ?></h6>
                        <div class="price">
                            <h6><?= "Rp " . number_format($m->biaya, 2, ',', '.'); ?> /bulan</h6>
                        </div>
                        <div class="prd-bottom">
                            <a href="<?= base_url('daftarkamar/fasilitas/' . $m->id_kamar); ?>" class="social-info">
                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">Fasilitas</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- end product Area -->
<?= $this->endSection(); ?>