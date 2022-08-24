<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!--================Single Product Area =================-->
<section class="kamar_part" style="margin: 150px;">
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner justify-content-center">
                <div class="d-flex justify-content-center">
                    <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $kamar->foto) ?>" />
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3><?= $kamar->no_kamar; ?></h3>
                            <h2><?= "Rp " . number_format($kamar->biaya, 2, ',', '.'); ?> /bulan</h2>
                            <p><?= $kamar->fasilitas; ?></p>
                            <h6>Jumlah Kamar Tersedia: <?= $kamar->jumlah; ?> kamar</h6>
                            <?php if ($kamar->jumlah != 0) : ?>
                                <div class="card_area d-flex align-items-center">
                                    <a class="primary-btn" href="<?= base_url('daftarkamar/booking/' . $kamar->id_kamar); ?>">Booking Kamar</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php if ($kamar->id_kamar == 1) : ?>
                    <div class="col-lg-8 col-md-12" style="margin: 50px;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar kecil_1.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar kecil_1.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR KECIL</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar kecil_2.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar kecil_2.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR KECIL</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar kecil_3.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar kecil_3.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR KECIL</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($kamar->id_kamar == 2) : ?>
                    <div class="col-lg-8 col-md-12" style="margin: 50px;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar sedang_1.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar sedang_1.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR SEDANG</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar sedang_2.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar sedang_2.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR SEDANG</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar sedang_3.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar sedang_3.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR SEDANG</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($kamar->id_kamar == 3) : ?>
                    <div class="col-lg-8 col-md-12" style="margin: 50px;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_1.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_1.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_2.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_2.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_3.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_3.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-lg-8 col-md-12" style="margin: 50px;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_1.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_1.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_2.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_2.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="<?= base_url('') ?>/img/kamar/kamar besar_3.jpeg" alt="">
                                    <a href="<?= base_url('') ?>/img/kamar/kamar besar_3.jpeg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">KAMAR BESAR</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<!--================End Single Product Area =================-->

<?= $this->endSection('content'); ?>