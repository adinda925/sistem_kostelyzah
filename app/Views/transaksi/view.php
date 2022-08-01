<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container single_padding_top">

        <h4>Transaksi No <?= $transaksi->id_transaksi ?></h4>
        <table class="table table-responsive">
            <tr>
                <td>Nomor Kamar</td>
                <td><?= $transaksi->no_kamar ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= $transaksi->nama ?></td>
            </tr>
            <tr>
                <td>Total Tagihan</td>
                <td><?= $transaksi->biaya ?></td>
            </tr>
        </table>
    </div>
</section>

<?= $this->endSection('content'); ?>