<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="kamar_part">
    <div class="container padding_top padding_bottom">
        <?php if (session()->has('pesan')) { ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php } ?>
        <?php $validation = \Config\Services::validation(); ?>

        <?php
        $id_kamar = [
            'name' => 'id_kamar',
            'id' => 'id_kamar',
            'value' => $transaksi->id_kamar,
            'type' => 'hidden'
        ];
        // var_dump($model);
        $id_user = [
            'name' => 'id_user',
            'id' => 'id_user',
            'value' => $transaksi->id_user,
            'type' => 'hidden'
        ];
        $no_wa = [
            'name' => 'no_wa',
            'id' => 'no_wa',
            'value' => $transaksi->no_wa,
            'class' => 'form-control',
            'type' => 'number',
        ];
        $total_tagihan = [
            'name' => 'total_tagihan',
            'id' => 'total_tagihan',
            'value' => $transaksi->total_tagihan,
            'class' => 'form-control',
            'readonly' => true,
        ];
        $denda = [
            'name' => 'denda',
            'id' => 'denda',
            'value' => $transaksi->denda,
            'class' => 'form-control',
            'readonly' => true,
        ];
        $submit = [
            'name' => 'submit',
            'id' => 'submit',
            'type' => 'submit',
            'value' => 'submit',
            'class' => 'btn btn-warning',
        ];

        ?>

        <div class="card">
            <div class="card-header">
                <h1>Tambah kamar</h1>
            </div>
            <div class="card-body">
                <?= form_open('transaksi/update/' . $transaksi->id_transaksi) ?>
                <div class="form-group">
                    <?= form_input($jumlah) ?>
                </div>
                <div class="form-group">
                    <?= form_input($total_tagihan) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Denda /hari', 'denda') ?>
                    <?= form_input($denda) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Nomor WhatsApp', 'no_wa') ?>
                    <?= form_input($no_wa) ?>
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

<?= $this->section('script') ?>
<script src="<?= base_url('ckeditor5/ckeditor.js') ?>"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            ckfinder: {
                uploadUrl: "<?= base_url('kamar/uploadImages') ?>",
            },
        }).then(editor => {
            console.log(editor);
        }).catch(error => {
            console.log(error);
        });
</script>
<?= $this->endSection() ?>