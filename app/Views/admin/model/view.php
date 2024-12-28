<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">View Model</h5>
                    <div class="card">
                        <div class="card-body">
                            <!-- Model Information -->
                            <h1 class="display-4"><?= $model['name'] ?> <small class="text-muted"><?= $model['s_desc'] ?></small></h1>
                            <p><strong>Processor:</strong> <?= $model['processor'] ?></p>
                            <p><strong>Screen Size:</strong> <?= $model['screen_size'] ?></p>
                            <p><strong>Storage:</strong> <?= $model['storage'] ?></p>
                            <p><strong>Warranty:</strong> <?= $model['warranty'] ?></p>
                            <p><strong>Graphics:</strong> <?= $model['graphics'] ?></p>

                            <!-- Thumbnail Display -->
                            <?php if ($model['thumbnail']): ?>
                                <div class="my-3">
                                    <img src="<?= base_url("writable/uploads/thumbnails/" . $model['thumbnail']); ?>" alt="Thumbnail" class="img-fluid" width="200">
                                </div>
                            <?php endif; ?>

                            <!-- Gallery Section -->
                            <h3 class="my-4">Gallery</h3>
                            <div class="row">
                                <?php foreach ($gallery as $image): ?>
                                    <div class="col-md-3 mb-3">
                                        <img src="<?= base_url("writable/uploads/gallery/" . $image['image']); ?>" alt="Gallery Image" class="img-fluid">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Additional Information -->
                            <h4>Small Description</h4>
                            <p><?= $model['s_desc'] ?></p>

                            <h4>Graphics Details</h4>
                            <p><?= $model['graphics_d'] ?></p>

                            <h4>Display Details</h4>
                            <p><?= $model['display_d'] ?></p>

                            <h4>Audio Details</h4>
                            <p><?= $model['audio_d'] ?></p>

                            <h4>Dimensions Details</h4>
                            <p><?= $model['dimensions_d'] ?></p>

                            <h4>Ports Details</h4>
                            <p><?= $model['ports_d'] ?></p>

                            <h4>About</h4>
                            <p><?= $model['about'] ?></p>

                            <!-- Status -->
                            <h4>Status</h4>
                            <p><?= $model['status'] ? 'Active' : 'Inactive' ?></p>

                            <a href="<?= base_url('model') ?>" class="btn btn-primary mt-3">Back to Models</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
