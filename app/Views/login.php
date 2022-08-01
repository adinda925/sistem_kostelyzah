<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 style="color:SaddleBrown">Login</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->

<section class="login_box_area section_gap">
    <div class="d-flex container justify-content-center">
        <div class="col-lg-6">
            <div class="login_form_inner">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <!-- define per form -->
                    <?php
                    $username = [
                        'name' => 'username',
                        'id' => 'username',
                        'value' => null,
                        'class' => 'form-control',
                        'placeholder' => 'Username'
                    ];
                    $password = [
                        'name' => 'password',
                        'id' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    ];

                    $session = session();
                    $errors = $session->getFlashdata('errors');
                    ?>

                    <!-- jika ada error -->
                    <?php if ($errors != null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Terjadi Kesalahan</h4>
                            <hr>
                            <p class="mb-0">
                                <?php
                                foreach ($errors as $err) {
                                    echo $err . '<br>';
                                }
                                ?>
                            </p>
                        </div>
                    <?php endif ?>

                    <?= form_open('Auth/login') ?>
                    <div class="card-body">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="d-none">
                                <?= form_label("Username", "username") ?>
                            </div>
                            <?= form_input($username) ?>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <div class="d-none">
                                <?= form_label("Password", "password") ?>
                            </div>
                            <?= form_password($password) ?>
                        </div>
                        <div class="text-right form-group ">
                            <?= form_submit('submit', 'Submit', ['class' => 'btn btn-warning btn-block mt-3']) ?>
                        </div>
                        <?= form_close('') ?>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="<?= site_url('auth/register') ?>">Belum punya akun? Daftar</a>
                    </div>
                    <div>
                        <div class="text-center">
                            <p><a class="icon-home" href="<?= site_url('home/index') ?>">Kembali</a></p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

</section>

<!--================End Login Box Area =================-->

<?= $this->endSection(); ?>