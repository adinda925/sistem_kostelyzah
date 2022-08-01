<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="kamar_part" style="margin: 150px;">
    <div class="container padding_top padding_bottom">
        <div class="row">
            <div class="card mx-auto">
                <div class="card-header">
                    <h4 class="d-inline">Daftar Trashed Kamar</h4>
                    <div class="card-header-action d-inline">
                        <a href="<?= site_url('kamar/index') ?>" class="btn btn-primary mx-3"><i class="fa-solid fa-square-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-responsive">
                        <thead>
                            <th>No</th>
                            <th>Kamar</th>
                            <th>Foto Kamar</th>
                            <th>Fasilitas</th>
                            <th>Biaya /bulan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($kamars as $index => $kamar) : ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $kamar->no_kamar ?></td>
                                    <td>
                                        <img class="img-fluid" width="200px" alt="foto" src="<?= base_url('uploads/' . $kamar->foto) ?>" />
                                    </td>
                                    <td><?= $kamar->fasilitas; ?></td>
                                    <td><?= number_format($kamar->biaya, 2, ',', '.') ?></td>
                                    <td><?= $kamar->id_kategori ?></td>
                                    <td class="">
                                        <a href="<?= site_url('kamar/restore/' . $kamar->id_kamar) ?>" class="d-flex btn btn-success my-2 font_table">Restore</a>
                                        <a href="<?= site_url('kamar/delete2/' . $kamar->id_kamar) ?>" class="d-flex btn btn-danger my-2 font_table">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>