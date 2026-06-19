<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<?php
if (!function_exists('parseProcessor')) {
    function parseProcessor($processor) {
        if (empty($processor)) {
            return ['', ''];
        }
        $p = trim($processor);
        if (strpos($p, '-') !== false) {
            $parts = explode('-', $p, 2);
            return [trim($parts[0]), trim($parts[1])];
        }
        if (stripos($p, 'Intel ') === 0) {
            $p = substr($p, 6);
        }
        $parts = explode(' ', $p, 2);
        if (count($parts) == 2) {
            $key = trim($parts[0]);
            if (preg_match('/^i[3579]$/i', $key)) {
                $key = "Core " . $key;
            }
            return [$key, trim($parts[1])];
        }
        return ['Processor', $p];
    }
}
?>

<style>
.about-area { position: relative;}
.about-left { position: relative; z-index: 1;}
.about-img-1 { width: 100%;}
.about-img-1 img { width: 100%; border-radius: 50px;}
.about-img-2 { position: absolute; bottom: 50px; right: 0px; max-width: 250px;}
.about-img-2 img { width: 100%; border-radius: 20px; border: 20px solid var(--color-white);}
.about-shape { position: absolute; left: -32px; bottom: -32px; z-index: -1;}
.about-left::before { content: ""; position: absolute; left: -32px; top: -32px; width: 200px; height: 200px; border-radius: 50px; background: var(--theme-color); opacity: .1; z-index: -1;}
.about-experience { position: absolute; right: 20%; top: -30px; border-radius: 100px; padding: 18px 20px; background: var(--theme-color); color: var(--color-white); display: flex; gap: 12px; align-items: center; justify-content: center; box-shadow: var(--box-shadow);}
.about-experience::before { content: ""; position: absolute; left: 5px; right: 5px; top: 5px; bottom: 5px; border: 2px dashed var(--color-white); border-radius: 100px;}
.about-experience h1 { color: var(--color-white); font-size: 55px; font-weight: 700;}
.about-experience-text { line-height: 1.5; font-size: 16px; font-weight: 500;}
.about-right { position: relative; display: block; padding-left: 30px;}
.about-list-wrap { position: relative; display: block; margin-top: 20px; margin-bottom: 10px;}
.about-list { position: relative; display: block; border: 1px solid var(--border-info-color); border-radius: 35px; padding: 20px;}
.about-list li { position: relative; display: flex; gap: 15px; border-bottom: 1px solid var(--border-info-color); margin-bottom: 15px; padding-bottom: 15px;}
.about-list li:last-child { border-bottom: none; padding: 0; margin: 0;}
.about-list li .icon { width: 70px; height: 70px; line-height: 70px; background: var(--theme-color); border-radius: 50px; text-align: center;}
.about-list li .icon img{ width: 42px; filter: brightness(0) invert(1);}
.about-list li .content{ flex: 1;}
.about-list li .content h4{ color: var(--color-dark); font-size: 22px;}
.about-list li .content p { margin-top: 10px;}
.py-120 { padding: 40px 0px 90px 0px;}
.d-flex-1 { box-shadow: rgb(0 0 0 / 12%) 3px 0px 20px 1px; width: 25%; display: flex !important; flex-direction: column; height: 200px; padding: 30px 40px; background: #fff; justify-content: space-evenly;}
.d-flex-1 p {font-weight: 500; margin-bottom: 0px; padding-top: 5px; color: #000000; text-align: center; font-size: 18px !important;}
.why-wrapp .why-row1 {display:flex; flex-wrap: wrap; justify-content:center; width: 100%; position: relative; margin: 0 auto;  max-width: 800px;}
.why-wrapp .why-row1 .why-col1 { width: 33.33%;}

@media all and (max-width: 1440px) {
    .about-img-2 { position: absolute; bottom: 154px; right: -28px; max-width: 293px;}   
}
@media all and (max-width: 991px) {
    .about-right {margin-top: 80px;}
    .why-wrapp .why-row1 .why-col1 { width: 33.33%;}
}
@media all and (max-width: 767px) {
    .why-wrapp .why-row1 .why-col1 { width: 50%; padding: 30px 30px;}
    .tyche-types { padding-left: 15px !important; padding-right: 15px !important;}
}
@media all and (max-width: 500px) {  
    .banner-slick { padding: 80px 0px 0px 0px;}    
    .about-img-2 { display: none;}
    .about-right { margin-top: 10px;}
    .about-right { padding-left: 0px;}
    .py-120 { padding: 75px 0;}
}    
.product-float {
    float: none !important;
    clear: none !important;
}
.product-border {
    float: none !important;
    clear: none !important;
    border: 1px solid #047df0 !important;
    border-radius: 8px !important;
    padding: 10px !important;
    margin-bottom: 30px !important;
    background: #fff;
    transition: all 0.3s ease;
}
.product-border:hover {
    box-shadow: 0 4px 15px rgba(4, 125, 240, 0.15);
}
</style>

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
                            data-speed="5000"
                            data-infinite="true" 
                            data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start ml-9 mb-3 mb-md-5">
                            
                            <?php if (!empty($sliders)): ?>
                                <?php foreach ($sliders as $slide): ?>
                                    <div class="js-slide bg-img-hero-center">
                                        <div class="row height-410-xl py-7 py-md-0 mx-0">
                                            <div class="d-none d-wd-block offset-1"></div>
                                            <div class="col-xl col-12 col-md-6 mt-md-8">
                                                 <div class="" style="font-size: 18px; color:#0357ef; font-weight: 600; margin-bottom: 20px;">Get Started Today</div>
                                                 <h1 class="font-size-40 text-lh-30 font-weight-bold" data-scs-animation-in="fadeInUp">
                                                   <?= esc($slide['b_heading']) ?>
                                                </h1>
                                                <h6 class="font-size-15 mb-3" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
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

    <!-- Wide Range of Products Banner Section -->
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
                               <strong>Refurbished Laptops</strong>
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
                                 <strong>Refurbished Desktops</strong>
                             </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Banner -->
        </div>
    </div>  

    <!-- Welcome Section (Styled about-area) -->
    <div class="about-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="about-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInLeft;">
                        <div class="about-img">
                            <div class="about-img-1 col-12">
                                <?php if (!empty($home['w_img'])): ?>
                                    <img src="<?= base_url('writable/uploads/home/' . $home['w_img']) ?>" alt="Welcome Image">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/img/ads/ads1.jpg') ?>" alt="Welcome Image">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="about-shape"><img src="<?= base_url('assets/img/about/01.png') ?>" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                        <div class="card-body subhead-60 pt-6 pb-4 px-0 continer-head">
                            <span class="eleven">
                                <<?= esc($home['welcome_title_tag'] ?? 'h4') ?>><?= esc($home['welcome_title'] ?? 'Welcome to Tyche Info Solutions') ?></<?= esc($home['welcome_title_tag'] ?? 'h4') ?>>
                            </span>
                            <div>
                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                    <<?= esc($home['welcome_subtitle_tag'] ?? 'h5') ?>><?= esc($home['welcome_subtitle'] ?? 'Best Dealers for Rental and Refurbished Services in Kochi') ?></<?= esc($home['welcome_subtitle_tag'] ?? 'h5') ?>>
                                </div>
                            </div>
                        </div>
                        <!-- Clean and show welcome note paragraphs -->
                        <?php if (!empty($home['welcome_note'])): ?>
                            <?= str_replace('href="about-us.php"', 'href="'.base_url('about-us').'"', $home['welcome_note']) ?>
                        <?php else: ?>
                            <p>Tyche Info Solutions is a dynamic company dedicated to providing top-notch refurbished and rental solutions built on the principles of quality and affordability. Tyche Info Solutions began by offering refurbished laptops, desktops, and servers to meet the needs of businesses and individuals. Focusing on sustainability and cost efficiency.</p>
                            <p>Tyche Info Solutions has built a reputation for delivering reliable products and excellent customer support. Tyche Info Solutions ensures its solutions align with clients' technological and financial goals, whether for startups, educational institutions, or established enterprises.</p>
                            <p>We provide the best computing solutions at the best rates all over Kochi. Tyche Info Solutions is the one-stop solution to fulfill your business requirement for IT equipment in Kochi.</p>
                            <a href="<?= base_url('about-us') ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16">Read More</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo Bar Section -->
    <section id="promo-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/solution-focused-icon.svg') ?>" alt="Guaranteed Services">
                    <div class="content"><h4>Guaranteed Services</h4></div>
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
    
    <div class="clearfix"></div>

    <!-- Our Laptops and Desktops Collections Section (Dynamic card grid) -->
    <section class="mb-9"> 
        <div class="container">
            <div class="row">
                <div class="card-body subhead-60 px-0 continer-head">
                    <span class="eleven">
                        <<?= esc($home['products_title_tag'] ?? 'h4') ?>><?= esc($home['products_title'] ?? 'Our Laptops and Desktops Collections') ?></<?= esc($home['products_title_tag'] ?? 'h4') ?>>
                    </span>
                    <div>
                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                            <<?= esc($home['products_subtitle_tag'] ?? 'h5') ?>><?= esc($home['products_subtitle'] ?? 'Latest collection of Rental & Refurbished laptops and Desktops available.') ?></<?= esc($home['products_subtitle_tag'] ?? 'h5') ?>>
                        </div>
                    </div>
                </div>    
            </div>  

            <div class="row">
                <?php 
                $featuredModels = array_merge($laptops ?? [], $desktops ?? []);
                // Limit to 8 models
                $featuredModels = array_slice($featuredModels, 0, 8);
                ?>
                <?php if (!empty($featuredModels)): ?>
                    <?php foreach ($featuredModels as $product): ?>
                        <?php 
                        $slug = str_replace(' ', '-', strtolower(trim($product['name'])));
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 product-float mb-4"> 
                            <div class="product-item__inner px-xl-4 px-lg-2 px-2 product-border h-100 d-flex flex-column justify-content-between">
                                <div class="product-item__body pb-xl-2 flex-grow-1">
                                    <div class="mb-2">
                                        <div class="mb-2 text-center" style="height: 180px;">
                                            <a href="<?= base_url($slug) ?>" class="d-flex align-items-center justify-content-center h-100">
                                                <img class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                            </a>
                                        </div>
                                        <h5 class="mb-1 product-item__title">
                                            <a href="<?= base_url($slug) ?>" class="text-blue font-weight-bold"><?= esc(strtoupper($product['name'])) ?></a>
                                        </h5>  
                                        <div class="mb-2">
                                            <a href="<?= base_url($slug) ?>" class="font-size-16 text-gray-5 text-decoration-none d-block" style="line-height: 1.4;"><?= esc($product['s_desc']) ?></a>
                                        </div>
                                    </div>

                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <?php if (!empty($product['processor'])): ?>
                                                <?php 
                                                $proc = parseProcessor($product['processor']);
                                                ?>
                                                <tr>
                                                    <th class="border-top-0 py-1" style="font-weight: bold; width: 45%; background: none !important;"><?= esc($proc[0]) ?></th>
                                                    <td class="border-top-0 py-1" style="width: 55%; background: none !important;"><?= esc($proc[1]) ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if (!empty($product['storage'])): ?>
                                                <tr>
                                                    <th class="py-1" style="font-weight: bold; background: none !important;">Storage</th>
                                                    <td class="py-1" style="background: none !important;"><?= esc($product['storage']) ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if (!empty($product['screen_size'])): ?>
                                                <tr>
                                                    <th class="py-1" style="font-weight: bold; background: none !important;">Screen size</th>
                                                    <td class="py-1" style="background: none !important;"><?= esc($product['screen_size']) ?><?= (strpos($product['screen_size'], '"') === false) ? '"' : '' ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted py-5">No products available.</div>
                <?php endif; ?>
            </div> 

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 view-more-p text-center mt-4"> 
                <a href="<?= base_url('laptops') ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16" style="margin-right: 20px;">View More Laptops</a>  
                <a href="<?= base_url('desktops') ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16">View More Desktops</a>
            </div>  
        </div> 
    </section>
                  
    <div class="clearfix"></div>             

    <!-- Why Choose Us Section --> 
    <div class="bg-gray-1 py-6 mb-5 why-wrapp">
        <div class="container">
            <div class="card-body subhead-60 pb-4 px-0 continer-head">
                <span class="eleven">
                    <<?= esc($home['why_title_tag'] ?? 'h4') ?>><?= esc($home['why_title'] ?? 'Why Choose Us') ?></<?= esc($home['why_title_tag'] ?? 'h4') ?>>
                </span>
                <div>
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <<?= esc($home['why_subtitle_tag'] ?? 'h5') ?>><?= esc($home['why_subtitle'] ?? 'Tyche Info Solutions is Kerala\'s leading provider of rental solutions.') ?></<?= esc($home['why_subtitle_tag'] ?? 'h5') ?>>
                    </div>
                </div> 
            </div> 
            
            <div class="row">
                <div class="col-md-12 mb-5 mb-xl-0 col-xl text-center">
                    <div class="mb-5">
                        <div class="why-row1">
                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/competitive-pricing.png') ?>" alt="Competitive Pricing"><p>Competitive Pricing</p>
                            </div>

                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/fast-delivery.png') ?>" alt="Super Fast Delivery"><p>Super Fast Delivery</p> 
                            </div>

                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/flexible-tenure.png') ?>" alt="Flexible Tenure Scheme"><p>Flexible Tenure Scheme</p>
                            </div> 

                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/corporate-and-bulk-deal.png') ?>" alt="Corporate and Bulk Deal"><p>Corporate and Bulk Deal</p>
                            </div>

                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/post-rental-support.png') ?>" alt="Post Rental Support"><p>Post Rental Support</p>
                            </div>

                            <div class="why-col1 py-1 d-flex-1 white-box-1 align-items-center mb-3">
                                <img src="<?= base_url('assets/img/icons/comprehensive-solutions.png') ?>" alt="Comprehensive Solutions"><p>Comprehensive Solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                

    <div class="clearfix"></div>

    <!-- Our Brands Section -->
    <div class="container mb-8">
        <div class="card-body subhead-60 pb-4 px-0 continer-head">
            <span class="eleven">
                <<?= esc($home['brands_title_tag'] ?? 'h4') ?>><?= esc($home['brands_title'] ?? 'Our Brands') ?></<?= esc($home['brands_title_tag'] ?? 'h4') ?>>
            </span>
            <div>
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <<?= esc($home['brands_subtitle_tag'] ?? 'h5') ?>><?= esc($home['brands_subtitle'] ?? 'Bringing you products from the world’s best brands.') ?></<?= esc($home['brands_subtitle_tag'] ?? 'h5') ?>>
                </div>
            </div>
        </div>             
        <div class="mb-5">
            <div class="row">
                <?php if (!empty($brands)): ?>
                    <?php foreach ($brands as $brand): ?>
                        <div class="col-md-4 mb-4 mb-xl-2 col-xl-2 col-6">
                            <div class="min-height-132 py-1 d-flex white-box-1 align-items-center justify-content-center">
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

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
