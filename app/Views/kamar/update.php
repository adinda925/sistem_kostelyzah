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
                    'value' => $kamar->no_kamar,
                    'class' => 'form-control',
                ];

                $fasilitas = [
                    'name' => 'fasilitas',
                    'id' => 'fasilitas',
                    'value' => $kamar->fasilitas,
                    'class' => 'form-control',
                ];

                $biaya = [
                    'name' => 'biaya',
                    'id' => 'biaya',
                    'value' => $kamar->biaya,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                $jumlah = [
                    'name' => 'jumlah',
                    'id' => 'jumlah',
                    'value' => $kamar->jumlah,
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
                        <h1>Update Kamar</h1>
                    </dic>
                    <div class="card-body">
                        <?= form_open_multipart('Kamar/update/' . $kamar->id_kamar) ?>

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
                            <?= form_label("Foto Kamar", "foto") ?><br>
                            <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $kamar->foto) ?>" />
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