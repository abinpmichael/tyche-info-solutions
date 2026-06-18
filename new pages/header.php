       <?php 
  $currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); // Extract only the filename from the URL path

// Define the pages
$laptopsPages = ['laptops.php', 'asus-rog.php', 'lenovo-v15.php', 'hp-probook-440.php', 'dell-latitude-3540.php','hp-victus-gaming.php'];
$desktopPages = [ 'intel-i5-12th-gen.php', 'hp-pro-tower-280.php'];

// Determine active page
$isHomePage = ($currentPage == 'index.php' || $currentPage == '/');
$isLaptopsPage = in_array($currentPage, $laptopsPages);
$isDesktopsPage = in_array($currentPage, $desktopPages);
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
                                <a class="text-white u-header-topbar__nav-link" href="tel:+919946622288"  ><i class="ec ec-phone mr-1"></i> +91 9946622288</a> 
                            </div>
                            <!--<div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                         
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border"> 
                                         <a href="tel:+919946622288"  ><i class="ec ec-phone mr-1"></i> +91 9946622288</a>  
                                    </li>
                                  
                                </ul>
                            </div>-->
                                                  <!-- Header Icons -->
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 d-none d-xl-block bg-primary topbar-right ml-auto">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">

                                        <!-- End Search -->
                                        <li class="col d-none d-xl-block"><a href="https://www.facebook.com/profile.php?id=100067495727938" target="_blank" class="text-white-90" data-toggle="tooltip" data-placement="top" title="facebook"><i class="font-size-12 fab fa-facebook-f"></i></a></li>
                                        <li class="col d-none d-xl-block"><a href="#" target="_blank" class="text-white-90" data-toggle="tooltip" data-placement="top" title="Watsapp"><i class="font-size-12 fab fa-instagram"></i></a></li>
                                   
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                            
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
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="index.php" aria-label="Tyche">
                                        <img src="assets/img/logo.png" width="100%">
                                    </a>
                                    <!-- End Logo -->

                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader"
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
                                                        aria-controls="sidebarHeader"
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
                                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="index.php" aria-label="Electro">
                                                           <img src="assets/img/logo.png" width="100%">
                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                            
                                                                  <!-- Home -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item active"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="index.php" aria-haspopup="true" aria-expanded="true">Home</a>
                                        </li>
                                        <!-- End Home -->
                                        <!-- Cameras & Accessories -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="CamerasAccessoriesMegaMenu" class="nav-link u-header__nav-link" href="about-us.php" aria-haspopup="true" aria-expanded="false">About Us</a>
                                        </li>
                                        <!-- End Cameras & Accessories -->										

                                        <!-- TV & Audio -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="laptops.php" aria-haspopup="true" aria-expanded="false">Laptops</a>
                                                 <!-- Laptops & Desktops - Mega Menu -->
                                            <div class="hs-mega-menu  u-header__sub-menu" aria-labelledby="laptopsdesktopsMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                         <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <span class="u-header__sub-menu-title">HP </span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                   <li><a class="dropdown-item" href="hp-probook-440.php">HP Probook 440</a></li>
                                                                     <li><a class="dropdown-item" href="hp-victus-gaming.php">HP Victus Gaming </a></li>
                                                                </ul>
                                                                  </div>
                                                                 <div class="col-md-3">
                                                                
                                                                <span class="u-header__sub-menu-title">Dell </span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                     <li><a class="dropdown-item" href="dell-latitude-3540.php">Dell Latitude 3540</a></li>
                                                                </ul>
                                                                   </div>
                                                                 <div class="col-md-3">                                                               
                                                                <span class="u-header__sub-menu-title">Lenovo</span>
                                                                <ul class="u-header__sub-menu-nav-group">
                                                                    <li><a class="dropdown-item" href="lenovo-v15.php">Lenovo - V15</a></li>
                                                                </ul>
                                                                     </div>
                                                                 <div class="col-md-3">                                                             
                                                                <span class="u-header__sub-menu-title">Asus</span>
                                                                <ul class="u-header__sub-menu-nav-group">                                                                
                                                                <li><a class="dropdown-item" href="asus-rog.php">Asus Rog</a></li>
                                                                 </ul>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fluid" src="assets/img/laptops/hp-1.jpg" alt="Image Description">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Laptops & Desktops - Mega Menu -->	
                                        </li>
                                        <!-- End Pages -->

                                        <!-- Smart Phones -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="smartphonesMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="desktops.php" aria-haspopup="true" aria-expanded="false">Desktops</a>


                                                 <!-- Laptops & Desktops - Mega Menu -->
                                            <div class="hs-mega-menu  u-header__sub-menu" aria-labelledby="laptopsdesktopsMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                      <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                              <span class="u-header__sub-menu-title">HP Desktops</span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                    <li><a class="dropdown-item" href="hp-pro-tower-280.php">HP Pro Tower</a></li>
                                                                </ul>

                                                            </div>
                                                            <div class="col-md-4">
                                                               <span class="u-header__sub-menu-title">Assembled Desktops</span>
                                                                <ul class="u-header__sub-menu-nav-group">
                                                                    <li><a class="dropdown-item" href="intel-i5-12th-gen.php">Intel i5 12th Gen</a></li>
                                                                </ul> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fluid" src="assets/img/laptops/Hp-desktop.jpg" alt="Image Description">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Laptops & Desktops - Mega Menu -->	
                                        </li>
                                        <!-- End Blog -->

                                        <!-- GPS & Car -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"> <a class="nav-link u-header__nav-link" href="services.php" >Services</a></li>
                                        <!-- End GPS & Car -->

                                        <!-- Movies & Games -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"> <a class="nav-link u-header__nav-link" href="contact-us.php" >Contact Us</a></li>
                            
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
                            <div class="col  d-xl-block">
                             <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                    <ul class="navbar-nav u-header__navbar-nav">
                                        <!-- Home -->
                                       <!--  <li class="nav-item hs-has-mega-menu u-header__nav-item active"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left"> -->
                                            <li class="nav-item hs-has-mega-menu u-header__nav-item <?php echo $isHomePage ? 'active' : ''; ?>">
    <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="index.php" aria-haspopup="true" aria-expanded="true">Home</a>
