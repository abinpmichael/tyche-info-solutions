<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-5 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>            
    
    <div class="container mb-8 mb-lg-0">
        <div class="row mb-8">
            <div class="col-lg-6 col-xl-6 col-md-12 col-12">
                <?php 
                if (!empty($about['img'])) {
                    if (file_exists(WRITEPATH . 'uploads/' . $about['img'])) {
                        $aboutImg = base_url('writable/uploads/' . $about['img']);
                    } else {
                        $aboutImg = base_url('assets/img/about/' . $about['img']);
                    }
                } else {
                    $aboutImg = base_url('assets/img/about/about.webp');
                }
                ?>
                <img src="<?= $aboutImg ?>" width="100%">
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-12">
                <div class="card-body subhead-60 pb-2 px-0 continer-head">
                    <h4>About Tyche Info Solutions</h4>
                    
                    <div class="border-bottom">
                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                            <h5>Use Your Gadgets from Tyche Info Solutions</h5>
                        </div>
                    </div>                                    
                    
                    <p></p> 
                </div>
                <p><?= nl2br(esc($about['about'] ?? 'Tyche Info Solutions is a dynamic company specializing in refurbished and rental solutions. Established with a vision to make high-quality and affordable, Tyche began by offering refurbished laptops, desktops, and servers to meet the needs of businesses and individuals. Focusing on sustainability and cost efficiency, Tyche Info Solutions has built a reputation for delivering reliable products and excellent customer support. Tyche ensures its solutions align with clients\' technological and financial goals, whether for startups, educational institutions, or established enterprises.')) ?></p>
            </div>        
        </div>
    </div>
       
    <section id="promo-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/solution-focused-icon.svg') ?>" alt="Tyche">
                    <div class="content"><h4>Guarantee Services</h4></div>
                </div>
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/customer-oriented-icon.svg') ?>" alt="Tyche">
                    <div class="content"><h4>Experienced Team</h4></div>
                </div>
                <div class="col-lg-4 col-12 box">
                    <img src="<?= base_url('assets/img/home/success-icon.svg') ?>" alt="Tyche">
                    <div class="content"><h4>Wide Range of Products</h4></div>
                </div>
            </div>
        </div>
    </section>                 
    
    <div class="clearfix"></div>
    
    <section class="vision-mission">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 pb-2">
                    <div class="box-1">
                        <h2>Our Mission</h2>
                        <p><?= nl2br(esc($about['our_mission'] ?? '')) ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 pb-2">
                    <div class="box-2">
                        <h2>Our Vision</h2>
                        <p><?= nl2br(esc($about['our_vision'] ?? '')) ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 pb-2">
                    <div class="box-3">
                        <h2>Our Values</h2>
                        <p><?= nl2br(esc($about['our_values'] ?? '')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>            
    
    <div class="clearfix"></div>   
    
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>

