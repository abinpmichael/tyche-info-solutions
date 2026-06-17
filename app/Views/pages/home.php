<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Slider & Banner Section -->
    <div class="banner-slick">
        <div class="container overflow-hidden">
            <div class="row">
                <!-- Slider -->
                <div class="col-xl pr-xl-2 mb-4 mb-xl-0">
                    <div class="bg-img-hero mr-xl-1 overflow-hidden">
                        <div class="js-slick-carousel u-slick"
                            data-autoplay="true"
                            data-speed="7000"
                            data-infinite="true" 
                            data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start ml-9 mb-3 mb-md-5">
                            
                            <?php if (!empty($sliders)): ?>
                                <?php foreach ($sliders as $slide): ?>
                                    <div class="js-slide bg-img-hero-center">
                                        <div class="row height-410-xl py-7 py-md-0 mx-0">
                                            <div class="d-none d-wd-block offset-1"></div>
                                            <div class="col-xl col-12 col-md-6 mt-md-8">
                                                 <h1 class="font-size-40 text-lh-30 font-weight-bold" data-scs-animation-in="fadeInUp">
                                                   <?= esc($slide['b_heading']) ?>
                                                </h1>
                                                <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                                    <?= esc($slide['s_heading']) ?>
                                                </h6>
                                                <?php if (!empty($slide['button_name'])): ?>
                                                    <a href="<?= esc($slide['b_link'] ?? '#') ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                                       <?= esc($slide['button_name']) ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-xl-5 col-md-6 col-12 d-flex align-items-center ml-auto ml-md-0"
                                                data-scs-animation-in="zoomIn" data-scs-animation-delay="500">
                                                <img class="img-fluid" src="<?= base_url('writable/uploads/slider/' . $slide['img']) ?>" alt="<?= esc($slide['b_heading']) ?>">
                                            </div>
                                        </div>
                                    </div>                                    
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider & Banner Section -->  

    <div style="padding: 20px 0px; background: linear-gradient(90deg, rgba(3,70,239,1) 0%, rgba(4,147,241,1) 50%);">  
        <div class="container">
            <div class="sub-head-one row d-flex border-color-1 mr-md-2">
                <h3 class="section-title section-title__full mb-0 pb-4 font-size-22 text-white">Explore our Wide Range of Products</h3>
            </div>                    
             
            <!-- Banner -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 mb-1 mb-xl-3 col-xl-3 col-wd-3 flex-shrink-0 flex-xl-shrink-1 tyche-types">
                    <a href="<?= base_url('laptops') ?>" class="min-height-100 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                        <div class="col-6 col-xl-6 col-wd-6 pr-0">
                            <img class="img-fluid" src="<?= base_url('assets/img/home/rental-laptops.jpeg') ?>" alt="Rental Laptops">
                        </div>
                        <div class="col-6 col-xl-6 col-wd-6 pr-xl-4 pr-wd-3">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                               <strong>Rental<br> Laptops</strong>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-6 mb-1 mb-xl-3 col-xl-3 col-wd-3 flex-shrink-0 flex-xl-shrink-1 d-wd-block tyche-types">
                    <a href="<?= base_url('desktops') ?>" class="min-height-100 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                        <div class="col-6 col-xl-6 col-wd-6 pr-0">
                            <img class="img-fluid" src="<?= base_url('assets/img/home/rental-desktops.png') ?>" alt="Rental Desktops">
                        </div>
                        <div class="col-6 col-xl-6 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                 <strong>Rental<br> Desktops</strong>
                            </div>
                        </div>
                    </a>
                </div>                    

                <div class="col-12 col-sm-6 col-md-6 mb-1 mb-xl-3 col-xl-3 col-wd-3 flex-shrink-0 flex-xl-shrink-1 tyche-types">
                    <a href="<?= base_url('laptops') ?>" class="min-height-100 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                        <div class="col-6 col-xl-6 col-wd-6 pr-0">
                            <img class="img-fluid" src="<?= base_url('assets/img/home/refurbished-laptops.jpeg') ?>" alt="Refurbished Laptops">
                        </div>
                        <div class="col-6 col-xl-6 col-wd-6 pr-xl-4 pr-wd-3">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                               <strong> Refurbished Laptops</strong>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-6 mb-1 mb-xl-3 col-xl-3 col-wd-3 flex-shrink-0 flex-xl-shrink-1 tyche-types">
                    <a href="<?= base_url('desktops') ?>" class="min-height-100 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                        <div class="col-6 col-xl-6 col-wd-6 pr-0">
                            <img class="img-fluid" src="<?= base_url('assets/img/home/refurbished-desktops.jpeg') ?>" alt="Refurbished Desktops">
                        </div>
                        <div class="col-6 col-xl-6 col-wd-6 pr-xl-4 pr-wd-3">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                 <strong> Refurbished Desktops</strong>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Banner -->
        </div>
    </div>  

    <!-- Welcome Section -->
    <div class="mb-6" style="background: #FFF;">
        <div class="container">
            <div class="card-body subhead-60 pt-10 pb-6 px-0 continer-head">
                <h4>Welcome to <span class="welcome-tyche">Tyche Info Solutions</span></h4>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <h5>Best Dealers for Rental and Refurbished Services in Kochi</h5>
                    </div>
                </div>
            </div>                    
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-5 col-wd-5">
                    <?php if (!empty($home['w_img'])): ?>
                        <img class="img-fluid" src="<?= base_url('writable/uploads/home/' . $home['w_img']) ?>" width="100%" alt="Welcome Image">
                    <?php else: ?>
                        <img class="img-fluid" src="<?= base_url('assets/img/ads/ads.webp') ?>" width="100%" alt="Tyche Solutions">
                    <?php endif; ?>
                </div>
                <div class="col-12 col-lg-8 col-xl-7 col-wd-7 pt-6 pt-md-0">
                    <?= $home['welcome_note'] ?? '' ?>
                    <?php if (!empty($home['r_link'])): ?>
                        <div class="mt-3">
                            <a href="<?= esc($home['r_link']) ?>" class="btn btn-primary transition-3d-hover">Read More</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us & Industries We Serve -->
    <?php if (!empty($home['why']) || !empty($home['we_serve'])): ?>
        <div class="mb-6 py-6" style="background: #F8F9FA;">
            <div class="container">
                <?php if (!empty($home['why'])): ?>
                    <div class="mb-6 why-wrapp">
                        <?= $home['why'] ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($home['we_serve'])): ?>
                    <div class="we-serve-wrapp">
                        <?= $home['we_serve'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Promo Bar -->
    <section id="promo-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/solution-focused-icon.svg') ?>" alt="Guarantee Services">
                    <div class="content"><h4>Guarantee Services</h4></div>
                </div>
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/customer-oriented-icon.svg') ?>" alt="Experienced Team">
                    <div class="content"><h4>Experienced Team</h4></div>
                </div>
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/success-icon.svg') ?>" alt="Wide Range of Products">
                    <div class="content"><h4>Wide Range of Products</h4></div>
                </div>
            </div>
        </div>
    </section>            

    <!-- Laptops -->
    <div class="container">
        <div class="card-body subhead-60 pb-6 px-0 continer-head">
            <h4>Laptops</h4>
            <div class="border-bottom">
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <h5>Explore our latest collection of Rental and Refurbished laptops available for booking now.</h5>
                </div>
            </div>
        </div>                
        <div class="mb-6 position-relative tyche-slider-dot">
            <div class="js-slick-carousel pt-3 pb-3" data-pagi-classes="text-center right-0 bottom-1 left-0 mb-0 z-index-n1 mt-4">
                <div class="js-slide js-slide-one">
                    <ul class="row list-unstyled products-group no-gutters mb-0 ">
                        <?php if (!empty($laptops)): ?>
                            <?php foreach ($laptops as $index => $product): ?>
                                <?php 
                                $slug = str_replace(' ', '-', strtolower(trim($product['name'])));
                                $borderClass = ($index % 3 != 2) ? 'border-bottom border-md-bottom-0' : 'remove-divider';
                                ?>
                                <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 <?= $borderClass ?>">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner p-md-3 row no-gutters">
                                            <div class="col col-lg-auto col-xl-5 col-wd-auto product-media-left">
                                                <a href="<?= base_url($slug) ?>" class="max-width-150 d-block">
                                                    <img class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>">
                                                </a>
                                            </div>
                                     
                                            <div class="col col-xl-7 col-wd product-item__body pl-2 pl-lg-3 pl-xl-0 pl-wd-3">
                                                <div class="mb-xl-2">
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Processor - <?= esc($product['processor']) ?></a></h5>
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Storage - <?= esc($product['storage']) ?></a></h5>
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Screen size - <?= esc($product['screen_size']) ?>"</a></h5>
                                                </div>
                                            </div>
                                            <div class="col col-12 mt-2">
                                                <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-blue font-weight-medium"><?= esc($product['name']) ?> - <?= esc($product['s_desc']) ?></a></h5>
                                            </div> 
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="col-12 p-5 text-center text-muted">No laptop models available.</li>
                        <?php endif; ?>
                    </ul>
                    <?php if (!empty($laptops)): ?>
                        <div class="row tyche-btn-start">
                            <a href="<?= base_url('laptops') ?>" class="tyche-btn transition-3d-hover"><i class="ec ec-add-to-cart mr-2"></i> View More </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Banner 2 columns -->
    <div class="container mb-8">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <a href="<?= base_url('laptops') ?>">
                    <img class="img-fluid" src="<?= base_url('assets/img/690X150/Mac-book.jpg') ?>" alt="MacBook">
                </a>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('desktops') ?>">
                    <img class="img-fluid" src="<?= base_url('assets/img/690X150/Web-cam.jpg') ?>" alt="Web Cam">
                </a>
            </div>
        </div>
    </div>
    <!-- End Banner 2 columns -->            
    
    <!-- Desktops -->
    <div class="container">
        <div class="card-body subhead-60 pb-6 px-0 continer-head">
            <h4>Desktops</h4>
            <div class="border-bottom">
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <h5>Explore our latest collection of Rental and Refurbished Desktops available for booking now.</h5>
                </div>
            </div>
        </div> 
        <div class="mb-6 position-relative tyche-slider-dot">
            <div class="js-slick-carousel pt-3 pb-3" data-pagi-classes="text-center right-0 bottom-1 left-0 mb-0 z-index-n1 mt-4">
                <div class="js-slide js-slide-one">
                    <ul class="row list-unstyled products-group no-gutters mb-0 ">
                        <?php if (!empty($desktops)): ?>
                            <?php foreach ($desktops as $index => $product): ?>
                                <?php 
                                $slug = str_replace(' ', '-', strtolower(trim($product['name'])));
                                $borderClass = ($index % 3 != 2) ? 'border-bottom border-md-bottom-0' : 'remove-divider';
                                ?>
                                <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 <?= $borderClass ?>">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner p-md-3 row no-gutters">
                                            <div class="col col-lg-auto col-xl-5 col-wd-auto product-media-left">
                                                <a href="<?= base_url($slug) ?>" class="max-width-150 d-block">
                                                    <img class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>">
                                                </a>
                                            </div>
                                     
                                            <div class="col col-xl-7 col-wd product-item__body pl-2 pl-lg-3 pl-xl-0 pl-wd-3">
                                                <div class="mb-xl-2">
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Processor - <?= esc($product['processor']) ?></a></h5>
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Storage - <?= esc($product['storage']) ?></a></h5>
                                                    <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-gray-90 font-weight-normal">Screen size - <?= esc($product['screen_size']) ?>"</a></h5>
                                                </div>
                                            </div>
                                            <div class="col col-12 mt-2">
                                                <h5 class="product-item__title"><a href="<?= base_url($slug) ?>" class="text-blue font-weight-medium"><?= esc($product['name']) ?> - <?= esc($product['s_desc']) ?></a></h5>
                                            </div> 
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="col-12 p-5 text-center text-muted">No desktop models available.</li>
                        <?php endif; ?>
                    </ul>
                    <?php if (!empty($desktops)): ?>
                        <div class="row tyche-btn-start">
                            <a href="<?= base_url('desktops') ?>" class="tyche-btn transition-3d-hover"><i class="ec ec-add-to-cart mr-2"></i> View More </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>            
    </div>
    <!-- End Desktops -->

    <!-- Brand Carousel -->
    <div class="container mb-8">
        <div class="card-body subhead-60 pb-6 px-0 continer-head">
            <h4>Our Brands</h4>
            <div class="border-bottom">
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <h5>Bringing you products from the world’s best brands.</h5>
                </div>
            </div>
        </div>             
        <div class="mb-5">
            <div class="row">
                <?php if (!empty($brands)): ?>
                    <?php foreach ($brands as $brand): ?>
                        <div class="col-md-4 mb-4 mb-xl-2 col-xl-2 col-6">
                            <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center justify-content-center">
                                <a href="<?= base_url('laptops?brand=' . $brand['b_id']) ?>">
                                    <img class="img-fluid" src="<?= base_url('writable/uploads/brand/' . $brand['img']) ?>" alt="<?= esc($brand['b_name']) ?>" style="max-height: 60px; object-fit: contain;">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted">No brands found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End Brand Carousel -->

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
