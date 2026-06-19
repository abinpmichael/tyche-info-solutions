 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit HomePage</h5>
              <div class="card">
                <div class="card-body">
 <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('msg') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="table-responsive">
<?php// print_r($record);
///foreach ($record as $record): ?>
<form action="<?= base_url('home/update/1'); ?>" method="post" enctype="multipart/form-data">
     <?= csrf_field(); ?>

    <!-- Heading Customizations -->
    <div class="card mb-4 border shadow-sm">
        <div class="card-header bg-light py-3 d-flex align-items-center">
            <i class="ti ti-typography fs-5 text-primary me-2"></i>
            <h6 class="mb-0 fw-semibold text-primary">Edit Section Headings & HTML Tags</h6>
        </div>
        <div class="card-body">
            <!-- Section 1: Welcome Section -->
            <div class="border-bottom pb-3 mb-3">
                <h6 class="fw-semibold text-dark mb-3">1. Welcome Section</h6>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Welcome Title Text:</label>
                        <input type="text" name="welcome_title" class="form-control" value="<?= esc($record['welcome_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Welcome Title Tag:</label>
                        <select name="welcome_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['welcome_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Welcome Subtitle Text:</label>
                        <input type="text" name="welcome_subtitle" class="form-control" value="<?= esc($record['welcome_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Welcome Subtitle Tag:</label>
                        <select name="welcome_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['welcome_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 2: Products Section -->
            <div class="border-bottom pb-3 mb-3">
                <h6 class="fw-semibold text-dark mb-3">2. Laptops & Desktops Collections Section</h6>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Collections Title Text:</label>
                        <input type="text" name="products_title" class="form-control" value="<?= esc($record['products_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Collections Title Tag:</label>
                        <select name="products_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['products_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Collections Subtitle Text:</label>
                        <input type="text" name="products_subtitle" class="form-control" value="<?= esc($record['products_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Collections Subtitle Tag:</label>
                        <select name="products_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['products_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 3: Why Choose Us Section -->
            <div class="border-bottom pb-3 mb-3">
                <h6 class="fw-semibold text-dark mb-3">3. Why Choose Us Section</h6>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Why Choose Us Title Text:</label>
                        <input type="text" name="why_title" class="form-control" value="<?= esc($record['why_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Why Choose Us Title Tag:</label>
                        <select name="why_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['why_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Why Choose Us Subtitle Text:</label>
                        <input type="text" name="why_subtitle" class="form-control" value="<?= esc($record['why_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Why Choose Us Subtitle Tag:</label>
                        <select name="why_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['why_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 4: Our Brands Section -->
            <div>
                <h6 class="fw-semibold text-dark mb-3">4. Our Brands Section</h6>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Our Brands Title Text:</label>
                        <input type="text" name="brands_title" class="form-control" value="<?= esc($record['brands_title'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Our Brands Title Tag:</label>
                        <select name="brands_title_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['brands_title_tag'] ?? 'h4') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Our Brands Subtitle Text:</label>
                        <input type="text" name="brands_subtitle" class="form-control" value="<?= esc($record['brands_subtitle'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Our Brands Subtitle Tag:</label>
                        <select name="brands_subtitle_tag" class="form-select">
                            <?php foreach (['h1','h2','h3','h4','h5','h6','span','p','div'] as $tag): ?>
                                <option value="<?= $tag ?>" <?= ($record['brands_subtitle_tag'] ?? 'h5') === $tag ? 'selected' : '' ?>><?= $tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <label class="fw-semibold text-dark mb-2">Welcome Note Content:</label>
    <textarea id="editor" name="welcome_note" class="form-control"><?= $record['welcome_note'] ?></textarea>
    <br>
    <label>Image:</label>
    <input type="file" name="w_img"  class="form-control">
    <img src="<?= base_url('writable/uploads/home/' . $record['w_img']) ?>" width='100px;' alt="Thumbnail">
    <br>
    <label>Read More Link:</label>
    <input type="text" name="r_link" class="form-control" value="<?= $record['r_link'] ?>" >
   
    <br>
    <label>Why Choose Us:</label>
    
   <textarea id="editor1" name="why" class="form-control"><?= $record['why'] ?></textarea>
    <br>
     <label>We Serve:</label>
    
   <textarea id="editor2" name="we_serve" class="form-control"><?= $record['we_serve'] ?></textarea>
    <br>
    <!-- SEO Notice -->
    <div class="alert alert-info d-flex align-items-start gap-2 mt-3 mb-3" role="alert">
        <i class="ti ti-info-circle fs-5 mt-1"></i>
        <div>
            <strong>SEO & Script Settings</strong> — Meta title, meta description, keywords, schema markup, and header/footer scripts for this page are managed in the <a href="<?= base_url('seo-admin') ?>" class="alert-link">SEO Settings</a> section.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>









 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js" integrity="sha512-Li99Fwr7Wagnan6Di9BMCxQ0DiCJYL11qn2YM/S8tGeSSPCMeMHjEOwWUXDYAu/pcyLhQko2zmvyiCphdUKC7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/jquery.tinymce.min.js" integrity="sha512-nmHWouzLZ3EkXUiXVLpRy/scUPyOOwWkAZ6p8GJnswtVIfSgQ6dFjfCv4VrUA9YgutCRqUDyjHGfQ+/3OEbH4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.2/plugins/advlist/plugin.min.js"></script>

                     <script>
 tinymce.init({
   selector: 'textarea#editor',  //Change this value according to your HTML
    auto_focus: 'element1',
   /*width: "700",
   height: "200",*/
   plugins: 'image code, casechange, permanentpen, checklist, pageembed, formatpainter, table advtable, media, autoresize, paste, lists, searchreplace, emoticons, fullscreen, autolink link',
        toolbar: 'undo redo | casechange | formatselect | pageembed | permanentpen | bold italic | checklist numlist bullist | alignleft aligncenter alignright forecolor backcolor | table advtable searchreplace | link image media | code | rotateleft rotateright | imageoptions | quicklink blockquote | emoticons',
        // toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",
        // menubar: true
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        file_picker_types: 'image',
        /* and here's our custom image picker*/
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

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {title: file.name});
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 }); 
 tinymce.init({
   selector: 'textarea#editor1',  //Change this value according to your HTML
    auto_focus: 'element1',
   /*width: "700",
   height: "200",*/
   plugins: 'image code, casechange, permanentpen, checklist, pageembed, formatpainter, table advtable, media, autoresize, paste, lists, searchreplace, emoticons, fullscreen, autolink link',
        toolbar: 'undo redo | casechange | formatselect | pageembed | permanentpen | bold italic | checklist numlist bullist | alignleft aligncenter alignright forecolor backcolor | table advtable searchreplace | link image media | code | rotateleft rotateright | imageoptions | quicklink blockquote | emoticons',
        // toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",
        // menubar: true
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        file_picker_types: 'image',
        /* and here's our custom image picker*/
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

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {title: file.name});
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 }); 
 tinymce.init({
   selector: 'textarea#editor2',  //Change this value according to your HTML
    auto_focus: 'element1',
   /*width: "700",
   height: "200",*/
   plugins: 'image code, casechange, permanentpen, checklist, pageembed, formatpainter, table advtable, media, autoresize, paste, lists, searchreplace, emoticons, fullscreen, autolink link',
        toolbar: 'undo redo | casechange | formatselect | pageembed | permanentpen | bold italic | checklist numlist bullist | alignleft aligncenter alignright forecolor backcolor | table advtable searchreplace | link image media | code | rotateleft rotateright | imageoptions | quicklink blockquote | emoticons',
        // toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",
        // menubar: true
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        file_picker_types: 'image',
        /* and here's our custom image picker*/
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

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {title: file.name});
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 }); 
 </script>