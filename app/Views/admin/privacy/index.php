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
        
        <!-- Heading Customizations -->
        <div class="card mb-4 border shadow-sm">
            <div class="card-header bg-light py-3 d-flex align-items-center">
                <i class="ti ti-typography fs-5 text-primary me-2"></i>
                <h6 class="mb-0 fw-semibold text-primary">Page Heading & HTML Tags</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Privacy Title Text:</label>
                        <input type="text" name="privacy_title" class="form-control" value="<?= esc($record['privacy_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Title Tag:</label>
                        <select name="privacy_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['privacy_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Privacy Subtitle Text:</label>
                        <input type="text" name="privacy_subtitle" class="form-control" value="<?= esc($record['privacy_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Subtitle Tag:</label>
                        <select name="privacy_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['privacy_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Intro Text -->
        <div class="mb-3">
            <label for="intro_text" class="form-label font-weight-bold">Introductory Description</label>
            <textarea 
                class="form-control rich-editor" 
                id="intro_text" 
                name="intro_text" 
                rows="3" 
                required><?= old('intro_text', $record['intro_text']) ?></textarea>
        </div>

        <!-- Info Collect -->
        <div class="mb-3">
            <label for="collect_title" class="form-label font-weight-bold">Information We Collect Section Title</label>
            <input type="text" name="collect_title" id="collect_title" class="form-control mb-2" value="<?= esc($record['collect_title'] ?? '') ?>">
            <label for="info_collect" class="form-label font-weight-bold">Information We Collect Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="info_collect" 
                name="info_collect" 
                rows="4" 
                required><?= old('info_collect', $record['info_collect']) ?></textarea>
        </div>

        <!-- Info Use -->
        <div class="mb-3">
            <label for="use_title" class="form-label font-weight-bold">How We Use Your Information Section Title</label>
            <input type="text" name="use_title" id="use_title" class="form-control mb-2" value="<?= esc($record['use_title'] ?? '') ?>">
            <label for="info_use" class="form-label font-weight-bold">How We Use Your Information Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="info_use" 
                name="info_use" 
                rows="4" 
                required><?= old('info_use', $record['info_use']) ?></textarea>
        </div>

        <!-- Info Share -->
        <div class="mb-3">
            <label for="share_title" class="form-label font-weight-bold">Sharing of Information Section Title</label>
            <input type="text" name="share_title" id="share_title" class="form-control mb-2" value="<?= esc($record['share_title'] ?? '') ?>">
            <label for="info_share" class="form-label font-weight-bold">Sharing of Information Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="info_share" 
                name="info_share" 
                rows="4" 
                required><?= old('info_share', $record['info_share']) ?></textarea>
        </div>

        <!-- Data Security -->
        <div class="mb-3">
            <label for="security_title" class="form-label font-weight-bold">Data Security Section Title</label>
            <input type="text" name="security_title" id="security_title" class="form-control mb-2" value="<?= esc($record['security_title'] ?? '') ?>">
            <label for="data_security" class="form-label font-weight-bold">Data Security Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="data_security" 
                name="data_security" 
                rows="3" 
                required><?= old('data_security', $record['data_security']) ?></textarea>
        </div>

        <!-- Cookies Tracking -->
        <div class="mb-3">
            <label for="cookies_title" class="form-label font-weight-bold">Cookies and Tracking Section Title</label>
            <input type="text" name="cookies_title" id="cookies_title" class="form-control mb-2" value="<?= esc($record['cookies_title'] ?? '') ?>">
            <label for="cookies_tracking" class="form-label font-weight-bold">Cookies and Tracking Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="cookies_tracking" 
                name="cookies_tracking" 
                rows="3" 
                required><?= old('cookies_tracking', $record['cookies_tracking']) ?></textarea>
        </div>

        <!-- User Rights -->
        <div class="mb-3">
            <label for="rights_title" class="form-label font-weight-bold">Your Rights Section Title</label>
            <input type="text" name="rights_title" id="rights_title" class="form-control mb-2" value="<?= esc($record['rights_title'] ?? '') ?>">
            <label for="user_rights" class="form-label font-weight-bold">Your Rights Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="user_rights" 
                name="user_rights" 
                rows="4" 
                required><?= old('user_rights', $record['user_rights']) ?></textarea>
        </div>

        <!-- Retention Data -->
        <div class="mb-3">
            <label for="retention_title" class="form-label font-weight-bold">Retention of Data Section Title</label>
            <input type="text" name="retention_title" id="retention_title" class="form-control mb-2" value="<?= esc($record['retention_title'] ?? '') ?>">
            <label for="retention_data" class="form-label font-weight-bold">Retention of Data Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="retention_data" 
                name="retention_data" 
                rows="3" 
                required><?= old('retention_data', $record['retention_data']) ?></textarea>
        </div>

        <!-- Third Party Links -->
        <div class="mb-3">
            <label for="third_party_title" class="form-label font-weight-bold">Third-Party Links Section Title</label>
            <input type="text" name="third_party_title" id="third_party_title" class="form-control mb-2" value="<?= esc($record['third_party_title'] ?? '') ?>">
            <label for="third_party_links" class="form-label font-weight-bold">Third-Party Links Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="third_party_links" 
                name="third_party_links" 
                rows="3" 
                required><?= old('third_party_links', $record['third_party_links']) ?></textarea>
        </div>

        <!-- Policy Changes -->
        <div class="mb-3">
            <label for="changes_title" class="form-label font-weight-bold">Changes to This Policy Section Title</label>
            <input type="text" name="changes_title" id="changes_title" class="form-control mb-2" value="<?= esc($record['changes_title'] ?? '') ?>">
            <label for="policy_changes" class="form-label font-weight-bold">Changes to This Policy Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="policy_changes" 
                name="policy_changes" 
                rows="3" 
                required><?= old('policy_changes', $record['policy_changes']) ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-2">Update</button>
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
