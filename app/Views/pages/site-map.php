<?= view('templates/headermenu') ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <!-- Breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Site Map</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Page Title -->
        <div class="text-center">
            <div class="card-body subhead-60 pb-6 px-0 continer-head">
                <h4>Site Map</h4>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <h5>All available pages on our website</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="row g-4">

                <!-- Main Pages -->
                <div class="col-md-4">
                    <h3 class="font-size-25 mb-3 pb-2 border-bottom">Main Pages</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url() ?>" class="text-gray-90">Home</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('about-us') ?>" class="text-gray-90">About Us</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('services') ?>" class="text-gray-90">Services</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('contact-us') ?>" class="text-gray-90">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <!-- Products -->
                <div class="col-md-4">
                    <h3 class="font-size-25 mb-3 pb-2 border-bottom">Products</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('laptops') ?>" class="text-gray-90">Laptops for Rent</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('desktops') ?>" class="text-gray-90">Desktops for Rent</a>
                        </li>
                        <?php if (!empty($models)): ?>
                            <?php foreach ($models as $m): ?>
                            <li class="mb-2">
                                <i class="fa fa-angle-right text-primary mr-2"></i>
                                <a href="<?= base_url(str_replace(' ', '-', strtolower(trim($m['name'])))) ?>" class="text-gray-90">
                                    <?= esc($m['name']) ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Policies -->
                <div class="col-md-4">
                    <h3 class="font-size-25 mb-3 pb-2 border-bottom">Policies &amp; Legal</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('terms-conditions') ?>" class="text-gray-90">Terms &amp; Conditions</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('privacy-policy') ?>" class="text-gray-90">Privacy Policy</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('refund-and-cancellation-policy') ?>" class="text-gray-90">Refund and Cancellation Policy</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-angle-right text-primary mr-2"></i>
                            <a href="<?= base_url('site-map') ?>" class="text-gray-90">Site Map</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->

<?= view('templates/footermenu') ?>
