<?php
$db = db_connect();

// Fetch Laptops (type=1)
$laptops = $db->table('models')
    ->select('models.*, brands.b_name')
    ->join('brands', 'brands.b_id = models.b_id', 'left')
    ->where('models.type', '1')
    ->where('models.status', 1)
    ->get()->getResultArray();

// Fetch Desktops (type=2)
$desktops = $db->table('models')
    ->select('models.*, brands.b_name')
    ->join('brands', 'brands.b_id = models.b_id', 'left')
    ->where('models.type', '2')
    ->where('models.status', 1)
    ->get()->getResultArray();

// Group models by brand
$laptopBrands = [];
foreach ($laptops as $lap) {
    $laptopBrands[$lap['b_name'] ?? 'Others'][] = $lap;
}

$desktopBrands = [];
foreach ($desktops as $desk) {
    $desktopBrands[$desk['b_name'] ?? 'Others'][] = $desk;
}

// Cart Count
$cart = session()->get('cart') ?? [];
$cartCount = 0;
foreach ($cart as $item) {
    $cartCount += $item['qty'];
}
?>
<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="u-header-topbar py-1 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a class="text-white u-header-topbar__nav-link" href="mailto:sales@tycheinfosolutions.com"><i class="ec ec-mail mr-1"></i> sales@tycheinfosolutions.com</a>
                        <a class="text-white u-header-topbar__nav-link" href="tel:+919946622288"><i class="ec ec-phone mr-1"></i> +91 9946622288</a> 
                    </div>
                    <!-- Header Icons -->
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 d-none d-xl-block bg-primary topbar-right ml-auto">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <li class="col d-none d-xl-block"><a href="https://www.facebook.com/profile.php?id=100067495727938" target="_blank" class="text-white-90" data-toggle="tooltip" data-placement="top" title="facebook"><i class="font-size-12 fab fa-facebook-f"></i></a></li>
                                <li class="col d-none d-xl-block"><a href="https://api.whatsapp.com/send/?phone=919946622288" target="_blank" class="text-white-90" data-toggle="tooltip" data-placement="top" title="WhatsApp"><i class="font-size-12 fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Logo and Menu -->
        <div class="py-2 py-xl-2 bg-primary-down-lg head-menu">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="<?= base_url() ?>" aria-label="Tyche">
                                <img src="<?= base_url('assets/img/logo.png') ?>" width="100%">
                            </a>
                            <!-- End Logo -->

                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                aria-controls="sidebarHeader1"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarHeader1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                    <span class="u-hamburger__inner"></span>
                                </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->

                        <!-- ========== HEADER SIDEBAR ========== -->
                        <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-header-sidebar__footer-offset pb-0">
                                        <!-- Toggle Button -->
                                        <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                            <button type="button" class="close ml-auto"
                                                aria-controls="sidebarHeader1"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false"
                                                data-unfold-target="#sidebarHeader1"
                                                data-unfold-type="css-animation"
                                                data-unfold-animation-in="fadeInLeft"
                                                data-unfold-animation-out="fadeOutLeft"
                                                data-unfold-duration="500">
                                                <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                            </button>
                                        </div>
                                        <!-- End Toggle Button -->

                                        <!-- Content -->
                                        <div class="js-scrollbar u-sidebar__body">
                                            <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                <!-- Logo -->
                                                <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="<?= base_url() ?>">
                                                   <img src="<?= base_url('assets/img/logo.png') ?>" width="100%">
                                                </a>
                                                <!-- End Logo -->

                                                <!-- List -->
                                                <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                    <!-- Home -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url() ?>">Home</a>
                                                    </li>
                                                    <!-- About Us -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('about-us') ?>">About Us</a>
                                                    </li>
                                                    <!-- Laptops -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('laptops') ?>">Laptops</a>
                                                    </li>
                                                    <!-- Desktops -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('desktops') ?>">Desktops</a>
                                                    </li>
                                                    <!-- Services -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('services') ?>">Services</a>
                                                    </li>
                                                    <!-- Contact Us -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('contact-us') ?>">Contact Us</a>
                                                    </li>
                                                    <!-- Cart -->
                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="<?= base_url('cart') ?>">Cart (<?= $cartCount ?>)</a>
                                                    </li>
                                                </ul>
                                                <!-- End List -->
                                            </div>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->

                    <!-- Primary Menu -->
                    <div class="col d-xl-block">
                        <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                            <!-- Navigation -->
                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav">
                                    <!-- Home -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="<?= base_url() ?>">Home</a>
                                    </li>
                                    <!-- About Us -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                        <a id="aboutMegaMenu" class="nav-link u-header__nav-link" href="<?= base_url('about-us') ?>">About Us</a>
                                    </li>
                                    <!-- Laptops -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                        <a id="laptopsMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?= base_url('laptops') ?>">Laptops</a>
                                        <!-- Laptops Mega Menu -->
                                        <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="laptopsMegaMenu" style="min-width: 700px;">
                                            <div class="row u-header__mega-menu-wrapper">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <?php if (empty($laptopBrands)): ?>
                                                            <div class="col-md-12">
                                                                <span class="text-muted">No Laptop Models Available</span>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php foreach ($laptopBrands as $brandName => $models): ?>
                                                                <div class="col-md-4 mb-3">
                                                                    <span class="u-header__sub-menu-title font-weight-bold text-primary"><?= esc($brandName) ?></span>
                                                                    <ul class="u-header__sub-menu-nav-group list-unstyled mt-2">
                                                                        <?php foreach ($models as $model): ?>
                                                                            <?php $modelSlug = str_replace(' ', '-', strtolower($model['name'])); ?>
                                                                            <li class="mb-1"><a class="dropdown-item py-1 px-0" href="<?= base_url($modelSlug) ?>"><?= esc($model['name']) ?></a></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-none d-md-block">
                                                    <a href="<?= base_url('laptops') ?>" class="d-block">
                                                        <img class="img-fluid rounded" src="<?= base_url('assets/img/laptops/hp-1.jpg') ?>" alt="Laptops">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Desktops -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                        <a id="desktopsMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?= base_url('desktops') ?>">Desktops</a>
                                        <!-- Desktops Mega Menu -->
                                        <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="desktopsMegaMenu" style="min-width: 600px;">
                                            <div class="row u-header__mega-menu-wrapper">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <?php if (empty($desktopBrands)): ?>
                                                            <div class="col-md-12">
                                                                <span class="text-muted">No Desktop Models Available</span>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php foreach ($desktopBrands as $brandName => $models): ?>
                                                                <div class="col-md-6 mb-3">
                                                                    <span class="u-header__sub-menu-title font-weight-bold text-primary"><?= esc($brandName) ?></span>
                                                                    <ul class="u-header__sub-menu-nav-group list-unstyled mt-2">
                                                                        <?php foreach ($models as $model): ?>
                                                                            <?php $modelSlug = str_replace(' ', '-', strtolower($model['name'])); ?>
                                                                            <li class="mb-1"><a class="dropdown-item py-1 px-0" href="<?= base_url($modelSlug) ?>"><?= esc($model['name']) ?></a></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 d-none d-md-block">
                                                    <a href="<?= base_url('desktops') ?>" class="d-block">
                                                        <img class="img-fluid rounded" src="<?= base_url('assets/img/laptops/Hp-desktop.jpg') ?>" alt="Desktops">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Services -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="<?= base_url('services') ?>">Services</a>
                                    </li>
                                    <!-- Contact Us -->
                                    <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="<?= base_url('contact-us') ?>">Contact Us</a>
                                    </li>
                                    <!-- Cart Indicator -->
                                    <li class="nav-item u-header__nav-item ml-xl-auto">
                                        <a class="nav-link u-header__nav-link d-flex align-items-center text-primary" href="<?= base_url('cart') ?>" title="View Cart">
                                            <i class="fas fa-shopping-bag font-size-22 mr-1"></i>
                                            <?php if ($cartCount > 0): ?>
                                                <span class="badge badge-primary rounded-circle" style="font-size: 10px; margin-left: 2px; padding: 4px 6px;"><?= $cartCount ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Navigation -->
                        </nav>
                    </div>
                    <!-- End Primary Menu -->
                </div>
            </div>
        </div>
        <!-- End Logo and Menu -->
    </div>
</header>
<!-- ========== END HEADER ========== -->
