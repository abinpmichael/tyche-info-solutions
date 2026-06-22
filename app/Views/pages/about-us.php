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
    
    <section id="content-section" class="services-page pb-5 pt-2">
        <div class="card-body subhead-60 pb-6 px-0 continer-head">
            <?php 
            $aboutTitleTag = esc($about['about_title_tag'] ?? 'h4');
            $aboutTitleText = esc($about['about_title'] ?? 'About Tyche Info Solutions');
            $aboutSubtitleTag = esc($about['about_subtitle_tag'] ?? 'h5');
            $aboutSubtitleText = esc($about['about_subtitle'] ?? 'Use Your Gadgets from Tyche Info Solutions');
            ?>
            <span class="eleven"><<?= $aboutTitleTag ?>><?= $aboutTitleText ?></<?= $aboutTitleTag ?>></span>
            <div>
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <<?= $aboutSubtitleTag ?>><?= $aboutSubtitleText ?></<?= $aboutSubtitleTag ?>>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="services-listing">
                <div class="row box pb-6">
                    <div class="col-lg-6">
                        <div class="content">
                            <div><?= $about['about'] ?? 'Tyche Info Solutions is a dynamic company dedicated to providing top-notch refurbished and rental solutions built on the principles of quality and affordability.' ?></div>
                            
                            <div class="row justify-content-between" id="cat-slider" style="justify-content: space-around !important;">
                                <a href="<?= base_url('laptops') ?>" class="col-lg-2 col-3 d-flex flex-column align-items-center mb-3 mb-md-0 link link-dark">
                                    <div class="image mb d-flex align-items-end justify-content-center mb-2">
                                        <img src="<?= base_url('assets/img/about/66f2f767a934a.png') ?>" alt="Laptops" style="width:100%; bottom:0%;">
                                    </div>
                                    <span class="text-center" style="font-size:0.9rem;font-weight:500">Laptops</span>
                                </a>
                                <a href="<?= base_url('desktops') ?>" class="col-lg-2 col-3 d-flex flex-column align-items-center mb-3 mb-md-0 link link-dark">
                                    <div class="image mb d-flex align-items-end justify-content-center mb-2">
                                        <img src="<?= base_url('assets/img/about/66f2f767a9292.png') ?>" alt="Desktops" style="width:100%; bottom:0%;">
                                    </div>
                                    <span class="text-center" style="font-size:0.9rem;font-weight:500">Desktops</span>
                                </a>
                                <a href="<?= base_url('laptops') ?>" class="col-lg-2 col-3 d-flex flex-column align-items-center mb-3 mb-md-0 link link-dark">
                                    <div class="image mb d-flex align-items-end justify-content-center mb-2">
                                        <img src="<?= base_url('assets/img/about/66f2f767a91f1.png') ?>" alt="Macbook" style="width:100%; bottom:0%;">
                                    </div>
                                    <span class="text-center" style="font-size:0.9rem;font-weight:500">Macbook</span>
                                </a>
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php 
                        $aboutImg = base_url('assets/img/about/about-3.jpg');
                        if (!empty($about['img'])) {
                            if (file_exists(WRITEPATH . 'uploads/' . $about['img'])) {
                                $aboutImg = base_url('writable/uploads/' . $about['img']);
                            } else if (file_exists(FCPATH . 'assets/img/about/' . $about['img'])) {
                                $aboutImg = base_url('assets/img/about/' . $about['img']);
                            }
                        }
                        ?>
                        <figure class="bg-img" style="background-image: url('<?= $aboutImg ?>');"></figure>
                    </div>			
                </div>
            </div>   
        </div>           
        
        <div class="clearfix"></div>

        <!-- Industries We Serve -->
        <div class="bg-gray-1 py-12">
            <div class="container">
                <div class="card-body subhead-60 pb-6 px-0 continer-head">
                    <span class="eleven"><h4>Industries We Serve</h4></span>
                    <div>
                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                            <h5>Tyche Info Solution, the most trusted name in laptop rentals, <br>provides customized solutions to meet the unique needs of every industry.</h5>
                        </div>
                    </div>                   
                </div>                    
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12 mb-5 mb-xl-0 col-xl text-center">
                        <div class="industre-circle">
                            <ul class="circle">
                                <li>IT and Technology Innovators</li>
                                <li>New Ventures or start-ups</li>
                                <li>Hospital & Clinics</li>  
                                <li>Videos & Gaming Industry</li>
                                <li>Shops & Supermarkets</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-12 mb-5 mb-xl-0 col-xl text-center">
                        <img src="<?= base_url('assets/img/home/industries-we-serve.jpg') ?>" width="100%" alt="Industries We Serve">
                    </div>                        
                    <div class="col-xl-4 col-lg-4 col-12 mb-5 mb-xl-0 col-xl text-center">
                        <div class="industre-circle">
                            <ul class="circle">
                                <li>Work from home & Freelancers</li>
                                <li>Event Management & Coordinators</li>
                                <li>Government & Private Sector</li>  
                                <li>Schools & Colleges</li>
                                <li>Hotel & Restaurants</li>
                            </ul>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>                
    </section>    
         
    <!-- Promo Bar -->
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

    <!-- Vision Mission Values Section -->
    <section class="vision-mission pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 pb-2">
                    <div class="box-1">
                        <img src="<?= base_url('assets/img/about/mission.png') ?>" alt="Mission">  
                        <h2><?= esc($about['mission_title'] ?? 'Our Mission') ?></h2>
                        <div><?= $about['our_mission'] ?? '' ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 pb-2">
                    <div class="box-2">
                        <img src="<?= base_url('assets/img/about/vision.png') ?>" alt="Vision">
                        <h2><?= esc($about['vision_title'] ?? 'Our Vision') ?></h2>
                        <div><?= $about['our_vision'] ?? '' ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 pb-2">
                    <div class="box-3">
                        <img src="<?= base_url('assets/img/about/values.png') ?>" alt="Values">   
                        <h2><?= esc($about['values_title'] ?? 'Our Values') ?></h2>
                        <div><?= $about['our_values'] ?? '' ?></div>
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
