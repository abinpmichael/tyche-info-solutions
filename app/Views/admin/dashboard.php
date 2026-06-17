<div class="container-fluid">

    <!-- Welcome Banner -->
    <div class="card border-0 mb-4 overflow-hidden" style="background: linear-gradient(135deg, #1a73e8 0%, #0d47a1 100%); min-height: 110px;">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <div class="text-white">
                <h4 class="mb-1 fw-bold">
                    Welcome back, <?= esc(session()->get('username') ?? 'Admin') ?>! 👋
                </h4>
                <p class="mb-0 opacity-75 fs-3">
                    <?= date('l, d F Y') ?> &nbsp;·&nbsp; Here's what's happening with Tyche Info Solutions today.
                </p>
            </div>
            <div class="d-none d-md-flex align-items-center gap-3">
                <a href="<?= base_url('enquiries') ?>" class="btn btn-light btn-sm px-3 fw-semibold">
                    <i class="ti ti-mail me-1"></i>
                    <?php if (($new_enquiries ?? 0) > 0): ?>
                        <span class="badge bg-danger me-1"><?= $new_enquiries ?></span>
                    <?php endif; ?>
                    New Enquiries
                </a>
                <a href="<?= base_url('model/create') ?>" class="btn btn-warning btn-sm px-3 fw-semibold text-dark">
                    <i class="ti ti-plus me-1"></i> Add Model
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Cards Row -->
    <div class="row g-3 mb-4">

        <!-- Total Models -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('model') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(25,118,210,0.12);">
                            <i class="ti ti-device-laptop fs-5 text-primary"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_models ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Total Models</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Enquiries -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('enquiries') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(103,58,183,0.12);">
                            <i class="ti ti-mail fs-5" style="color:#673ab7;"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_enquiries ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Enquiries
                            <?php if (($new_enquiries ?? 0) > 0): ?>
                                <span class="badge bg-danger ms-1"><?= $new_enquiries ?> new</span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Brands -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('brands') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(255,152,0,0.12);">
                            <i class="ti ti-brand-meta fs-5 text-warning"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_brands ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Brands</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Services -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('services-admin') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(0,150,136,0.12);">
                            <i class="ti ti-settings fs-5 text-teal" style="color:#009688;"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_services ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Services</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sliders -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('slider') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(233,30,99,0.12);">
                            <i class="ti ti-slideshow fs-5" style="color:#e91e63;"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_sliders ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Sliders</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product Categories -->
        <div class="col-6 col-md-4 col-xl-2">
            <a href="<?= base_url('product') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 stat-card">
                    <div class="card-body p-3 text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                             style="width:48px;height:48px;background:rgba(63,81,181,0.12);">
                            <i class="ti ti-category fs-5" style="color:#3f51b5;"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-dark"><?= $total_products ?? 0 ?></h3>
                        <p class="text-muted fs-2 mb-0 mt-1">Categories</p>
                    </div>
                </div>
            </a>
        </div>

    </div><!-- /stat row -->

    <!-- Main Content Row -->
    <div class="row g-4 mb-4">

        <!-- Recent Enquiries Table -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-4">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-indigo rounded-2">
                            <i class="ti ti-mail-opened fs-5 text-indigo"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Recent Enquiries</h6>
                            <small class="text-muted">Latest 5 submissions</small>
                        </div>
                    </div>
                    <a href="<?= base_url('enquiries') ?>" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($recent_enquiries)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3 fs-2 text-uppercase fw-semibold text-muted">Name</th>
                                    <th class="py-3 fs-2 text-uppercase fw-semibold text-muted">Subject</th>
                                    <th class="py-3 fs-2 text-uppercase fw-semibold text-muted">Date</th>
                                    <th class="py-3 fs-2 text-uppercase fw-semibold text-muted text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_enquiries as $enq): ?>
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                                 style="width:32px;height:32px;min-width:32px;">
                                                <span class="text-primary fw-bold fs-2">
                                                    <?= strtoupper(substr($enq['first_name'] ?? 'U', 0, 1)) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-semibold fs-3"><?= esc(($enq['first_name'] ?? '') . ' ' . ($enq['last_name'] ?? '')) ?></div>
                                                <div class="text-muted fs-2"><?= esc($enq['email'] ?? '') ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="badge <?= ($enq['subject'] ?? '') === 'Product Enquiry' ? 'bg-light-primary text-primary' : 'bg-light-success text-success' ?> fs-2">
                                            <?= esc($enq['subject'] ?? 'General') ?>
                                        </span>
                                    </td>
                                    <td class="py-3 fs-2 text-muted">
                                        <?= date('d M Y', strtotime($enq['created_at'] ?? 'now')) ?>
                                    </td>
                                    <td class="py-3 text-center">
                                        <a href="<?= base_url('enquiries/view/' . $enq['id']) ?>" class="btn btn-sm btn-light" title="View">
                                            <i class="ti ti-eye fs-4"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="d-flex flex-column align-items-center justify-content-center py-5 text-muted">
                        <i class="ti ti-inbox-off fs-1 mb-2"></i>
                        <p class="mb-0">No enquiries yet.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right Column: Breakdown + Quick Links -->
        <div class="col-lg-5">

            <!-- Inventory Breakdown -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3 px-4">
                    <span class="p-2 bg-light-success rounded-2">
                        <i class="ti ti-chart-pie-2 fs-5 text-success"></i>
                    </span>
                    <div>
                        <h6 class="mb-0 fw-semibold">Inventory Breakdown</h6>
                        <small class="text-muted">Laptops vs Desktops</small>
                    </div>
                </div>
                <div class="card-body px-4 pb-4 pt-3">
                    <?php
                        $laptops  = $laptop_count ?? 0;
                        $desktops = $desktop_count ?? 0;
                        $total    = $laptops + $desktops;
                        $lpct     = $total > 0 ? round(($laptops  / $total) * 100) : 0;
                        $dpct     = $total > 0 ? round(($desktops / $total) * 100) : 0;
                    ?>
                    <!-- Laptops -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fs-3 fw-semibold d-flex align-items-center gap-1">
                                <i class="ti ti-device-laptop text-primary"></i> Laptops
                            </span>
                            <span class="fs-3 fw-bold text-primary"><?= $laptops ?> <small class="text-muted fw-normal">(<?= $lpct ?>%)</small></span>
                        </div>
                        <div class="progress" style="height:8px;border-radius:10px;">
                            <div class="progress-bar bg-primary" style="width:<?= $lpct ?>%;border-radius:10px;"></div>
                        </div>
                    </div>
                    <!-- Desktops -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fs-3 fw-semibold d-flex align-items-center gap-1">
                                <i class="ti ti-device-desktop text-success"></i> Desktops
                            </span>
                            <span class="fs-3 fw-bold text-success"><?= $desktops ?> <small class="text-muted fw-normal">(<?= $dpct ?>%)</small></span>
                        </div>
                        <div class="progress" style="height:8px;border-radius:10px;">
                            <div class="progress-bar bg-success" style="width:<?= $dpct ?>%;border-radius:10px;"></div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between fs-2">
                        <span class="text-muted">Total inventory models</span>
                        <strong><?= $total ?></strong>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3 px-4">
                    <span class="p-2 bg-light-warning rounded-2">
                        <i class="ti ti-bolt fs-5 text-warning"></i>
                    </span>
                    <h6 class="mb-0 fw-semibold">Quick Actions</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="<?= base_url('model/create') ?>" class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-device-laptop fs-5"></i>
                                <span class="fs-2">Add Model</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('brands/create') ?>" class="btn btn-outline-warning w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-brand-meta fs-5"></i>
                                <span class="fs-2">Add Brand</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('slider/create') ?>" class="btn btn-outline-danger w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-slideshow fs-5"></i>
                                <span class="fs-2">Add Slider</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('services-admin/create') ?>" class="btn btn-outline-success w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-settings fs-5"></i>
                                <span class="fs-2">Add Service</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('seo-admin') ?>" class="btn btn-outline-info w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-search fs-5"></i>
                                <span class="fs-2">SEO Settings</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('enquiries') ?>" class="btn btn-outline-secondary w-100 py-2 d-flex flex-column align-items-center gap-1">
                                <i class="ti ti-mail fs-5"></i>
                                <span class="fs-2">Enquiries</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- /main row -->

    <!-- Recent Models Grid -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 bg-light-primary rounded-2">
                    <i class="ti ti-cards fs-5 text-primary"></i>
                </span>
                <div>
                    <h6 class="mb-0 fw-semibold">Recently Added Models</h6>
                    <small class="text-muted">Last 6 models in inventory</small>
                </div>
            </div>
            <a href="<?= base_url('model') ?>" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        <div class="card-body p-4">
            <?php if (!empty($recent_models)): ?>
            <div class="row g-3">
                <?php foreach ($recent_models as $m): ?>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="card border model-thumb-card h-100">
                        <div class="position-relative">
                            <?php if (!empty($m['thumbnail'])): ?>
                                <img
                                    src="<?= base_url('writable/uploads/thumbnails/' . $m['thumbnail']) ?>"
                                    alt="<?= esc($m['name']) ?>"
                                    class="card-img-top"
                                    style="height:110px;object-fit:cover;">
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                     style="height:110px;">
                                    <i class="ti ti-device-laptop text-muted fs-1"></i>
                                </div>
                            <?php endif; ?>
                            <span class="position-absolute top-0 end-0 m-1 badge <?= $m['type'] == '1' ? 'bg-primary' : 'bg-success' ?> fs-2">
                                <?= $m['type'] == '1' ? 'Laptop' : 'Desktop' ?>
                            </span>
                        </div>
                        <div class="card-body p-2">
                            <p class="fw-semibold mb-0 fs-2 text-dark text-truncate" title="<?= esc($m['name']) ?>"><?= esc($m['name']) ?></p>
                            <p class="text-muted fs-2 mb-1 text-truncate"><?= esc($m['b_name'] ?? '—') ?></p>
                        </div>
                        <div class="card-footer p-2 bg-transparent border-top">
                            <a href="<?= base_url('model/edit/' . $m['id']) ?>" class="btn btn-sm btn-outline-primary w-100 fs-2">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="d-flex flex-column align-items-center justify-content-center py-4 text-muted">
                <i class="ti ti-device-laptop-off fs-1 mb-2"></i>
                <p class="mb-0">No models added yet.</p>
                <a href="<?= base_url('model/create') ?>" class="btn btn-primary btn-sm mt-2">Add First Model</a>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<style>
.stat-card {
    transition: transform 0.18s ease, box-shadow 0.18s ease;
    cursor: pointer;
}
.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.10) !important;
}
.model-thumb-card {
    transition: transform 0.18s ease, box-shadow 0.18s ease;
    border-radius: 10px;
    overflow: hidden;
}
.model-thumb-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.10) !important;
}
</style>