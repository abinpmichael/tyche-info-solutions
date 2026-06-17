<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <nav class="py-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-md-transparent mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="my-6 my-md-8">
            <h2 class="font-size-30 font-weight-bold text-dark mb-4 text-center">Your Cart</h2>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (empty($cart)): ?>
                <div class="text-center py-8 bg-light rounded-lg">
                    <i class="fas fa-shopping-bag font-size-60 text-muted mb-4 d-block"></i>
                    <h4 class="font-weight-bold text-dark mb-3">Your cart is currently empty!</h4>
                    <p class="text-gray-90 mb-4">Please explore our wide range of products and add them to your cart to make an enquiry.</p>
                    <div class="d-flex justify-content-center">
                        <a href="<?= base_url('laptops') ?>" class="btn btn-primary transition-3d-hover mx-2">Browse Laptops</a>
                        <a href="<?= base_url('desktops') ?>" class="btn btn-dark transition-3d-hover mx-2">Browse Desktops</a>
                    </div>
                </div>
            <?php else: ?>
                <form action="<?= base_url('cart/update') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="table-responsive border rounded-lg bg-white mb-5">
                        <table class="table table-hover table-light mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark border-0 py-3 pl-4" style="min-width: 100px;">Product</th>
                                    <th scope="col" class="font-weight-bold text-dark border-0 py-3">Name</th>
                                    <th scope="col" class="font-weight-bold text-dark border-0 py-3 text-center">Type</th>
                                    <th scope="col" class="font-weight-bold text-dark border-0 py-3 text-center" style="width: 150px;">Quantity</th>
                                    <th scope="col" class="font-weight-bold text-dark border-0 py-3 text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $key => $item): ?>
                                    <?php $slug = str_replace(' ', '-', strtolower(trim($item['name']))); ?>
                                    <tr class="align-middle">
                                        <td class="pl-4 py-4">
                                            <a href="<?= base_url($slug) ?>" class="d-block max-width-80">
                                                <img class="img-fluid rounded border p-1" src="<?= base_url('writable/uploads/thumbnails/' . $item['thumbnail']) ?>" alt="<?= esc($item['name']) ?>" style="object-fit: contain;">
                                            </a>
                                        </td>
                                        <td class="py-4 font-size-15 font-weight-medium">
                                            <a href="<?= base_url($slug) ?>" class="text-blue"><?= esc($item['name']) ?></a>
                                        </td>
                                        <td class="py-4 text-center font-size-14">
                                            <?php if ($item['type'] === 'rent'): ?>
                                                <span class="badge badge-pill badge-primary font-weight-medium px-3 py-2 text-uppercase">Rent</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-dark font-weight-medium px-3 py-2 text-uppercase">Buy</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-4 text-center">
                                            <div class="quantity d-inline-flex border rounded bg-white">
                                                <input type="number" name="qty[<?= esc($key) ?>]" class="form-control border-0 text-center font-weight-bold" value="<?= intval($item['qty']) ?>" min="1" style="width: 60px; height: 35px; background: transparent;">
                                            </div>
                                        </td>
                                        <td class="py-4 text-center">
                                            <a href="<?= base_url('cart/remove/' . $item['id'] . '?type=' . $item['type']) ?>" class="btn btn-outline-danger btn-sm border-0" title="Remove item">
                                                <i class="far fa-trash-alt font-size-16"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Cart Options -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-6">
                        <div>
                            <button type="submit" class="btn btn-outline-primary transition-3d-hover font-weight-medium mr-2">Update Cart</button>
                            <a href="<?= base_url() ?>" class="btn btn-outline-secondary transition-3d-hover font-weight-medium">Continue Shopping</a>
                        </div>
                        <div>
                            <a href="<?= base_url('enquire-now') ?>" class="btn btn-primary transition-3d-hover font-weight-medium px-5 py-3 font-size-15">
                                <i class="fas fa-paper-plane mr-2"></i> Proceed to Enquiry
                            </a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