</li>

                                            <!-- <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="index.php" aria-haspopup="true" aria-expanded="true">Home</a> -->
                                        </li>
                                        <!-- End Home -->
                                        <!-- Cameras & Accessories -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'about-us.php' ? 'active' : ''; ?>"
       "
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="CamerasAccessoriesMegaMenu" class="nav-link u-header__nav-link" href="about-us.php" aria-haspopup="true" aria-expanded="false">About Us</a>
                                        </li>
                                        <!-- End Cameras & Accessories -->										

                                        <!-- TV & Audio -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item <?php echo $isLaptopsPage ? 'active' : ''; ?>"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="laptops.php" aria-haspopup="true" aria-expanded="false">Laptops</a>
                                                 <!-- Laptops & Desktops - Mega Menu -->
                                            <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="laptopsdesktopsMegaMenu">
                                                 <div class="row u-header__mega-menu-wrapper">
                                                         <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <span class="u-header__sub-menu-title">HP </span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                   <li><a class="dropdown-item" href="hp-probook-440.php">HP Probook 440</a></li>
                                                                     <li><a class="dropdown-item" href="hp-victus-gaming.php">HP Victus Gaming </a></li>
                                                                </ul>
                                                                  </div>
                                                                 <div class="col-md-3">
                                                                
                                                                <span class="u-header__sub-menu-title">Dell </span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                     <li><a class="dropdown-item" href="dell-latitude-3540.php">Dell Latitude 3540</a></li>
                                                                </ul>
                                                                   </div>
                                                                 <div class="col-md-3">                                                               
                                                                <span class="u-header__sub-menu-title">Lenovo</span>
                                                                <ul class="u-header__sub-menu-nav-group">
                                                                    <li><a class="dropdown-item" href="lenovo-v15.php">Lenovo - V15</a></li>
                                                                </ul>
                                                                     </div>
                                                                 <div class="col-md-3">                                                             
                                                                <span class="u-header__sub-menu-title">Asus</span>
                                                                <ul class="u-header__sub-menu-nav-group">                                                                
                                                                <li><a class="dropdown-item" href="asus-rog.php">Asus Rog</a></li>
                                                                 </ul>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fluid" src="assets/img/laptops/hp-1.jpg" alt="Image Description">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Laptops & Desktops - Mega Menu -->	
                                        </li>
                                        <!-- End Pages -->

                                        <!-- Smart Phones -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item <?php echo $isDesktopstopsPage ? 'active' : ''; ?>"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="smartphonesMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="desktops.php" aria-haspopup="true" aria-expanded="false">Desktops</a>


                                                 <!-- Laptops & Desktops - Mega Menu -->
                                            <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="laptopsdesktopsMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                      <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                              <span class="u-header__sub-menu-title">HP Desktops</span>
                                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                                    <li><a class="dropdown-item" href="hp-pro-tower-280.php">HP Pro Tower<span class="text-gray-25 font-size-12 font-weight-normal"> </span></a></li>
                                                                </ul>

                                                            </div>
                                                            <div class="col-md-6">
                                                               <span class="u-header__sub-menu-title">Assembled Desktops</span>
                                                                <ul class="u-header__sub-menu-nav-group">
                                                                    <li><a class="dropdown-item" href="intel-i5-12th-gen.php">Intel i5 12th Gen<span class="text-gray-25 font-size-12 font-weight-normal"> </span></a></li>
                                                                </ul> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fluid" src="assets/img/laptops/Hp-desktop.jpg" alt="Image Description">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Laptops & Desktops - Mega Menu -->	
                                        </li>
                                        <!-- End Blog -->

                                        <!-- GPS & Car -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>"> <a class="nav-link u-header__nav-link" href="services.php" >Services</a></li>
                                        <!-- End GPS & Car -->

                                        <!-- Movies & Games -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item  <?php echo basename($_SERVER['PHP_SELF']) == 'contact-us.php' ? 'active' : ''; ?>"> <a class="nav-link u-header__nav-link" href="contact-us.php" >Contact Us</a></li>

                                        
                                        <!-- End Movies & Games -->
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
        

