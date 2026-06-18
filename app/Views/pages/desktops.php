<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <nav class="py-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Desktops</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row pt-3 mb-8">
            <!-- Sidebar (Brand Filters) -->
            <div class="d-none d-xl-block col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 col-wd-2gdot5">
                <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li><div class="dropdown-title">Browse Our Desktops Categories</div></li>
                        <li>
                            <a class="dropdown-item <?= empty($selectedBrand) ? 'font-weight-bold text-primary' : '' ?>" href="<?= base_url('desktops') ?>">
                               All Brands
                            </a>
                        </li>
                        <?php foreach ($brands as $brand): ?>
                            <?php 
                            $db = \Config\Database::connect();
                            $count = $db->table('models')->where('b_id', $brand['b_id'])->where('type', '2')->where('status', 1)->countAllResults();
                            ?>
                            <li>
                                <a class="dropdown-item <?= ($selectedBrand == $brand['b_id']) ? 'font-weight-bold text-primary' : '' ?>" href="<?= base_url('desktops?brand=' . $brand['b_id']) ?>">
                                   <?= esc($brand['b_name']) ?> (<?= $count ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Product Grid -->
            <div class="col-lg-12 col-xl-8 col-md-12 col-sm-12 col-12 col-wd-9gdot5 tyche-products">
                
                <!-- Responsive filter links for mobile -->
                <div class="d-block d-xl-none mb-4">
                    <label class="font-weight-bold mr-2">Brand:</label>
                    <select class="form-control" onchange="location = this.value;">
                        <option value="<?= base_url('desktops') ?>" <?= empty($selectedBrand) ? 'selected' : '' ?>>All Brands</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= base_url('desktops?brand=' . $brand['b_id']) ?>" <?= ($selectedBrand == $brand['b_id']) ? 'selected' : '' ?>><?= esc($brand['b_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Product Catalog List -->
                <div class="tab-pane fade show list-view">
                    <?php if (!empty($desktops)): ?>
                        <?php foreach ($desktops as $product): ?>
                            <?php $slug = str_replace(' ', '-', strtolower(trim($product['name']))); ?>
                            <div class="single-ponno-product" style="border: 1px solid black; margin-bottom: 20px;">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                   <a href="<?= base_url($slug) ?>">
                                        <img class="primary-img" src="<?= base_url('writable/uploads/thumbnails/' . $product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>">
                                    </a>
                                </div>
                                <!-- Product Content Start -->
                                <div class="pro-content" style="padding-top: 10px;">
                                    <div class="pro-info">
                                        <div class="pro-actions">
                                            <div class="">
                                                <a href="<?= base_url($slug) ?>"> 
                                                    <h5 style="text-transform:none;"><b style="color:red"><?= esc($product['name']) ?></b></h5>
                                                </a>
                                                <p><?= esc($product['s_desc']) ?></p>
                                            </div>
                                        </div>
                                        <a href="<?= base_url($slug) ?>" style="color:black;font-weight:600;font-size: 16px;">
                                            <?= esc($product['processor']) ?> | Storage – <?= esc($product['storage']) ?> | Screen size - <?= esc($product['screen_size']) ?>"
                                        </a>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-6 text-muted border p-5 rounded">
                            <p>No desktops matching the selection criteria were found.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Product details banner -->
                <div class="mb-2">                        
                    <img src="<?= base_url('assets/img/banner/product-details-banner.jpg') ?>" width="100%" class="mb-2" alt="Tyche Info Solutions">       
                </div>                
            </div>
            <!-- End Product Grid -->
        </div>
    </div>
</main>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
