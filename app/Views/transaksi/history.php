<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail justify-content-center">
            <div class="col-8" style="margin: 150px;">
                <div class="card mx-auto">
                    <div class="card-header ">
                        <h4 class="d-inline">Data Transaksi</h4>
                    </div>
                    <div class="card-body pb-5">
                        <table class="table table-responsive" id="example">
                            <thead class="">
                                <th>No</th>
                                <th>Nomor Kamar</th>
                                <th>Nama Lengkap</th>
                                <th>Biaya /bulan</th>
                                <th>Nomor WhatsApp</th>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $index => $trans) : ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= $trans->no_kamar ?></td>
                                        <td><?= $trans->nama ?></td>
                                        <td>Rp.<?= number_format($trans->biaya, 2, ',', '.') ?></td>
                                        <td><?= $trans->no_wa ?></td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        });
    });
</script>
<?= $this->endSection() ?>