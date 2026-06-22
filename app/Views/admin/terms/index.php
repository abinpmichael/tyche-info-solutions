<div class="container mt-5">
    <h2 class="mb-4">Update Terms and Conditions</h2>
    
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
    <form method="post" action="<?= base_url('terms-admin/update/' . $record['id']) ?>">
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
                        <label class="form-label fw-semibold">Terms Title Text:</label>
                        <input type="text" name="terms_title" class="form-control" value="<?= esc($record['terms_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Title Tag:</label>
                        <select name="terms_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['terms_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Terms Subtitle Text:</label>
                        <input type="text" name="terms_subtitle" class="form-control" value="<?= esc($record['terms_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Subtitle Tag:</label>
                        <select name="terms_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['terms_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rental Terms -->
        <div class="mb-3">
            <label for="rental_title" class="form-label font-weight-bold">Rental Services Section Title</label>
            <input type="text" name="rental_title" id="rental_title" class="form-control mb-2" value="<?= esc($record['rental_title'] ?? '') ?>">
            <label for="rental_terms" class="form-label font-weight-bold">Rental Services Terms Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="rental_terms" 
                name="rental_terms" 
                rows="4" 
                required><?= old('rental_terms', $record['rental_terms']) ?></textarea>
        </div>

        <!-- Refurbished Terms -->
        <div class="mb-3">
            <label for="refurbished_title" class="form-label font-weight-bold">Refurbished Products Section Title</label>
            <input type="text" name="refurbished_title" id="refurbished_title" class="form-control mb-2" value="<?= esc($record['refurbished_title'] ?? '') ?>">
            <label for="refurbished_terms" class="form-label font-weight-bold">Refurbished Products Terms Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="refurbished_terms" 
                name="refurbished_terms" 
                rows="4" 
                required><?= old('refurbished_terms', $record['refurbished_terms']) ?></textarea>
        </div>

        <!-- Payments Charges -->
        <div class="mb-3">
            <label for="payments_title" class="form-label font-weight-bold">Payments and Charges Section Title</label>
            <input type="text" name="payments_title" id="payments_title" class="form-control mb-2" value="<?= esc($record['payments_title'] ?? '') ?>">
            <label for="payments_charges" class="form-label font-weight-bold">Payments and Charges Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="payments_charges" 
                name="payments_charges" 
                rows="4" 
                required><?= old('payments_charges', $record['payments_charges']) ?></textarea>
        </div>

        <!-- Delivery Collection -->
        <div class="mb-3">
            <label for="delivery_title" class="form-label font-weight-bold">Delivery and Collection Section Title</label>
            <input type="text" name="delivery_title" id="delivery_title" class="form-control mb-2" value="<?= esc($record['delivery_title'] ?? '') ?>">
            <label for="delivery_collection" class="form-label font-weight-bold">Delivery and Collection Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="delivery_collection" 
                name="delivery_collection" 
                rows="4" 
                required><?= old('delivery_collection', $record['delivery_collection']) ?></textarea>
        </div>

        <!-- Limitation Liability -->
        <div class="mb-3">
            <label for="liability_title" class="form-label font-weight-bold">Limitation of Liability Section Title</label>
            <input type="text" name="liability_title" id="liability_title" class="form-control mb-2" value="<?= esc($record['liability_title'] ?? '') ?>">
            <label for="limitation_liability" class="form-label font-weight-bold">Limitation of Liability Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="limitation_liability" 
                name="limitation_liability" 
                rows="3" 
                required><?= old('limitation_liability', $record['limitation_liability']) ?></textarea>
        </div>

        <!-- Privacy Terms -->
        <div class="mb-3">
            <label for="privacy_title_sec" class="form-label font-weight-bold">Privacy Section Title</label>
            <input type="text" name="privacy_title_sec" id="privacy_title_sec" class="form-control mb-2" value="<?= esc($record['privacy_title_sec'] ?? '') ?>">
            <label for="privacy_terms" class="form-label font-weight-bold">Privacy Terms Content</label>
            <textarea 
                class="form-control rich-editor" 
                id="privacy_terms" 
                name="privacy_terms" 
                rows="2" 
                required><?= old('privacy_terms', $record['privacy_terms']) ?></textarea>
        </div>

        <!-- Contact details -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="contact_email" class="form-label font-weight-bold">Contact Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="contact_email" 
                    name="contact_email" 
                    value="<?= old('contact_email', $record['contact_email']) ?>" 
                    required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contact_phone1" class="form-label font-weight-bold">Contact Phone 1</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="contact_phone1" 
                    name="contact_phone1" 
                    value="<?= old('contact_phone1', $record['contact_phone1']) ?>" 
                    required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contact_phone2" class="form-label font-weight-bold">Contact Phone 2</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="contact_phone2" 
                    name="contact_phone2" 
                    value="<?= old('contact_phone2', $record['contact_phone2']) ?>" 
                    required>
            </div>
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
