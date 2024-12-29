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

<div class="table-responsive">
    

 


<a href="<?= base_url('slider/create')?>" class="btn btn-info m-1" >Create New Record</a>
<table class="table table-vcenter table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Big Heading</th>
            <th>Small Heading</th>
            <th>Button Name</th>
            <th>Button Link</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $record): ?>
        <tr>
            <td><?= $record['id'] ?></td>
            <td><?= $record['b_heading'] ?></td>
            <td><?= $record['s_heading'] ?></td>
            <td><?= $record['button_name'] ?></td>
            <td><?= $record['b_link'] ?></td>
            <td><img src="<?= base_url('writable/uploads/slider/'. $record['img']) ?>" alt="Image" class="img-thumbnail" width="50"></td>
            <td><?= $record['created_at'] ?></td>
            <td>
                <a href="/your_controller_name/edit/<?= $record['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <form action="/your_controller_name/delete/<?= $record['id'] ?>" method="post" class="d-inline">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
