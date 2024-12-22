 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Brand</h5>
              <div class="card">
                <div class="card-body">


<div class="table-responsive">

<form action="<?= base_url('brands/update/' . $brand['b_id']) ?>" method="post">
     <?= csrf_field(); ?>
    <label>Name:</label>
    <input type="text" name="b_name" value="<?= $brand['b_name'] ?>"  class="form-control" required><br>
    <label>Description:</label>
    <textarea name="b_desc"  class="form-control"><?= $brand['b_desc'] ?></textarea><br>
    <label>Status:</label>
    <select name="b_status"  class="form-control">
        <option value="1" <?= $brand['b_status'] ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= !$brand['b_status'] ? 'selected' : '' ?>>Inactive</option>
    </select><br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
