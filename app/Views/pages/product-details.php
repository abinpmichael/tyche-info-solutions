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
        <!-- Single Product Gallary and overview -->
        <div class="row mb-8">
            <!-- Product Images -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="p-3 border rounded-lg text-center bg-white">
                    <!-- Main image -->
                    <div class="mb-3">
                        <img id="mainProductImage" class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>" style="max-height: 400px; object-fit: contain;">
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
            <div class="col-md-6">
                <div class="pl-md-4">
                    <div class="mb-3">
                        <span class="font-size-13 text-muted text-uppercase"><?= esc($product['brand']['b_name'] ?? '') ?></span>
                        <h1 class="font-size-30 font-weight-bold text-dark mt-1 mb-2"><?= esc($product['name']) ?></h1>
                        <p class="text-gray-90 font-size-16 font-weight-medium mb-3"><?= esc($product['s_desc']) ?></p>
                    </div>

                    <!-- Highlight Specs Table -->
                    <div class="border-top border-bottom py-3 mb-4">
                        <h5 class="font-weight-bold mb-3 font-size-14 text-primary">Quick Specifications</h5>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <strong>Processor:</strong> <span class="text-gray-90"><?= esc($product['processor']) ?></span>
                            </div>
                            <div class="col-6 mb-2">
                                <strong>Memory:</strong> <span class="text-gray-90"><?= esc($product['memory']) ?></span>
                            </div>
                            <div class="col-6 mb-2">
                                <strong>Storage:</strong> <span class="text-gray-90"><?= esc($product['storage']) ?></span>
                            </div>
                            <div class="col-6 mb-2">
                                <strong>Screen Size:</strong> <span class="text-gray-90"><?= esc($product['screen_size']) ?>"</span>
                            </div>
                            <div class="col-6">
                                <strong>Warranty:</strong> <span class="text-gray-90"><?= esc($product['warranty']) ?></span>
                            </div>
                            <div class="col-6">
                                <strong>Graphics:</strong> <span class="text-gray-90"><?= esc($product['graphics']) ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="<?= base_url('cart/add/' . $product['id']) ?>" method="get" class="card p-4 border bg-light">
                        <div class="d-flex align-items-center mb-3">
                            <label class="font-weight-bold text-dark mr-3 mb-0">Qty:</label>
                            <div class="quantity-picker d-flex border rounded bg-white">
                                <button type="button" class="btn btn-sm btn-light border-0" onclick="decrementQty()">-</button>
                                <input type="number" name="qty" id="productQty" class="form-control border-0 text-center font-weight-bold" value="1" min="1" style="width: 50px; height: 32px; background: transparent;">
                                <button type="button" class="btn btn-sm btn-light border-0" onclick="incrementQty()">+</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <button type="submit" name="type" value="rent" class="btn btn-primary btn-block transition-3d-hover font-weight-medium">
                                    <i class="ec ec-add-to-cart mr-2"></i> Add for Rent
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="type" value="buy" class="btn btn-dark btn-block transition-3d-hover font-weight-medium">
                                    <i class="ec ec-add-to-cart mr-2"></i> Add for Buy
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Specifications Tab/Accordions -->
        <div class="my-6 my-md-8">
            <h3 class="font-size-22 font-weight-bold mb-4 text-dark border-bottom pb-2">Product Details & Specs</h3>
            
            <div class="row">
                <!-- Tabs/Accordions -->
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
