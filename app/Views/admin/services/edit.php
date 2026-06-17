<div class="container-fluid">
    <div class="mb-4">
        <a href="<?= base_url('services-admin') ?>" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left"></i> Back to Services
        </a>
    </div>

    <div class="card shadow-sm border">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-primary">Edit Service: <?= esc($service['title']) ?></h5>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('services-admin/update/' . $service['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Service Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= old('title', $service['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Current Image</label>
                    <div class="mb-2">
                        <?php 
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
                        <img src="<?= $imgSrc ?>" alt="<?= esc($service['title']) ?>" class="img-thumbnail" style="max-height: 150px; object-fit: contain;">
                    </div>
                    <label class="form-label font-weight-bold">Replace Image</label>
                    <input type="file" class="form-control" name="img" accept="image/*">
                    <span class="text-muted font-size-12">Leave blank to keep the current image.</span>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Description Paragraph 1 <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="desc1" rows="5" required><?= old('desc1', $service['desc1']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Description Paragraph 2</label>
                    <textarea class="form-control" name="desc2" rows="5"><?= old('desc2', $service['desc2']) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label font-weight-bold">Status</label>
                    <select class="form-select" name="status">
                        <option value="1" <?= old('status', $service['status']) == '1' ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= old('status', $service['status']) == '0' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Service</button>
            </form>
        </div>
    </div>
</div>
