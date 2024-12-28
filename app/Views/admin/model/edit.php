 <!-- Include TinyMCE CDN -->


 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit edit</h5>
              <div class="card">
                <div class="card-body">


    <form action="<?= base_url("model/update/" . $model['id']); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?= $model['name'] ?>" class="form-control" required><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="s_desc">Small Description:</label>
                    <input type="text" name="s_desc" id="s_desc" value="<?= $model['s_desc'] ?>" class="form-control" required><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">-- Select a Product --</option>
                        <?php foreach ($product as $products): ?>
                            <option value="<?= esc($products['p_id']) ?>" 
                                <?= isset($model['type']) && $model['type'] == $products['p_id'] ? 'selected' : '' ?>>
                                <?= esc($products['p_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="processor">Processor:</label>
                    <input type="text" name="processor" id="processor" value="<?= $model['processor'] ?>" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="screen_size">Screen Size:</label>
                    <input type="text" name="screen_size" id="screen_size" value="<?= $model['screen_size'] ?>" class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="storage">Storage:</label>
                    <input type="text" name="storage" id="storage" value="<?= $model['storage'] ?>" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="memory">Memory:</label>
                    <input type="text" name="memory" id="memory" value="<?= $model['memory'] ?>" class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="warranty">Warranty:</label>
                    <input type="text" name="warranty" id="warranty" value="<?= $model['warranty'] ?>" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="graphics">Graphics:</label>
                    <input type="text" name="graphics" id="graphics" value="<?= $model['graphics'] ?>" class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Thumbnail:</label>
                    <?php if ($model['thumbnail']): ?>
                        <div class="mb-2">
                            <img src="<?= base_url("writable/uploads/thumbnails/" . $model['thumbnail']); ?>" width="100">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="thumbnail" class="form-control mb-3">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Gallery:</label>
            <div class="gallery-images">
                <?php foreach ($gallery as $image): ?>
                    <div class="gallery-item">
                        <img src="<?= base_url("writable/uploads/gallery/" . $image['image']); ?>" width="100" class="mr-2">
                        <a href="/model/delete-gallery-image/<?= $image['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <input type="file" name="gallery[]" multiple class="form-control mb-3">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" <?= $model['status'] ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= !$model['status'] ? 'selected' : '' ?>>Inactive</option>
                    </select><br>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="status">About:</label>
                    <textarea id="editor" name="about" class="form-control"><?= $model['about'] ?></textarea>
                    <br>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Graphics Details:</label>
                    <textarea name="about" class="form-control"><?= $model['graphics_d'] ?></textarea>
                    <br>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Display Details:</label>
                    <textarea name="about" class="form-control"><?= $model['display_d'] ?></textarea>
                    <br>
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Audio Details:</label>
                    <textarea name="about" class="form-control"><?= $model['audio_d'] ?></textarea>
                    <br>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Display Details:</label>
                    <textarea name="about" class="form-control"><?= $model['display_d'] ?></textarea>
                    <br>
                </div>
            </div>
        </div>
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Port Datails:</label>
                    <textarea name="about" class="form-control"><?= $model['ports_d'] ?></textarea>
                    <br>
                </div>
            </div>
             
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>
</div>
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
 
 </script>