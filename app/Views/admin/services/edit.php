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
                    <textarea class="form-control rich-editor" name="desc1" rows="5" required><?= old('desc1', $service['desc1']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Description Paragraph 2</label>
                    <textarea class="form-control rich-editor" name="desc2" rows="5"><?= old('desc2', $service['desc2']) ?></textarea>
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
