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
        
        <!-- Intro -->
        <div class="mb-3">
            <label for="intro" class="form-label font-weight-bold">Introduction Subtitle</label>
            <textarea 
                class="form-control rich-editor" 
                id="intro" 
                name="intro" 
                rows="2" 
                required><?= old('intro', $record['intro']) ?></textarea>
        </div>

        <!-- Rental Terms -->
        <div class="mb-3">
            <label for="rental_terms" class="form-label font-weight-bold">Rental Services Terms</label>
            <textarea 
                class="form-control rich-editor" 
                id="rental_terms" 
                name="rental_terms" 
                rows="4" 
                required><?= old('rental_terms', $record['rental_terms']) ?></textarea>
        </div>

        <!-- Refurbished Terms -->
        <div class="mb-3">
            <label for="refurbished_terms" class="form-label font-weight-bold">Refurbished Products Terms</label>
            <textarea 
                class="form-control rich-editor" 
                id="refurbished_terms" 
                name="refurbished_terms" 
                rows="4" 
                required><?= old('refurbished_terms', $record['refurbished_terms']) ?></textarea>
        </div>

        <!-- Payments Charges -->
        <div class="mb-3">
            <label for="payments_charges" class="form-label font-weight-bold">Payments and Charges</label>
            <textarea 
                class="form-control rich-editor" 
                id="payments_charges" 
                name="payments_charges" 
                rows="4" 
                required><?= old('payments_charges', $record['payments_charges']) ?></textarea>
        </div>

        <!-- Delivery Collection -->
        <div class="mb-3">
            <label for="delivery_collection" class="form-label font-weight-bold">Delivery and Collection</label>
            <textarea 
                class="form-control rich-editor" 
                id="delivery_collection" 
                name="delivery_collection" 
                rows="4" 
                required><?= old('delivery_collection', $record['delivery_collection']) ?></textarea>
        </div>

        <!-- Limitation Liability -->
        <div class="mb-3">
            <label for="limitation_liability" class="form-label font-weight-bold">Limitation of Liability</label>
            <textarea 
                class="form-control rich-editor" 
                id="limitation_liability" 
                name="limitation_liability" 
                rows="3" 
                required><?= old('limitation_liability', $record['limitation_liability']) ?></textarea>
        </div>

        <!-- Privacy Terms -->
        <div class="mb-3">
            <label for="privacy_terms" class="form-label font-weight-bold">Privacy Terms</label>
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
