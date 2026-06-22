<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Refund &amp; Cancellation Policy CMS</h1>
            <p class="text-muted mb-0 fs-3">Manage the content displayed on the Refund and Cancellation Policy public page.</p>
        </div>
        <a href="<?= base_url('refund-and-cancellation-policy') ?>" target="_blank" class="btn btn-outline-secondary">
            <i class="ti ti-external-link me-1"></i> View Page
        </a>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4">
            <i class="ti ti-circle-check fs-5"></i>
            <div><?= session()->getFlashdata('success') ?></div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <ul class="mb-0 ps-3">
                <?php foreach (session()->getFlashdata('errors') as $e): ?>
                    <li><?= esc($e) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('refund-admin/update/1') ?>">
        <?= csrf_field() ?>

        <div class="row g-4">

            <!-- LEFT: Content Sections -->
            <div class="col-lg-8">

                <!-- Heading Customizations -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-primary rounded-2">
                            <i class="ti ti-typography fs-5 text-primary"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Page Heading & HTML Tags</h6>
                            <small class="text-muted">Customize the main headings on the Refund Policy page</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold">Refund Title Text:</label>
                                <input type="text" name="refund_title" class="form-control" value="<?= esc($record['refund_title'] ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Title Tag:</label>
                                <select name="refund_title_tag" class="form-select">
                                    <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                        <option value="<?= $tag ?>" <?= ($record['refund_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold">Refund Subtitle Text:</label>
                                <input type="text" name="refund_subtitle" class="form-control" value="<?= esc($record['refund_subtitle'] ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Subtitle Tag:</label>
                                <select name="refund_subtitle_tag" class="form-select">
                                    <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                        <option value="<?= $tag ?>" <?= ($record['refund_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cancellation Policy -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-danger rounded-2"><i class="ti ti-ban fs-5 text-danger"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Cancellation Policy — For Rentals</h6>
                            <small class="text-muted">Before/after delivery cancellation rules</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="cancellation_title" class="form-label fw-semibold">Cancellation Policy Section Main Title</label>
                            <input type="text" name="cancellation_title" id="cancellation_title" class="form-control mb-2" value="<?= esc($record['cancellation_title'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cancellation_rentals_title" class="form-label fw-semibold">For Rentals Subsection Title</label>
                            <input type="text" name="cancellation_rentals_title" id="cancellation_rentals_title" class="form-control mb-2" value="<?= esc($record['cancellation_rentals_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="cancellation_rentals" rows="6"><?= esc(old('cancellation_rentals', $record['cancellation_rentals'])) ?></textarea>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-warning rounded-2"><i class="ti ti-ban fs-5 text-warning"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Cancellation Policy — For Refurbished Products</h6>
                            <small class="text-muted">Order cancellation window for refurbished products</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="cancellation_refurbished_title" class="form-label fw-semibold">For Refurbished Products Subsection Title</label>
                            <input type="text" name="cancellation_refurbished_title" id="cancellation_refurbished_title" class="form-control mb-2" value="<?= esc($record['cancellation_refurbished_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="cancellation_refurbished" rows="4"><?= esc(old('cancellation_refurbished', $record['cancellation_refurbished'])) ?></textarea>
                    </div>
                </div>

                <!-- Refund Policy -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-success rounded-2"><i class="ti ti-cash-refund fs-5 text-success"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Refund Policy — For Rentals</h6>
                            <small class="text-muted">When and how rental refunds are processed</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="refund_title_sec" class="form-label fw-semibold">Refund Policy Section Main Title</label>
                            <input type="text" name="refund_title_sec" id="refund_title_sec" class="form-control mb-2" value="<?= esc($record['refund_title_sec'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="refund_rentals_title" class="form-label fw-semibold">For Rentals Subsection Title</label>
                            <input type="text" name="refund_rentals_title" id="refund_rentals_title" class="form-control mb-2" value="<?= esc($record['refund_rentals_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="refund_rentals" rows="5"><?= esc(old('refund_rentals', $record['refund_rentals'])) ?></textarea>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-primary rounded-2"><i class="ti ti-cash-refund fs-5 text-primary"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Refund Policy — For Refurbished Products</h6>
                            <small class="text-muted">Defective product refund conditions</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="refund_refurbished_title" class="form-label fw-semibold">For Refurbished Products Subsection Title</label>
                            <input type="text" name="refund_refurbished_title" id="refund_refurbished_title" class="form-control mb-2" value="<?= esc($record['refund_refurbished_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="refund_refurbished" rows="5"><?= esc(old('refund_refurbished', $record['refund_refurbished'])) ?></textarea>
                    </div>
                </div>

                <!-- Return & Exchange -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-indigo rounded-2"><i class="ti ti-arrows-exchange fs-5 text-indigo"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Return and Exchange Policy</h6>
                            <small class="text-muted">Conditions for returns and product exchanges</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="return_exchange_title" class="form-label fw-semibold">Return and Exchange Policy Section Title</label>
                            <input type="text" name="return_exchange_title" id="return_exchange_title" class="form-control mb-2" value="<?= esc($record['return_exchange_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="return_exchange" rows="6"><?= esc(old('return_exchange', $record['return_exchange'])) ?></textarea>
                    </div>
                </div>

                <!-- Exceptions -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-danger rounded-2"><i class="ti ti-alert-triangle fs-5 text-danger"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Exceptions to Refunds</h6>
                            <small class="text-muted">Cases where refunds will NOT be provided</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="exceptions_title" class="form-label fw-semibold">Exceptions Section Title</label>
                            <input type="text" name="exceptions_title" id="exceptions_title" class="form-control mb-2" value="<?= esc($record['exceptions_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="exceptions" rows="5"><?= esc(old('exceptions', $record['exceptions'])) ?></textarea>
                    </div>
                </div>

                <!-- Process -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-success rounded-2"><i class="ti ti-list-check fs-5 text-success"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Process for Refunds and Returns</h6>
                            <small class="text-muted">Step-by-step instructions for customers</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="process_title" class="form-label fw-semibold">Process Section Title</label>
                            <input type="text" name="process_title" id="process_title" class="form-control mb-2" value="<?= esc($record['process_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="process" rows="4"><?= esc(old('process', $record['process'])) ?></textarea>
                    </div>
                </div>

                <!-- Late or Missing Refunds -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-warning rounded-2"><i class="ti ti-clock-pause fs-5 text-warning"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Late or Missing Refunds</h6>
                            <small class="text-muted">What customers should do if refund is delayed</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="late_missing_title" class="form-label fw-semibold">Late or Missing Refunds Section Title</label>
                            <input type="text" name="late_missing_title" id="late_missing_title" class="form-control mb-2" value="<?= esc($record['late_missing_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="late_missing" rows="4"><?= esc(old('late_missing', $record['late_missing'])) ?></textarea>
                    </div>
                </div>

                <!-- Changes to Policy -->
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4 d-flex align-items-center gap-2">
                        <span class="p-2 bg-light-secondary rounded-2"><i class="ti ti-refresh fs-5 text-secondary"></i></span>
                        <div>
                            <h6 class="mb-0 fw-semibold">Changes to This Policy</h6>
                            <small class="text-muted">Policy modification notice statement</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="changes_policy_title" class="form-label fw-semibold">Changes to This Policy Section Title</label>
                            <input type="text" name="changes_policy_title" id="changes_policy_title" class="form-control mb-2" value="<?= esc($record['changes_policy_title'] ?? '') ?>">
                        </div>
                        <textarea class="form-control rich-editor" name="changes_policy" rows="3"><?= esc(old('changes_policy', $record['changes_policy'])) ?></textarea>
                    </div>
                </div>

            </div>

            <!-- RIGHT: Save Panel -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-lg sticky-top" style="top:80px;">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h6 class="mb-0 fw-semibold">Save Changes</h6>
                    </div>
                    <div class="card-body p-4">
                        <button type="submit" class="btn btn-primary w-100 py-2 mb-2">
                            <i class="ti ti-device-floppy me-1"></i> Update Policy
                        </button>
                        <a href="<?= base_url('refund-and-cancellation-policy') ?>" target="_blank" class="btn btn-outline-secondary w-100 mb-2">
                            <i class="ti ti-external-link me-1"></i> View Live Page
                        </a>
                        <hr class="my-3">
                        <div class="alert alert-light border mb-0 fs-2">
                            <i class="ti ti-info-circle me-1 text-primary"></i>
                            <strong>SEO for this page</strong> is managed in
                            <a href="<?= base_url('seo-admin') ?>">SEO Settings</a>
                            using route: <code>refund-and-cancellation-policy</code>
                        </div>
                    </div>
                    <!-- Sections guide -->
                    <div class="card-body border-top pt-3 px-4 pb-4">
                        <p class="fs-2 fw-semibold text-muted mb-2">PAGE SECTIONS</p>
                        <ul class="list-unstyled fs-2 text-muted mb-0">
                            <li class="mb-1"><i class="ti ti-ban text-danger me-1"></i> Cancellation — Rentals</li>
                            <li class="mb-1"><i class="ti ti-ban text-warning me-1"></i> Cancellation — Refurbished</li>
                            <li class="mb-1"><i class="ti ti-cash-refund text-success me-1"></i> Refund — Rentals</li>
                            <li class="mb-1"><i class="ti ti-cash-refund text-primary me-1"></i> Refund — Refurbished</li>
                            <li class="mb-1"><i class="ti ti-arrows-exchange text-indigo me-1"></i> Return &amp; Exchange</li>
                            <li class="mb-1"><i class="ti ti-alert-triangle text-danger me-1"></i> Exceptions</li>
                            <li class="mb-1"><i class="ti ti-list-check text-success me-1"></i> Process</li>
                            <li class="mb-1"><i class="ti ti-clock-pause text-warning me-1"></i> Late/Missing Refunds</li>
                            <li class="mb-1"><i class="ti ti-refresh text-secondary me-1"></i> Policy Changes</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js" integrity="sha512-Li99Fwr7Wagnan6Di9BMCxQ0DiCJYL11qn2YM/S8tGeSSPCMeMHjEOwWUXDYAu/pcyLhQko2zmvyiCphdUKC7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/jquery.tinymce.min.js" integrity="sha512-nmHWouzLZ3EkXUiXVLpRy/scUPyOOwWkAZ6p8GJnswtVIfSgQ6dFjfCv4VrUA9YgutCRqUDyjHGfQ+/3OEbH4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.2/plugins/advlist/plugin.min.js"></script>

<script>
tinymce.init({
    selector: 'textarea.rich-editor',
    height: 250,
    plugins: 'image code table lists link media paste emoticons fullscreen',
    toolbar: 'undo redo | formatselect | bold italic | numlist bullist | alignleft aligncenter alignright | link image table | code fullscreen',
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {title: file.name});
            };
            reader.readAsDataURL(file);
        };
        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
