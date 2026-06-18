<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div> 

    <section id="content-section" class="services-page pb-10 pt-2">
        <div class="card-body subhead-60 pb-6 px-0 continer-head">
            <span class="eleven"><h4>OUR SERVICES</h4></span>
            <div>
                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                    <h5>Explore Our Extensive Services for you</h5>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="services-listing">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <?php 
                        // Determine image URL
                        if (!empty($service['img'])) {
                            if (file_exists(WRITEPATH . 'uploads/services/' . $service['img'])) {
                                $imgUrl = base_url('writable/uploads/services/' . $service['img']);
                            } else if (file_exists(FCPATH . 'assets/img/services/' . $service['img'])) {
                                $imgUrl = base_url('assets/img/services/' . $service['img']);
                            } else {
                                $imgUrl = base_url('assets/img/services/' . $service['img']);
                            }
                        } else {
                            $imgUrl = base_url('assets/img/services/corporate-bulk-solutions.jpg');
                        }
                        ?>
                        <div class="row box mb-5">
                            <div class="col-lg-6">
                                <figure class="bg-img" style="background-image: url('<?= $imgUrl ?>');"></figure>
                            </div>
                            <div class="col-lg-6">
                                <div class="content pl-lg-4">
                                    <h2 class="font-weight-bold text-dark mb-3"><?= esc($service['title']) ?></h2>
                                    <?php if (!empty($service['desc1'])): ?>
                                        <p class="gyr text-gray-90"><?= esc($service['desc1']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($service['desc2'])): ?>
                                        <p class="gyr text-gray-90"><?= esc($service['desc2']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-6 text-muted">
                        <p>No services are currently configured in the database.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>            
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
