 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
              <div class="card">
                <div class="card-body">


<div class="table-responsive">

<form action="<?= base_url('product/update/' . $product['p_id']) ?>" method="post">
     <?= csrf_field(); ?>
    <label>Name:</label>
    <input type="text" name="p_name" value="<?= $product['p_name'] ?>"  class="form-control" required><br>
    <label>Description:</label>
    <textarea name="p_desc"  class="form-control"><?= $product['p_desc'] ?></textarea><br>
    <label>Status:</label>
    <select name="p_status"  class="form-control">
        <option value="1" <?= $product['p_status'] ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= !$product['p_status'] ? 'selected' : '' ?>>Inactive</option>
    </select><br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
