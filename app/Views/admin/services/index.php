<div class="container-fluid">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Services</h1>
        <a href="<?= base_url('services-admin/create') ?>" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add New Service
        </a>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm border">
        <table class="table table-hover table-vcenter mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <?php 
                        // Image source resolution
                        if (!empty($service['img'])) {
                            if (file_exists(WRITEPATH . 'uploads/services/' . $service['img'])) {
                                $imgSrc = base_url('writable/uploads/services/' . $service['img']);
                            } else {
                                $imgSrc = base_url('assets/img/services/' . $service['img']);
                            }
                        } else {
                            $imgSrc = base_url('assets/img/services/corporate-bulk-solutions.webp');
                        }
                        ?>
                        <tr>
                            <td><?= esc($service['id']) ?></td>
                            <td>
                                <img src="<?= $imgSrc ?>" alt="<?= esc($service['title']) ?>" class="img-thumbnail" style="max-height: 50px; max-width: 80px; object-fit: cover;">
                            </td>
                            <td><strong><?= esc($service['title']) ?></strong></td>
                            <td>
                                <?php if ($service['status'] == 1): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('services-admin/edit/' . $service['id']) ?>" class="btn btn-sm btn-info mr-1" title="Edit Service">
                                    <i class="ti ti-edit fs-5"></i>
                                </a>
                                <a href="<?= base_url('services-admin/delete/' . $service['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?');" title="Delete Service">
                                    <i class="ti ti-trash-x fs-5"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No services found. Add some to get started.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
