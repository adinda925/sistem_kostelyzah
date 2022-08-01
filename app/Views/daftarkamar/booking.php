<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="">
    <?php
    $id_kamar = [
        'name' => 'id_kamar',
        'id' => 'id_kamar',
        'value' => $model->id_kamar,
        'type' => 'hidden',
    ];

    $id_user = [
        'name' => 'id_user',
        'id' => 'id_user',
        'value' => session()->get('id'),
        'type' => 'hidden',
    ];

    $nama = [
        'name' => 'id_user',
        'id' => 'id_user',
        'type' => 'text',
        'class' => 'form-control',
    ];

    $email = [
        'name' => 'id_user',
        'id' => 'id_user',
        'type' => 'text',
        'class' => 'form-control',
    ];

    $no_wa = [
        'name' => 'id_user',
        'id' => 'id_user',
        'type' => 'number',
        'class' => 'form-control',
        'placeholder' => 'cth: 6281345678909'
    ];

    $no_kamar = [
        'name' => 'no_kamar',
        'id' => 'no_kamar',
        'value' => $model->no_kamar,
        'readonly' => true,
        'class' => 'form-control',
    ];

    $biaya = [
        'name' => 'biaya',
        'id' => 'biaya',
        'value' => $model->biaya,
        'readonly' => true,
        'class' => 'form-control',
        'type' => 'number',
        'min' => 0,
    ];

    $tahun = [
        'name' => 'tahun',
        'id' => 'tahun',
        'class' => 'form-control',
        'type' => 'month',
        'selected' => null,
    ];

    $submit = [
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Submit',
        'class' => 'btn btn-warning',
        'type' => 'submit',
    ];
    $session = session();
    $errors = $session->getFlashdata('errors');
    ?>
    <section class="kamar_part" style="margin: 150px;">
        <div class="container-fluid single_padding_top padding_bottom">
            <div class="row justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $model->foto) ?>" />
                                <div class="col-lg-5 offset-lg-1">
                                    <div class="s_product_text">
                                        <h3><?= $model->no_kamar; ?></h3>
                                        <h2><?= "Rp " . number_format($model->biaya, 2, ',', '.'); ?> /bulan</h2>
                                        <p><?= $model->fasilitas; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4" style="margin-left: 100px">
                            <h1>Booking Kamar</h1>
                            </dic>
                            <div class="card-body">
                                <?= form_open_multipart('/daftarkamar/booking') ?>
                                <?= form_input($id_user) ?>
                                <?= form_input($id_kamar) ?>
                                <div class="form-group">
                                    <?= form_label("Nama", "nama") ?>
                                    <?= form_input($nama) ?>
                                </div>
                                <div class="form-group">
                                    <?= form_label("Nomor WhatsApp", "no_wa") ?>
                                    <?= form_input($no_wa) ?>
                                </div>
                                <div class="form-group">
                                    <?= form_label("Email", "email") ?>
                                    <?= form_input($email) ?>
                                </div>
                                <div class="form-group">
                                    <?= form_label("Kamar", "no_kamar") ?>
                                    <?= form_input($no_kamar) ?>
                                </div>

                                <div class="form-group">
                                    <?= form_label("Biaya /bulan", "biaya") ?>
                                    <?= form_input($biaya) ?>
                                </div>
                                <div class="form-group mb-5">
                                    <?= form_label("Tahun Masuk", "tahun") ?>
                                    <br>
                                    <?= form_input($tahun) ?>
                                </div>
                                <div class="text-right">
                                    <?= form_submit($submit) ?>

                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<?= $this->endSection() ?>