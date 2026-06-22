<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <nav class="py-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-md-transparent mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Enquire Now</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="my-6 my-md-8">
            <h2 class="font-size-30 font-weight-bold text-dark mb-4 text-center">Enquire About Your Selected Products</h2>

            <?php if (empty($cart)): ?>
                <script>window.location.href = "<?= base_url() ?>";</script>
                <div class="text-center py-6">
                    <p>Redirecting to home page...</p>
                </div>
            <?php else: ?>
                <div class="row">
                    <!-- Enquiry Form -->
                    <div class="col-lg-7 mb-6 mb-lg-0">
                        <div class="card border-0 shadow-sm rounded-lg p-5 bg-white">
                            <h4 class="font-weight-bold mb-4 text-dark border-bottom pb-2">Customer Details</h4>
                            
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('submit-enquiry') ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="source" value="enquiry">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-medium">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="firstName" value="<?= old('firstName') ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-medium">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="lastName" value="<?= old('lastName') ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-medium">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="emailAddress" value="<?= old('emailAddress') ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label font-weight-medium">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" name="phone" value="<?= old('phone') ?>" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label font-weight-medium">Special Requirements / Message</label>
                                    <textarea class="form-control" name="text" rows="5" placeholder="Mention any customized configurations or rental period details here..."><?= old('text') ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block transition-3d-hover font-weight-medium py-3">Submit Enquiry Request</button>
                            </form>
                        </div>
                    </div>

                    <!-- Selected Items Summary or Ad Banner -->
                    <?php if (!empty($homeSettings['show_enquiry_summary'])): ?>
                        <div class="col-lg-5">
                            <div class="card border-0 bg-light p-4 shadow-sm rounded-lg">
                                <h4 class="font-weight-bold mb-4 text-dark border-bottom pb-2">Enquiry Summary</h4>
                                
                                <ul class="list-unstyled mb-4">
                                    <?php foreach ($cart as $item): ?>
                                        <li class="d-flex align-items-center mb-3 border-bottom pb-3">
                                            <div class="max-width-70 mr-3">
                                                <img class="img-fluid rounded border bg-white p-1" src="<?= base_url('writable/uploads/thumbnails/' . $item['thumbnail']) ?>" alt="<?= esc($item['name']) ?>">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="font-size-14 font-weight-bold text-dark mb-0"><?= esc($item['name']) ?></h6>
                                                <div class="d-flex align-items-center mt-1">
                                                    <span class="badge badge-pill badge-secondary mr-2 font-size-10 px-2 text-uppercase"><?= esc($item['type']) ?></span>
                                                    <span class="text-muted font-size-12">Qty: <?= intval($item['qty']) ?></span>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="bg-white border rounded-lg p-3 text-center">
                                    <span class="text-muted font-size-13">No payment gateway or deposits are required at this stage. Submit your enquiry and our support staff will call you back shortly.</span>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Ad Image -->
                        <div class="col-lg-5">
                            <div class="pl-lg-3 text-center">
                                <img class="img-fluid rounded shadow-sm" src="<?= base_url('assets/img/ads/ads.webp') ?>" width="100%" alt="Latest Tech Gadgets Ads">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
