<div class="container-fluid">
    <div class="mb-4">
        <a href="<?= base_url('enquiries') ?>" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left"></i> Back to Enquiries
        </a>
    </div>

    <div class="row">
        <!-- Customer Card -->
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h4 class="card-title fw-semibold mb-4 text-primary">Customer Profile</h4>
                    
                    <div class="mb-3 border-bottom pb-2">
                        <label class="text-muted font-size-12">Full Name</label>
                        <h5 class="fw-bold text-dark mb-0"><?= esc($enquiry['first_name'] . ' ' . $enquiry['last_name']) ?></h5>
                    </div>

                    <div class="mb-3 border-bottom pb-2">
                        <label class="text-muted font-size-12">Email Address</label>
                        <h5 class="fw-bold mb-0">
                            <a href="mailto:<?= esc($enquiry['email']) ?>"><?= esc($enquiry['email']) ?></a>
                        </h5>
                    </div>

                    <div class="mb-3 border-bottom pb-2">
                        <label class="text-muted font-size-12">Phone Number</label>
                        <h5 class="fw-bold mb-0">
                            <a href="tel:<?= esc($enquiry['phone']) ?>"><?= esc($enquiry['phone']) ?></a>
                        </h5>
                    </div>

                    <div class="mb-3 border-bottom pb-2">
                        <label class="text-muted font-size-12">Submission Date</label>
                        <h5 class="fw-bold text-dark mb-0"><?= date('d F Y, h:i A', strtotime($enquiry['created_at'])) ?></h5>
                    </div>

                    <div class="mb-0">
                        <label class="text-muted font-size-12">Additional Message / Notes</label>
                        <div class="bg-light p-3 rounded text-gray-90 mt-1" style="white-space: pre-wrap; font-size: 14px; min-height: 100px;">
                            <?= esc($enquiry['message'] ?: 'No message provided.') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requested Items Details -->
        <div class="col-lg-7">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h4 class="card-title fw-semibold mb-4 text-primary">Requested Products Summary</h4>

                    <?php if (empty($enquiry['items'])): ?>
                        <div class="alert alert-info text-center">
                            This enquiry was submitted as a direct message from the Contact page (no products were selected).
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 80px;">Thumbnail</th>
                                        <th>Product Name</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($enquiry['items'] as $item): ?>
                                        <tr class="align-middle">
                                            <td>
                                                <img class="img-fluid rounded border p-1" src="<?= base_url('writable/uploads/thumbnails/' . $item['thumbnail']) ?>" alt="Thumbnail" style="max-height: 50px; object-fit: contain;">
                                            </td>
                                            <td>
                                                <strong><?= esc($item['name']) ?></strong>
                                            </td>
                                            <td class="text-center font-weight-bold">
                                                <?= intval($item['qty']) ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($item['type'] === 'rent'): ?>
                                                    <span class="badge bg-primary px-3 py-2 text-uppercase">Rent</span>
                                                <?php else: ?>
                                                    <span class="badge bg-dark px-3 py-2 text-uppercase">Buy</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
