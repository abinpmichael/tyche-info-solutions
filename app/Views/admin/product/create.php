 <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Products </h5>
              <div class="card">
                <div class="card-body">


<div class="table-responsive">

<form action="store" method="post">
    <label>Name:</label>
      <?= csrf_field(); ?>
    <input type="text" name="p_name" class="form-control" required><br>
    <label>Description:</label>
    <textarea name="p_desc" class="form-control" ></textarea><br>
    <label>Status:</label>
    <select name="p_status" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select><br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
