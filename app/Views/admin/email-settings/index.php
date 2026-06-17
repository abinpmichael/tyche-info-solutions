<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Email Notification Settings</h1>
            <p class="text-muted mb-0 fs-3">Configure the recipient email addresses for enquiry and contact form submissions.</p>
        </div>
        <span class="aside-icon p-3 bg-light-primary rounded-3">
            <i class="ti ti-mail-cog fs-4 text-primary"></i>
        </span>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
            <i class="ti ti-circle-check fs-5"></i>
            <div><?= session()->getFlashdata('success') ?></div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Email Settings Card -->
    <div class="card shadow-sm border-0 rounded-lg bg-white">
        <div class="card-body p-4">

            <form method="post" action="<?= base_url('email-settings/update') ?>">
                <?= csrf_field() ?>

                <!-- Enquiry Email -->
                <div class="mb-4 p-3 bg-light rounded-3">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <span class="p-2 bg-light-indigo rounded-3">
                            <i class="ti ti-shopping-cart fs-5 text-indigo"></i>
                        </span>
                        <div>
                            <h5 class="mb-1">Product Enquiry Notification</h5>
                            <p class="text-muted fs-2 mb-0">When a customer submits a product enquiry (from the cart or enquiry page), an email notification is sent to this address.</p>
                        </div>
                    </div>
                    <label for="enquiry_email" class="form-label fw-semibold">
                        Enquiry Recipient Email <span class="text-danger">*</span>
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="enquiry_email"
                        name="enquiry_email"
                        value="<?= esc(old('enquiry_email', $record['enquiry_email'] ?? 'sales@tycheinfosolutions.com')) ?>"
                        placeholder="e.g. sales@tycheinfosolutions.com"
                        required
                    >
                    <div class="form-text text-muted fs-2 mt-1">
                        <i class="ti ti-info-circle"></i> This email receives all product rental enquiry form submissions.
                    </div>
                </div>

                <!-- Contact Email -->
                <div class="mb-4 p-3 bg-light rounded-3">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <span class="p-2 bg-light-success rounded-3">
                            <i class="ti ti-message-circle fs-5 text-success"></i>
                        </span>
                        <div>
                            <h5 class="mb-1">Contact Form Notification</h5>
                            <p class="text-muted fs-2 mb-0">When someone submits a general contact/support message from the Contact Us page, the notification is sent to this address.</p>
                        </div>
                    </div>
                    <label for="contact_email" class="form-label fw-semibold">
                        Contact Recipient Email <span class="text-danger">*</span>
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="contact_email"
                        name="contact_email"
                        value="<?= esc(old('contact_email', $record['contact_email'] ?? 'sales@tycheinfosolutions.com')) ?>"
                        placeholder="e.g. info@tycheinfosolutions.com"
                        required
                    >
                    <div class="form-text text-muted fs-2 mt-1">
                        <i class="ti ti-info-circle"></i> This email receives all contact form messages submitted by visitors.
                    </div>
                </div>

                <!-- Info Note -->
                <div class="alert alert-light border d-flex align-items-start gap-2 mb-4">
                    <i class="ti ti-bulb fs-5 text-warning mt-1"></i>
                    <div class="fs-2">
                        <strong>Note:</strong> Both addresses can be set to the same email, or different addresses for routing to separate departments. Multiple addresses are not supported — use a distribution list if you need to notify multiple people.
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4 py-2">
                        <i class="ti ti-device-floppy me-1"></i> Save Email Settings
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- Current Settings Summary -->
    <div class="card border-0 bg-light mt-3">
        <div class="card-body py-3 px-4">
            <p class="mb-1 fs-2 text-muted fw-semibold">CURRENT ACTIVE SETTINGS</p>
            <div class="d-flex flex-wrap gap-4">
                <div>
                    <span class="text-muted fs-2">Enquiry Email:</span>
                    <span class="badge bg-light-indigo text-indigo ms-2 fs-2 font-monospace"><?= esc($record['enquiry_email'] ?? 'Not set') ?></span>
                </div>
                <div>
                    <span class="text-muted fs-2">Contact Email:</span>
                    <span class="badge bg-light-success text-success ms-2 fs-2 font-monospace"><?= esc($record['contact_email'] ?? 'Not set') ?></span>
                </div>
            </div>
        </div>
    </div>

</div>
