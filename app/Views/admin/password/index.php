<div class="container mt-5">
    <h2 class="mb-4">Change Admin Password</h2>
    
    <!-- Display Success Message -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Display Error Messages -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Password Form -->
    <div class="card shadow-sm border-0 rounded-lg p-4 bg-white" style="max-width: 600px;">
        <div class="card-body p-2">
            <form method="post" action="<?= base_url('admin/change-password/update') ?>">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label for="current_password" class="form-label font-weight-semibold">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="new_password" class="form-label font-weight-semibold">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required autocomplete="off">
                    <div class="form-text text-muted fs-2">Password must be at least 5 characters long.</div>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label font-weight-semibold">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-type new password" required autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary py-2 px-4">Update Password</button>
            </form>
        </div>
    </div>
</div>
