<div class="container mt-5">
    <h2 class="mb-4">Update Privacy Policy</h2>
    
    <!-- Display success and error flash messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Update Form -->
    <form method="post" action="<?= base_url('privacy-admin/update/' . $record['id']) ?>">
        <?= csrf_field() ?>
        
        <!-- Intro Title -->
        <div class="mb-3">
            <label for="intro_title" class="form-label font-weight-bold">Introductory Title</label>
            <textarea 
                class="form-control" 
                id="intro_title" 
                name="intro_title" 
                rows="2" 
                required><?= old('intro_title', $record['intro_title']) ?></textarea>
        </div>

        <!-- Intro Text -->
        <div class="mb-3">
            <label for="intro_text" class="form-label font-weight-bold">Introductory Description</label>
            <textarea 
                class="form-control" 
                id="intro_text" 
                name="intro_text" 
                rows="3" 
                required><?= old('intro_text', $record['intro_text']) ?></textarea>
        </div>

        <!-- Info Collect -->
        <div class="mb-3">
            <label for="info_collect" class="form-label font-weight-bold">Information We Collect</label>
            <textarea 
                class="form-control" 
                id="info_collect" 
                name="info_collect" 
                rows="5" 
                required><?= old('info_collect', $record['info_collect']) ?></textarea>
        </div>

        <!-- Info Use -->
        <div class="mb-3">
            <label for="info_use" class="form-label font-weight-bold">How We Use Your Information</label>
            <textarea 
                class="form-control" 
                id="info_use" 
                name="info_use" 
                rows="5" 
                required><?= old('info_use', $record['info_use']) ?></textarea>
        </div>

        <!-- Info Share -->
        <div class="mb-3">
            <label for="info_share" class="form-label font-weight-bold">Sharing of Information</label>
            <textarea 
                class="form-control" 
                id="info_share" 
                name="info_share" 
                rows="5" 
                required><?= old('info_share', $record['info_share']) ?></textarea>
        </div>

        <!-- Data Security -->
        <div class="mb-3">
            <label for="data_security" class="form-label font-weight-bold">Data Security</label>
            <textarea 
                class="form-control" 
                id="data_security" 
                name="data_security" 
                rows="4" 
                required><?= old('data_security', $record['data_security']) ?></textarea>
        </div>

        <!-- Cookies Tracking -->
        <div class="mb-3">
            <label for="cookies_tracking" class="form-label font-weight-bold">Cookies and Tracking</label>
            <textarea 
                class="form-control" 
                id="cookies_tracking" 
                name="cookies_tracking" 
                rows="4" 
                required><?= old('cookies_tracking', $record['cookies_tracking']) ?></textarea>
        </div>

        <!-- User Rights -->
        <div class="mb-3">
            <label for="user_rights" class="form-label font-weight-bold">Your Rights</label>
            <textarea 
                class="form-control" 
                id="user_rights" 
                name="user_rights" 
                rows="5" 
                required><?= old('user_rights', $record['user_rights']) ?></textarea>
        </div>

        <!-- Retention Data -->
        <div class="mb-3">
            <label for="retention_data" class="form-label font-weight-bold">Retention of Data</label>
            <textarea 
                class="form-control" 
                id="retention_data" 
                name="retention_data" 
                rows="3" 
                required><?= old('retention_data', $record['retention_data']) ?></textarea>
        </div>

        <!-- Third Party Links -->
        <div class="mb-3">
            <label for="third_party_links" class="form-label font-weight-bold">Third-Party Links</label>
            <textarea 
                class="form-control" 
                id="third_party_links" 
                name="third_party_links" 
                rows="3" 
                required><?= old('third_party_links', $record['third_party_links']) ?></textarea>
        </div>

        <!-- Policy Changes -->
        <div class="mb-3">
            <label for="policy_changes" class="form-label font-weight-bold">Changes to This Policy</label>
            <textarea 
                class="form-control" 
                id="policy_changes" 
                name="policy_changes" 
                rows="3" 
                required><?= old('policy_changes', $record['policy_changes']) ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
