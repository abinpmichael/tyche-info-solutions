<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">About Us CMS</h1>
            <p class="text-muted mb-0 fs-3">Manage the content displayed on the About Us public page.</p>
        </div>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left me-1"></i> Dashboard
        </a>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="ti ti-circle-check fs-5"></i>
            <div><?= session()->getFlashdata('success') ?></div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center gap-2 mb-2">
                <i class="ti ti-alert-circle fs-5"></i>
                <strong>Please fix the following errors:</strong>
            </div>
            <ul class="mb-0 ps-3">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('about/update/' . $record['id']) ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="row g-4">

            <!-- LEFT COLUMN: Content Sections -->
            <div class="col-lg-8">

                <!-- About Section -->
                <div class="card shadow-sm border-0 rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-primary rounded-2">
                            <i class="ti ti-building-community fs-5 text-primary"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">About the Company</h6>
                            <small class="text-muted">Main introductory paragraph on the About page</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <label for="about" class="form-label fw-semibold">About Text <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            id="about"
                            name="about"
                            rows="6"
                            placeholder="Write a brief overview of the company..."
                            required><?= old('about', $record['about']) ?></textarea>
                        <div class="form-text text-muted fs-2 mt-1">This appears as the primary introduction paragraph on the About Us page.</div>
                    </div>
                </div>

                <!-- Our Mission -->
                <div class="card shadow-sm border-0 rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-success rounded-2">
                            <i class="ti ti-target fs-5 text-success"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Our Mission</h6>
                            <small class="text-muted">What drives the company forward</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <label for="our_mission" class="form-label fw-semibold">Mission Statement <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            id="our_mission"
                            name="our_mission"
                            rows="5"
                            placeholder="Describe the company's mission..."
                            required><?= old('our_mission', $record['our_mission']) ?></textarea>
                        <div class="form-text text-muted fs-2 mt-1">Displayed in the "Our Mission" section card on the About page.</div>
                    </div>
                </div>

                <!-- Our Vision -->
                <div class="card shadow-sm border-0 rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-warning rounded-2">
                            <i class="ti ti-eye fs-5 text-warning"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Our Vision</h6>
                            <small class="text-muted">Long-term goals and aspirations</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <label for="our_vision" class="form-label fw-semibold">Vision Statement <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            id="our_vision"
                            name="our_vision"
                            rows="5"
                            placeholder="Describe the company's vision..."
                            required><?= old('our_vision', $record['our_vision']) ?></textarea>
                        <div class="form-text text-muted fs-2 mt-1">Displayed in the "Our Vision" section card on the About page.</div>
                    </div>
                </div>

                <!-- Our Values -->
                <div class="card shadow-sm border-0 rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-indigo rounded-2">
                            <i class="ti ti-heart fs-5 text-indigo"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Our Values</h6>
                            <small class="text-muted">Core principles the company stands by</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <label for="our_values" class="form-label fw-semibold">Values Description <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            id="our_values"
                            name="our_values"
                            rows="5"
                            placeholder="Describe the company's core values..."
                            required><?= old('our_values', $record['our_values']) ?></textarea>
                        <div class="form-text text-muted fs-2 mt-1">Displayed in the "Our Values" section card on the About page.</div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Image + Save -->
            <div class="col-lg-4">

                <!-- Save Card -->
                <div class="card shadow-sm border-0 rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h6 class="mb-0 fw-semibold">Save Changes</h6>
                    </div>
                    <div class="card-body p-4">
                        <button type="submit" class="btn btn-primary w-100 py-2 mb-2">
                            <i class="ti ti-device-floppy me-1"></i> Update About Page
                        </button>
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary w-100">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                        <hr class="my-3">
                        <p class="fs-2 text-muted mb-0">
                            <i class="ti ti-info-circle me-1"></i>
                            All fields are required. Changes take effect immediately on the public-facing About Us page.
                        </p>
                    </div>
                </div>

                <!-- About Image Card -->
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-danger rounded-2">
                            <i class="ti ti-photo fs-5 text-danger"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">About Page Image</h6>
                            <small class="text-muted">Featured image shown on the About page</small>
                        </div>
                    </div>
                    <div class="card-body p-4">

                        <!-- Current Image Preview -->
                        <?php if (!empty($record['img'])): ?>
                            <?php
                            if (file_exists(WRITEPATH . 'uploads/' . $record['img'])) {
                                $previewUrl = base_url('writable/uploads/' . $record['img']);
                            } else {
                                $previewUrl = base_url('assets/img/about/' . $record['img']);
                            }
                            ?>
                            <div class="mb-3 text-center">
                                <img
                                    src="<?= $previewUrl ?>"
                                    alt="Current About Image"
                                    class="img-fluid rounded-3 shadow-sm"
                                    style="max-height: 220px; width: 100%; object-fit: cover;"
                                >
                                <p class="fs-2 text-muted mt-2 mb-0">
                                    <i class="ti ti-file-description me-1"></i><?= esc($record['img']) ?>
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center mb-3" style="height: 160px;">
                                <div class="text-center text-muted">
                                    <i class="ti ti-photo-off fs-1 mb-2 d-block"></i>
                                    <small>No image uploaded yet</small>
                                </div>
                            </div>
                        <?php endif; ?>

                        <label for="img" class="form-label fw-semibold">Upload New Image</label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*">
                        <div class="form-text text-muted fs-2 mt-1">
                            Accepted: JPG, PNG, WEBP. Recommended size: 800×600px or larger.
                            Uploading a new image will replace the current one.
                        </div>

                    </div>
                </div>

            </div>
        </div><!-- /.row -->

    </form>

</div>
