<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<section class="user_part" style="margin: 150px;">
    <div class="container padding_top padding_bottom">
        <div class="row">
            <div class="card mx-auto">
                <div class="card-header">
                    <h4 class="d-inline">Daftar User</h4>
                </div>
                <div class="card-body">

                    <table class="table table-responsive ">
                        <thead class="">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Nomor WhatsApp</th>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $index => $user) : ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $user->nama ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->no_wa ?></td>
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