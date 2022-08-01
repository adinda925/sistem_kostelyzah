<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail justify-content-center">
            <div class="col-12">
                <div class="card mx-auto">
                    <div class="card-header ">
                        <h4 class="d-inline">Data Tagihan</h4>
                    </div>
                    
                    <div class="card-body pb-5">
                        <table class="table table-responsive" id="example">
                            <thead class="">
                                <th>No</th>
                                <th>Nomor Kamar</th>
                                <th>Nama Lengkap</th>
                                <th>Biaya /bulan</th>
                                <th>Nomor WhatsApp</th>
                                <th>Order ID</th>
                                <th>Waktu Transaksi</th>
                                <th>Status</th>
                                <th>Payment Type</th>
                                <th>Invoice</th>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $index => $trans) : ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= $trans->no_kamar ?></td>
                                        <td><?= $trans->nama ?></td>
                                        <td>Rp.<?= number_format($trans->total_tagihan, 2, ',', '.') ?></td>
                                        <td>Rp.<?= number_format($trans->denda, 2, ',', '.') ?></td>
                                        <td><?= $trans->no_wa ?></td>
                                        <td><?= $trans->order_id ?></td>
                                        <td><?= $trans->transaction_time ?></td>
                                        <td><?= $trans->transaction_status ?></td>
                                        <td><?= $trans->payment_type ?></td>
                                        <td><a href="<?= $trans->pdf_url ?>"></a><?= $trans->pdf_url ?></td>
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