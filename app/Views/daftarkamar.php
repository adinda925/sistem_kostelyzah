<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

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
                <?php echo form_open(); ?>
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
                            <hr>
                            <?php if ($m->id_kategori == 2) : ?>
                                <div class="card_area d-flex align-items-center">
                                    <a class="primary-btn" href="<?= base_url('/daftarkamar/booking/' . $m->id_kamar); ?>">Booking Kamar</a>
                                </div>
                                <hr>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>