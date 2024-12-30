     <div class="container-fluid">
    <!-- Check if the success message exists in the session -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-success">
            <?php
            // Display the success message
            echo $_SESSION['msg'];
            // Unset the session message so it doesn't show again
            unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif; ?>
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create New Record </h5>
              <div class="card">
                <div class="card-body">




<div class="table-responsive">
<h2></h2>
     <form action="<?= base_url('slider/update/'.$record['id']) ?>" method="post" enctype="multipart/form-data">
         <label>Big Heading</label>
         <input type="text" name="b_heading" value="<?= $record['b_heading'] ?>" class="form-control" required> <br/>
            <?= csrf_field(); ?>
         <label>Small Heading</label>
         <input type="text" name="s_heading" value="<?= esc($record['s_heading']); ?>" class="form-control" required> <br/>
         <label>Button Name</label>
         <input type="text" name="button_name" value="<?= $record['button_name'] ?>" class="form-control"required> <br/>
         <label>Button Link</label>
         <input type="text" name="b_link" value="<?= $record['b_link'] ?>" class="form-control" required> <br/>
         <label>Image URL</label>
         <img src="<?= base_url('writable/uploads/slider/'. $record['img']) ?>" alt="Image" class="img-thumbnail" width="50">
         <input type="file" name="img"   class="form-control"required> <br/>
         <button type="submit" class="btn btn-primary">Update</button>
     </form>
