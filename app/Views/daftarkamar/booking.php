<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="">
    <?php
    // dd(session());
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
        'name' => 'nama',
        'id' => 'nama',
        'type' => 'text',
        'class' => 'form-control',
        'value' => null,
    ];

    $email = [
        'name' => 'email',
        'id' => 'email',
        'type' => 'email',
        'class' => 'form-control',
    ];

    $no_wa = [
        'name' => 'no_wa',
        'id' => 'no_wa',
        'type' => 'number',
        'class' => 'form-control',
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

    $id_bulan = [
        'name' => 'id_kategori',
        'class' => 'form-control',
        'options' => $arraybulan,
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
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="<?= base_url('uploads/' . $model->foto) ?>" alt="">
                        <div class="hover">
                            <h4><?= $model->no_kamar; ?></h4>
                            <h2 style="color: white;"><?= "Rp " . number_format($model->biaya, 2, ',', '.'); ?> /bulan</h2>
                            <p><?= $model->fasilitas; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3>Booking Kamar</h3>
                    </dic>
                    <div class="">
                        <?= form_open_multipart('/daftarkamar/booking-done') ?>
                        <?= form_input($id_user) ?>
                        <?= form_input($id_kamar) ?>
                        <div class="col-md-12 form-group">
                            <?= form_label("Nama", "nama") ?>
                            <?= form_input($nama) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_label("Nomor Telepon", "no_wa") ?>
                            <?= form_input($no_wa) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_label("Email", "email") ?>
                            <?= form_input($email) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_label("Kamar", "no_kamar") ?>
                            <?= form_input($no_kamar) ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <?= form_label("Biaya /bulan", "biaya") ?>
                            <?= form_input($biaya) ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= form_label("Bulan Masuk", "bulan") ?>
                            <br>
                            <div class="default-select">
                                <?= form_dropdown($id_bulan); ?>
                            </div>
                        </div>
                        <div class="text-right">
                            <?= form_submit($submit) ?>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>

            </div>
        </div>
</div>
</section>
<?= $this->endSection() ?>