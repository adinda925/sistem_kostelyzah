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
                     <ul class="nav navbar-nav menu_nav ml-auto">
                         <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                         <li class="nav-item"><a class="nav-link" href="<?= base_url('home/daftarkamar') ?>">Rooms List</a></li>
                         <li class="nav-item"><a class="nav-link" href="<?= base_url('home/contact') ?>">Contact Us</a></li>
                         <?php if ($session->get('isLoggedIn') && session()->get('role') == 0) : ?>
                             <li class="nav-item submenu dropdown">
                                 <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Managements</a>
                                 <ul class="dropdown-menu">
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('manage_user'); ?>">Users</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('kamar/create'); ?>">Add Rooms</a></li>
                                     <li class="nav-item"><a class="nav-link" href="<?= base_url('kamar/'); ?>">List Rooms</a></li>
                                 </ul>
                             </li>
                         <?php endif ?>
                         <?php if ($session->get('isLoggedIn')) : ?>
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