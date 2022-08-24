<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="kamar_part" style="margin: 150px;">
    <div class="container-fluid single_padding_top padding_bottom">
        <div class="row justify-content-center">

            <div class="">
                <?php
                $no_kamar = [
                    'name' => 'no_kamar',
                    'id' => 'no_kamar',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $fasilitas = [
                    'name' => 'fasilitas',
                    'id' => 'fasilitas',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $biaya = [
                    'name' => 'biaya',
                    'id' => 'biaya',
                    'value' => null,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                $foto = [
                    'name' => 'foto',
                    'id' => 'foto',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $jumlah = [
                    'name' => 'jumlah',
                    'id' => 'jumlah',
                    'value' => null,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                // $id_kategori = [
                //     'name' => 'id_kategori',
                //     'class' => 'form-control',
                //     'options' => $arrayKategori,
                //     'selected' => null,
                // ];

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


                <div class="tabeltambah card lg-12">
                    <dic class="card-header">
                        <h1>Tambah Kamar</h1>
                    </dic>
                    <div class="card-body">
                        <?= form_open_multipart('Kamar/create') ?>

                        <div class="form-group">
                            <?= form_label("Kamar", "no_kamar") ?>
                            <?= form_input($no_kamar) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Fasilitas", "fasilitas") ?>
                            <?= form_textarea($fasilitas) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Biaya /bulan", "biaya") ?>
                            <?= form_input($biaya) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Jumlah Kamar Tersedia", "jumlah") ?>
                            <?= form_input($jumlah) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Foto Kamar", "foto") ?>
                            <?= form_upload($foto) ?>
                        </div>

                        <div class="text-right">
                            <?= form_submit($submit) ?>

                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
</section>
<?= $this->endSection() ?>