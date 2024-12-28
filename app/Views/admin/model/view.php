<h1><?= $model['name'] ?> (<?= $model['type'] ?>)</h1>
<p><strong>Processor:</strong> <?= $model['processor'] ?></p>
<p><strong>Screen Size:</strong> <?= $model['screen_size'] ?></p>
<p><strong>Storage:</strong> <?= $model['storage'] ?></p>
<p><strong>Warranty:</strong> <?= $model['warranty'] ?></p>
<p><strong>Graphics:</strong> <?= $model['graphics'] ?></p>

<?php if ($model['thumbnail']): ?>
    <img src="/uploads/thumbnails/<?= $model['thumbnail'] ?>" alt="Thumbnail" width="200">
<?php endif; ?>

<h3>Gallery</h3>
<?php foreach ($gallery as $image): ?>
    <img src="/uploads/gallery/<?= $image['image'] ?>" alt="Gallery Image" width="200">
<?php endforeach; ?>

<a href="<?php echo base_url('model');?>">Back to Models</a>
