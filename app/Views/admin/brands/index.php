<div class="container-fluid">
    <!-- Check if the success message exists in the session -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php
            // Display the success message
            echo $_SESSION['success'];
            // Unset the session message so it doesn't show again
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
<h1>Brands</h1>
<p align="right"><a href="brands/create"><button type="button" class="btn btn-info m-1">Add New Brand</button></a></p>
<div class="table-responsive">
    

  <table class="table table-vcenter">
    <thead>
         
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        
        <th class="w-1">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($brands as $brand): ?>
      <tr>
        <td><?= $brand['b_id'] ?></td>
        <td >
         <?= $brand['b_name'] ?>
        </td>
        <td ><?= $brand['b_desc'] ?></td>
        <td >
          <?= $brand['b_status'] ? 'Active' : 'Inactive' ?>
        </td>
        <td>
          <a href="brands/edit/<?= $brand['b_id'] ?>"><i style="font-size: 24px;" class="ti ti-edit"></i></a>|
           <a href="brands/delete/<?= $brand['b_id'] ?>"><i style="font-size: 24px;" class="ti ti-trash-x"></i></a>
        
        </td>

      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>