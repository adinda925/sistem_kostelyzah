 <?php
    $session = session();
    ?>
 <!-- Start Header Area -->
 <header class="header_area sticky-header">
     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light main_box">
             <div class="container">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <a class="navbar-brand logo_h" href="<?= base_url('home') ?>"><img src="<?= base_url(); ?>/img/logo.png" alt=""></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                     <?php if ($session->get('isLoggedIn') && session()->get('role') == 0) : ?>
                         <ul class="nav navbar-nav menu_nav ml-auto">
                             <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>" style="color: red;">Beranda</a></li>
                             <li class="nav-item"><a class="nav-link" href="<?= base_url('home/daftarkamar') ?>" style="color: red;">Daftar Kamar</a></li>
                             <li class="nav-item"><a class="nav-link" href="<?= base_url('home/contact') ?>" style="color: red;">Kontak Kami</a></li>
                             <li class="nav-item submenu dropdown">
                                 <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: red;">Managements</a>
                                 <ul class="dropdown-menu">
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('transaksi/history'); ?>">Transaction History</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('kamar/create'); ?>">Add Rooms</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('kamar/'); ?>">Rooms List</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('user/'); ?>">Users List</a></li>
                                 </ul>
                             </li>
                         <?php else : ?>
                             <ul class="nav navbar-nav menu_nav ml-auto">
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Beranda</a></li>
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('home/daftarkamar') ?>">Daftar Kamar</a></li>
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('home/contact') ?>">Kontak Kami</a></li>
                             <?php endif ?>
                             <?php if ($session->get('isLoggedIn') && session()->get('role') == 0) : ?>
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/logout') ?>" style="color: red;">Logout</a></li>
                             <?php elseif ($session->get('isLoggedIn') && session()->get('role') == 1) : ?>
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                             <?php else : ?>
                                 <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login') ?>">Login</a></li>
                             <?php endif ?>



                             <!-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                    <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li> -->
                             </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
 <!-- End Header Area -->