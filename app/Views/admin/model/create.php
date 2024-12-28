 <style type="text/css">

#preview img {
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>

 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit edit</h5>
              <div class="card">
                <div class="card-body">


    <form action="<?= base_url("model/store") ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"  class="form-control" required><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="s_desc">Small Description:</label>
                    <input type="text" name="s_desc" id="s_desc"  class="form-control" required><br>
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
                                >
                                <?= esc($products['p_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="processor">Processor:</label>
                    <input type="text" name="processor" id="processor"  class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="screen_size">Screen Size:</label>
                    <input type="text" name="screen_size" id="screen_size"  class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="storage">Storage:</label>
                    <input type="text" name="storage" id="storage"  class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="memory">Memory:</label>
                    <input type="text" name="memory" id="memory" class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="warranty">Warranty:</label>
                    <input type="text" name="warranty" id="warranty" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="graphics">Graphics:</label>
                    <input type="text" name="graphics" id="graphics"  class="form-control"><br>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Thumbnail:</label>
                    
                    <input type="file" name="thumbnail" class="form-control mb-3">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Gallery:(you can Select Multi images)</label>
            <div class="gallery-images">
                
            </div>
            <input type="file" name="gallery[]" multiple class="form-control mb-3" id="gallery">
        </div>
<div id="preview" class="mt-3">
    <!-- Thumbnails will be displayed here -->
</div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" >Active</option>
                        <option value="0">Inactive</option>
                    </select><br>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="status">About:</label>
                    <textarea id="editor" name="about" class="form-control"></textarea>
                    <br>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Graphics Details:</label>
                    <textarea name="graphics_d" class="form-control"></textarea>
                    <br>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Display Details:</label>
                    <textarea name="display_d" class="form-control"></textarea>
                    <br>
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Audio Details:</label>
                    <textarea name="audio_d" class="form-control"></textarea>
                    <br>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Dimensions Details:</label>
                    <textarea name="dimensions_d" class="form-control"></textarea>
                    <br>
                </div>
            </div>
        </div>
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Port Datails:</label>
                    <textarea name="ports_d" class="form-control"></textarea>
                    <br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Meta Title:</label>
                    <textarea name="meta_title" class="form-control"></textarea>
                    <br>
                </div>
            </div>
             
        </div>
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Mete Description:</label>
                    <textarea name="Meta_description" class="form-control"></textarea>
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
 <script>
    document.getElementById('gallery').addEventListener('change', function(event) {
        const preview = document.getElementById('preview');
        preview.innerHTML = ''; // Clear previous previews

        const files = event.target.files;

        if (files) {
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Selected Image';
                        img.style.width = '100px'; // Set a fixed width for thumbnails
                        img.style.marginRight = '10px'; // Add spacing between images
                        img.style.marginBottom = '10px'; // Add spacing between rows
                        img.style.border = '1px solid #ddd'; // Optional: Add border to images
                        img.style.borderRadius = '5px'; // Optional: Rounded corners
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file); // Read the file as a data URL
                }
            });
        }
    });
</script>
