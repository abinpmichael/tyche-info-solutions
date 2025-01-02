
    <div class="container mt-5">
        <h2 class="mb-4">Update About Information</h2>
        <!-- Display validation errors -->
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Update Form -->
        <form method="post" action="<?= base_url('about/update/' . $record['id']) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- About -->
            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea 
                    class="form-control" 
                    id="about" 
                    name="about" 
                    rows="4" 
                    required><?= old('about', $record['about']) ?></textarea>
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control" id="img" name="img">
                <p class="form-text">Current Image: <?= $record['img'] ?></p>
                <?php if ($record['img']) : ?>
                    <img src="/uploads/<?= $record['img'] ?>" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                <?php endif; ?>
            </div>

            <!-- Our Mission -->
            <div class="mb-3">
                <label for="our_mission" class="form-label">Our Mission</label>
                <textarea 
                    class="form-control" 
                    id="our_mission" 
                    name="our_mission" 
                    rows="4" 
                    required><?= old('our_mission', $record['our_mission']) ?></textarea>
            </div>

            <!-- Our Vision -->
            <div class="mb-3">
                <label for="our_vision" class="form-label">Our Vision</label>
                <textarea 
                    class="form-control" 
                    id="our_vision" 
                    name="our_vision" 
                    rows="4" 
                    required><?= old('our_vision', $record['our_vision']) ?></textarea>
            </div>

            <!-- Our Values -->
            <div class="mb-3">
                <label for="our_values" class="form-label">Our Values</label>
                <textarea 
                    class="form-control" 
                    id="our_values" 
                    name="our_values" 
                    rows="4" 
                    required><?= old('our_values', $record['our_values']) ?></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('about') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

