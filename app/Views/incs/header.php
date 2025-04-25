<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <base href="<?= base_url('/'); ?>">
    <title>ZenBlog :: <?= $title ?? ''; ?></title>
    <meta name="description" content="<?= $description ?? ''; ?>">
    <meta name="keywords" content="<?= $keywords ?? ''; ?>">
    <!-- Favicons -->
    <link rel="icon" href="<?= base_url('/images/framework.png'); ?>">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?= base_url('/assets/css/main.css'); ?>" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Updated: Aug 08 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body class="category-page">
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url('/'); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">ZenBlog</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <?php $categories = app()->get('categories', []); ?>
            <ul>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li><a href="<?= base_url('/about'); ?>">About</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="<?= base_url("/category/{$category['slug']}") ?>"><?= $category['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="<?= base_url('/contact'); ?>">Contact</a></li>
                <li class="dropdown"><a href="#"><span>Cabinet</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <?php if (check_auth()): ?>
                            <li><a href="#">Hello, <?= session()->get('user')['name']; ?></a></li>
                            <li><a href="<?= base_url('/logout'); ?>">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?= base_url('/register'); ?>">Register</a></li>
                            <li><a href="<?= base_url('/login'); ?>">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</header>

