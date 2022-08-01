<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!--================Single Product Area =================-->
<section class="kamar_part" style="margin: 150px;">
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="d-flex justify-content-center">
                    <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $kamar->foto) ?>" />
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3><?= $kamar->no_kamar; ?></h3>
                            <h2><?= "Rp " . number_format($kamar->biaya, 2, ',', '.'); ?> /bulan</h2>
                            <ul class="list">
                                <h6><?= $kategori->kategori; ?> </h6>
                            </ul>
                            <p><?= $kamar->fasilitas; ?></p>
                            <?php if ($kamar->id_kategori == 2) : ?>
                                <div class="card_area d-flex align-items-center">
                                    <a class="primary-btn" href="<?= base_url('daftarkamar/booking/' . $kamar->id_kamar); ?>">Booking Kamar</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Single Product Area =================-->

<?= $this->endSection('content'); ?>