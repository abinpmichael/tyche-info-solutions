<div class="container-fluid">
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>SEO Metadata Settings</h1>
        <a href="<?= base_url('seo-admin/create') ?>" class="btn btn-success">
            <i class="ti ti-plus"></i> Add New Route SEO
        </a>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm border">
        <table class="table table-hover table-vcenter mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Page Name</th>
                    <th>Page Route</th>
                    <th>Meta Title</th>
                    <th>Description Summary</th>
                    <th class="text-center" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= esc($record['id']) ?></td>
                            <td><strong><?= esc($record['page_name']) ?></strong></td>
                            <td><span class="badge bg-light text-dark fs-2 font-monospace">/<?= esc($record['page_route']) ?></span></td>
                            <td><small><?= esc($record['meta_title']) ?></small></td>
                            <td><small><?= esc(substr($record['meta_description'] ?? '', 0, 75)) ?><?= strlen($record['meta_description'] ?? '') > 75 ? '...' : '' ?></small></td>
                            <td class="text-center">
                                <a href="<?= base_url('seo-admin/edit/' . $record['id']) ?>" class="btn btn-sm btn-info" title="Edit SEO Details">
                                    <i class="ti ti-edit fs-5"></i> Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No SEO configurations found in the database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
