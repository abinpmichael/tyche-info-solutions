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
<h1>Models</h1>
<p align="right"><a href="model/create"><button type="button" class="btn btn-info m-1">Add New Model</button></a></p>
<div class="table-responsive">
    

  <table class="table table-vcenter">
    <thead>
         
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>image</th>
        <th>Status</th>
        
        <th class="w-1">Actions</th>
      </tr>
    </thead>
    <tbody>

     <?php foreach ($models as $model): ?>
      <tr>
        <td><?= $model['id'] ?></td>
        <td >
         <?= $model['name'] ?>
        </td>
        <td ><img src='<?= $model['thumbnail'] ?>'></td>
        <td >
          <?= $model['status'] ? 'Active' : 'Inactive' ?>
        </td>
        <td><a href="model/view/<?= $model['id'] ?>"><i class="ti ti-eye" style="font-size: 24px;"></i></a> |
          <a href="model/edit/<?= $model['id'] ?>"><i style="font-size: 24px;" class="ti ti-edit"></i></a>|
           <aa href="model/delete/<?= $model['id'] ?>" onclick="return confirm('Are you sure?')"><i style="font-size: 24px;" class="ti ti-trash-x"></i></a>
        
        </td>

      </tr>
      <?php endforeach; ?>
  </tbody>
  </table>
</div>



