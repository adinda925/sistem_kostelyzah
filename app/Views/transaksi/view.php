<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container single_padding_top" style="margin: 150px;">
        <div class="container">
            <div class="row detail justify-content-center">
                <div class="col-sm-6">
                    <h4>Transaksi No <?= $transaksi->id_tagihan ?></h4>
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
                            <td>Email</td>
                            <td><?= $transaksi->email ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><?= $transaksi->no_wa ?></td>
                        </tr>
                        <tr>
                            <td>Total Tagihan</td>
                            <td><?= $transaksi->biaya ?></td>
                        </tr>
                    </table>
                    <button type="button" id="btnPay" class="btn btn-warning">Bayar Tagihan</button>
                </div>
                <div class="col-sm-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-danger">Notice!</h3>
                        </div>
                        <div class="card-body">
                            <h5>Setelah melakukan pembayaran harap membawa fotocopy KTP (Kartu Tanda Penduduk) dan KK (Kartu Keluarga) dihari kepindahan untuk kelengkapan pendataan ke RT/RW setempat.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-XmaaGSrAf6oBh9m_"></script>
<script type="text/javascript">
    document.getElementById('btnPay').onclick = async function() {
        $.ajax({
            url: '<?= base_url() ?>/Payment',
            type: 'POST',
            data: {
                'id': <?= $id ?>,
            },
            dataType: "json",
            success: function(response) {

                console.log(response);
                if (response.status === 'Success') {
                    snap.pay(response.snapToken, {
                        onSuccess: function(result) {
                            let dataResult = JSON.stringify(result, null, 2);
                            let dataObj = JSON.parse(dataResult);

                            $.ajax({
                                url: '<?= base_url() ?>/transaksi/finishMidtrans',
                                type: 'POST',
                                data: {
                                    order_id: dataObj.order_id,
                                    payment_type: dataObj.payment_type,
                                    transaction_time: dataObj.transaction_time,
                                    transaction_status: dataObj.transaction_status,
                                    transaction_status: dataObj.transaction_status,
                                    pdf_url: dataObj.pdf_url,
                                    va_number: dataObj.va_numbers[0].va_number,
                                    bank: dataObj.va_numbers[0].bank,
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response.success) {
                                        alert(response.success);
                                        window.location.reload();
                                    }
                                }
                                /* You may add your own implementation here */
                                // alert("payment success!");
                                // console.log(result);
                            })
                        },
                        onPending: function(result) {
                            /* You may add your own implementation here */
                            alert("wating your payment!");
                            console.log(result);
                        },
                        onError: function(result) {
                            /* You may add your own implementation here */
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                    });
                }
            }
        });
    };
</script>

<?= $this->endSection('content'); ?>