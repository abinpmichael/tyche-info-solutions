<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <nav class="py-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-md-transparent mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= ($product['type'] == '1') ? base_url('laptops') : base_url('desktops') ?>"><?= ($product['type'] == '1') ? 'Laptops' : 'Desktops' ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= esc($product['name']) ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <!-- Single Product Gallery and overview -->
        <div class="mb-xl-14 mb-6 pt-6">
            <div class="row">
                <!-- Product Images -->
                <div class="col-xl-5 col-lg-5 col-md-12 col-12 mb-4 mb-md-0">
                    <div class="p-3 border rounded-lg text-center bg-white">
                        <!-- Main image -->
                        <div class="mb-3 text-center" style="height: 350px; display: flex; align-items: center; justify-content: center;">
                            <img id="mainProductImage" class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        
                        <!-- Gallery thumbnails -->
                        <?php if (!empty($product['gallery'])): ?>
                            <div class="d-flex justify-content-center overflow-auto py-2">
                                <div class="mx-1 border rounded p-1 cursor-pointer" onclick="changeMainImage('<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>')">
                                    <img src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" width="60" height="60" style="object-fit: contain;">
                                </div>
                                <?php foreach ($product['gallery'] as $img): ?>
                                    <div class="mx-1 border rounded p-1 cursor-pointer" onclick="changeMainImage('<?= base_url('writable/uploads/gallery/' . $img['image']) ?>')">
                                        <img src="<?= base_url('writable/uploads/gallery/' . $img['image']) ?>" width="60" height="60" style="object-fit: contain;">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-xl-7 col-lg-7 col-md-12 col-12 mb-md-6 mb-lg-0">
                    <div class="mb-6">
                        <div class="border-bottom mb-3 pb-md-1 pb-3 product-det">
                            <h2 class="font-size-25 text-lh-1dot2">
                                <?= esc($product['name']) ?> <br>
                                <span> (<?= esc($product['s_desc']) ?>)</span>
                            </h2>
                        </div>
                        
                        <div class="d-md-flex align-items-center mb-3">
                            <div class="text-gray-9 font-size-17">Availability: <span class="text-green font-weight-bold">In Stock</span></div>
                        </div>

                        <!-- Booking Button -->
                        <div class="mb-4">
                            <a href="<?= base_url('enquire-now?product=' . $product['id']) ?>" class="btn btn-primary-dark transition-3d-hover px-5 text-white" style="font-weight: 600;">Enquire to Buy / Rent</a>
                        </div>

                        <!-- Specifications Blocks -->
                        <div class="product__description rte quick-add-hidden">
                            <hr class="clearfix mb-3">
                            
                            <?php if (!empty($product['processor'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Processor</p>
                                        <p class="s2"><?= esc($product['processor']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['screen_size'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Screen Size</p>
                                        <p class="s2"><?= esc($product['screen_size']) ?>"</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['storage'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Storage</p>
                                        <p class="s2"><?= esc($product['storage']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['memory'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Memory</p>
                                        <p class="s2"><?= esc($product['memory']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['warranty'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Warranty</p>
                                        <p class="s2"><?= esc($product['warranty']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['graphics'])): ?>
                                <div class="spec1-float col-xl-4 col-lg-4 col-md-4 col-sm-6 col-sx-6 col-12 mb-3">
                                    <div class="spec1">
                                        <p class="s1">Graphics</p>
                                        <p class="s2"><?= esc($product['graphics']) ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specifications Tab/Accordions -->
        <div class="my-6 my-md-8">
            <h3 class="font-size-22 font-weight-bold mb-4 text-dark border-bottom pb-2">Product Details & Specs</h3>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="specificationsAccordion">
                        <!-- About Product -->
                        <div class="card border-0 mb-2">
                            <div class="card-header bg-light border-0 py-3 cursor-pointer" id="headingAbout" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="true" aria-controls="collapseAbout">
                                <h5 class="mb-0 font-weight-bold text-dark font-size-16">
                                    <i class="fas fa-info-circle text-primary mr-2"></i> About Product
                                </h5>
                            </div>
                            <div id="collapseAbout" class="collapse show" aria-labelledby="headingAbout" data-parent="#specificationsAccordion">
                                <div class="card-body pl-0 pr-0 py-4 text-gray-90 font-size-15">
                                    <?= $product['about'] ?: '<p>No description provided for this product.</p>' ?>
                                </div>
                            </div>
                        </div>

                        <!-- Technical Specs -->
                        <?php if (!empty($product['graphics_d']) || !empty($product['display_d']) || !empty($product['audio_d']) || !empty($product['dimensions_d']) || !empty($product['ports_d'])): ?>
                            <div class="card border-0 mb-2">
                                <div class="card-header bg-light border-0 py-3 collapsed cursor-pointer" id="headingSpecs" data-toggle="collapse" data-target="#collapseSpecs" aria-expanded="false" aria-controls="collapseSpecs">
                                    <h5 class="mb-0 font-weight-bold text-dark font-size-16">
                                        <i class="fas fa-sliders-h text-primary mr-2"></i> Detailed Specifications
                                    </h5>
                                </div>
                                <div id="collapseSpecs" class="collapse" aria-labelledby="headingSpecs" data-parent="#specificationsAccordion">
                                    <div class="card-body pl-0 pr-0 py-4">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <?php if (!empty($product['graphics_d'])): ?>
                                                    <tr>
                                                        <td class="font-weight-bold text-dark" style="width: 250px;">Graphics Detail</td>
                                                        <td class="text-gray-90"><?= esc($product['graphics_d']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if (!empty($product['display_d'])): ?>
                                                    <tr>
                                                        <td class="font-weight-bold text-dark">Display Detail</td>
                                                        <td class="text-gray-90"><?= esc($product['display_d']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if (!empty($product['audio_d'])): ?>
                                                    <tr>
                                                        <td class="font-weight-bold text-dark">Audio Detail</td>
                                                        <td class="text-gray-90"><?= esc($product['audio_d']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if (!empty($product['dimensions_d'])): ?>
                                                    <tr>
                                                        <td class="font-weight-bold text-dark">Dimensions & Weight</td>
                                                        <td class="text-gray-90"><?= esc($product['dimensions_d']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if (!empty($product['ports_d'])): ?>
                                                    <tr>
                                                        <td class="font-weight-bold text-dark">Ports & Slots</td>
                                                        <td class="text-gray-90"><?= esc($product['ports_d']) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function changeMainImage(url) {
    document.getElementById('mainProductImage').src = url;
}

function incrementQty() {
    var input = document.getElementById('productQty');
    var val = parseInt(input.value);
    if (!isNaN(val)) {
        input.value = val + 1;
    }
}

function decrementQty() {
    var input = document.getElementById('productQty');
    var val = parseInt(input.value);
    if (!isNaN(val) && val > 1) {
        input.value = val - 1;
    }
}
</script>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
