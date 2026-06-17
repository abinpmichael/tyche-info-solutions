<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <nav class="py-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-md-transparent mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laptops</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <!-- Sidebar (Brand Filters) -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block mb-6 mb-lg-0 pr-xl-5">
                <div class="card border-0 bg-light p-4 shadow-sm rounded-lg">
                    <h4 class="font-size-18 font-weight-bold mb-4 text-primary"><i class="fas fa-filter mr-2"></i>Filter by Brand</h4>
                    
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="<?= base_url('laptops') ?>" class="d-flex justify-content-between align-items-center py-1 <?= empty($selectedBrand) ? 'font-weight-bold text-primary' : 'text-gray-90' ?>">
                                <span>All Brands</span>
                            </a>
                        </li>
                        <?php foreach ($brands as $brand): ?>
                            <?php 
                            // count models for this brand
                            $db = \Config\Database::connect();
                            $count = $db->table('models')->where('b_id', $brand['b_id'])->where('type', '1')->where('status', 1)->countAllResults();
                            ?>
                            <li class="mb-2">
                                <a href="<?= base_url('laptops?brand=' . $brand['b_id']) ?>" class="d-flex justify-content-between align-items-center py-1 <?= ($selectedBrand == $brand['b_id']) ? 'font-weight-bold text-primary' : 'text-gray-90' ?>">
                                    <span><?= esc($brand['b_name']) ?></span>
                                    <span class="badge badge-pill badge-secondary font-size-10"><?= $count ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Product Grid -->
            <div class="col-xl-9 col-lg-8 col-md-12">
                <!-- Shop Header -->
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <h2 class="font-size-22 font-weight-bold mb-0 text-dark">Laptop Rental & Refurbished Systems</h2>
                    <span class="text-muted font-size-14"><?= count($laptops) ?> product(s) found</span>
                </div>
                <!-- End Shop Header -->

                <!-- Responsive filter links for mobile -->
                <div class="d-block d-lg-none mb-4">
                    <label class="font-weight-bold mr-2">Brand:</label>
                    <select class="form-control" onchange="location = this.value;">
                        <option value="<?= base_url('laptops') ?>" <?= empty($selectedBrand) ? 'selected' : '' ?>>All Brands</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= base_url('laptops?brand=' . $brand['b_id']) ?>" <?= ($selectedBrand == $brand['b_id']) ? 'selected' : '' ?>><?= esc($brand['b_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Product Grid -->
                <div class="row no-gutters products-group">
                    <?php if (!empty($laptops)): ?>
                        <?php foreach ($laptops as $index => $product): ?>
                            <?php $slug = str_replace(' ', '-', strtolower(trim($product['name']))); ?>
                            <div class="col-sm-6 col-md-4 product-item product-item__card border-bottom border-right p-4 h-100">
                                <div class="product-item__outer h-100 w-100 d-flex flex-column justify-content-between">
                                    <div class="product-item__inner">
                                        <div class="product-media text-center mb-3">
                                            <a href="<?= base_url($slug) ?>" class="d-block max-width-180 mx-auto">
                                                <img class="img-fluid" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>">
                                            </a>
                                        </div>
                                        <div class="product-info mb-3">
                                            <h6 class="font-size-12 text-gray-5 mb-1">Laptop</h6>
                                            <h5 class="product-item__title mb-2">
                                                <a href="<?= base_url($slug) ?>" class="text-blue font-weight-medium font-size-15"><?= esc($product['name']) ?></a>
                                            </h5>
                                            
                                            <!-- Specifications Snippet -->
                                            <ul class="list-unstyled font-size-12 text-gray-90 mb-0">
                                                <li><strong>Processor:</strong> <?= esc($product['processor']) ?></li>
                                                <li><strong>Memory:</strong> <?= esc($product['memory']) ?></li>
                                                <li><strong>Storage:</strong> <?= esc($product['storage']) ?></li>
                                                <li><strong>Screen:</strong> <?= esc($product['screen_size']) ?>"</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="product-actions mt-auto pt-3">
                                        <a href="<?= base_url($slug) ?>" class="btn btn-outline-primary btn-sm btn-block transition-3d-hover font-weight-medium">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 p-8 text-center text-muted">
                            <i class="fas fa-laptop font-size-50 mb-3 text-light"></i>
                            <p>No laptops matching the selection criteria were found.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- End Product Grid -->
            </div>
            <!-- End Product Grid -->
        </div>
    </div>
</main>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
