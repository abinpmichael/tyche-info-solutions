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
        <h1>Customer Enquiries & Messages</h1>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm border">
        <table class="table table-hover table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date Submitted</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($enquiries)): ?>
                    <?php foreach ($enquiries as $enquiry): ?>
                        <tr>
                            <td><?= esc($enquiry['id']) ?></td>
                            <td><strong><?= esc($enquiry['first_name'] . ' ' . $enquiry['last_name']) ?></strong></td>
                            <td><?= esc($enquiry['email']) ?></td>
                            <td><?= esc($enquiry['phone']) ?></td>
                            <td><?= date('d M Y, h:i A', strtotime($enquiry['created_at'])) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('enquiries/view/' . $enquiry['id']) ?>" class="btn btn-sm btn-primary mr-1" title="View Enquiry Details">
                                    <i class="ti ti-eye fs-5"></i> View
                                </a>
                                <a href="<?= base_url('enquiries/delete/' . $enquiry['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enquiry?');" title="Delete Enquiry">
                                    <i class="ti ti-trash-x fs-5"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No customer enquiries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
