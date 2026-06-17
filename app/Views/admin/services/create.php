<div class="container-fluid">
    <div class="mb-4">
        <a href="<?= base_url('services-admin') ?>" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left"></i> Back to Services
        </a>
    </div>

    <div class="card shadow-sm border">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-primary">Add New Service</h5>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('services-admin/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Service Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= old('title') ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Upload Image</label>
                    <input type="file" class="form-control" name="img" accept="image/*">
                    <span class="text-muted font-size-12">Recommended format: .webp, .jpg, .png. Size around 600x300px.</span>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Description Paragraph 1 <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="desc1" rows="5" required><?= old('desc1') ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Description Paragraph 2</label>
                    <textarea class="form-control" name="desc2" rows="5"><?= old('desc2') ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label font-weight-bold">Status</label>
                    <select class="form-select" name="status">
                        <option value="1" <?= old('status', '1') == '1' ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= old('status') == '0' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Service</button>
            </form>
        </div>
    </div>
</div>
