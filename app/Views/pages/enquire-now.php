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

                            <!-- Row 1: Name & Phone Number -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?= old('name') ?>" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" value="<?= old('phone') ?>" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <!-- Row 2: Email Address & Location -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="emailAddress" value="<?= old('emailAddress') ?>" placeholder="Email Address" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location" value="<?= old('location') ?>" placeholder="Location" required>
                                </div>
                            </div>

                            <!-- Row 3: Product Model (with Category switch) & Buy/Rent -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Your Product Model <span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="prodCategory" id="catLaptop" value="1" <?= (!$selectedProduct || $selectedProduct['type'] == '1') ? 'checked' : '' ?> onchange="updateProductModels()">
                                            <label class="form-check-label font-size-14 text-dark" for="catLaptop" style="cursor:pointer;">Laptop</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 ml-3">
                                            <input class="form-check-input" type="radio" name="prodCategory" id="catDesktop" value="2" <?= ($selectedProduct && $selectedProduct['type'] == '2') ? 'checked' : '' ?> onchange="updateProductModels()">
                                            <label class="form-check-label font-size-14 text-dark" for="catDesktop" style="cursor:pointer;">Desktop</label>
                                        </div>
                                    </div>
                                    <select class="form-control form-select w-100" name="productModel" id="productModel" required>
                                        <!-- Options populated dynamically by script below -->
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-medium">Buy / Rent <span class="text-danger">*</span></label>
                                    <select class=" form-control form-select w-100" name="buyRent" required>
                                        <option value="rent">Rent</option>
                                        <option value="buy">Buy</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 4: Message -->
                            <div class="mb-4">
                                <label class="form-label font-weight-medium">Special Requirements / Message</label>
                                <textarea class="form-control" name="text" rows="5" placeholder="Mention any customized configurations or rental period details here..."><?= old('text') ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block transition-3d-hover font-weight-medium py-3">Submit Enquiry Request</button>
                        </form>
                    </div>
                </div>

                <!-- Selected Items Summary or Ad Banner -->
                <?php if (!empty($homeSettings['show_enquiry_summary']) && !empty($cart)): ?>
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
                            <img class="img-fluid rounded shadow-sm border" src="<?= base_url('assets/img/ads/ads.webp') ?>" width="100%" alt="Latest Tech Gadgets Ads">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $laptopsJson = [];
            foreach ($laptops as $l) {
                $laptopsJson[] = ['id' => $l['id'], 'name' => $l['name']];
            }
            $desktopsJson = [];
            foreach ($desktops as $d) {
                $desktopsJson[] = ['id' => $d['id'], 'name' => $d['name']];
            }
            ?>
            <script>
                const laptops = <?= json_encode($laptopsJson) ?>;
                const desktops = <?= json_encode($desktopsJson) ?>;
                const selectedProductId = <?= $selectedProduct ? intval($selectedProduct['id']) : 'null' ?>;

                function updateProductModels() {
                    const isLaptop = document.getElementById('catLaptop').checked;
                    const modelSelect = document.getElementById('productModel');
                    
                    // Clear previous options
                    modelSelect.innerHTML = '';
                    
                    const products = isLaptop ? laptops : desktops;
                    
                    products.forEach(prod => {
                        const opt = document.createElement('option');
                        opt.value = prod.id;
                        opt.textContent = prod.name;
                        if (selectedProductId && prod.id == selectedProductId) {
                            opt.selected = true;
                        }
                        modelSelect.appendChild(opt);
                    });
                }

                // Initialize on page load
                document.addEventListener('DOMContentLoaded', () => {
                    updateProductModels();
                });
            </script>
        </div>
    </div>
</main>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
