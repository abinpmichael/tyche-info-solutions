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
<form action="<?= base_url('slider/store'); ?>" method="post"enctype="multipart/form-data">
    <label>Big Heading</label>
     <?= csrf_field(); ?>
    <input type="text" name="b_heading" class="form-control" required><br/>
    <label>Small Heading</label>
    <input type="text" name="s_heading" class="form-control" required><br/>
    <label>Button Name</label>
    <input type="text" name="button_name" class="form-control" required><br/>
    <label>Button Link</label>
    <input type="text" name="b_link" class="form-control" required><br/>
    <label>Image</label>
    <input type="file" name="img" class="form-control" required><br/>
    <button type="submit" class="btn btn-primary" >Create</button>
</form>
