<div class="container mt-5">
    <h2 class="mb-4">Update Terms and Conditions</h2>
    
    <!-- Display success and error flash messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
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
    <form method="post" action="<?= base_url('terms-admin/update/' . $record['id']) ?>">
        <?= csrf_field() ?>
        
        <!-- Intro -->
        <div class="mb-3">
            <label for="intro" class="form-label font-weight-bold">Introduction Subtitle</label>
            <textarea 
                class="form-control" 
                id="intro" 
                name="intro" 
                rows="2" 
                required><?= old('intro', $record['intro']) ?></textarea>
        </div>

        <!-- Rental Terms -->
        <div class="mb-3">
            <label for="rental_terms" class="form-label font-weight-bold">Rental Services Terms</label>
            <textarea 
                class="form-control" 
                id="rental_terms" 
                name="rental_terms" 
                rows="4" 
                required><?= old('rental_terms', $record['rental_terms']) ?></textarea>
        </div>

        <!-- Refurbished Terms -->
        <div class="mb-3">
            <label for="refurbished_terms" class="form-label font-weight-bold">Refurbished Products Terms</label>
            <textarea 
                class="form-control" 
                id="refurbished_terms" 
                name="refurbished_terms" 
                rows="4" 
                required><?= old('refurbished_terms', $record['refurbished_terms']) ?></textarea>
        </div>

        <!-- Payments Charges -->
        <div class="mb-3">
            <label for="payments_charges" class="form-label font-weight-bold">Payments and Charges</label>
            <textarea 
                class="form-control" 
                id="payments_charges" 
                name="payments_charges" 
                rows="4" 
                required><?= old('payments_charges', $record['payments_charges']) ?></textarea>
        </div>

        <!-- Delivery Collection -->
        <div class="mb-3">
            <label for="delivery_collection" class="form-label font-weight-bold">Delivery and Collection</label>
            <textarea 
                class="form-control" 
                id="delivery_collection" 
                name="delivery_collection" 
                rows="4" 
                required><?= old('delivery_collection', $record['delivery_collection']) ?></textarea>
        </div>

        <!-- Limitation Liability -->
        <div class="mb-3">
            <label for="limitation_liability" class="form-label font-weight-bold">Limitation of Liability</label>
            <textarea 
                class="form-control" 
                id="limitation_liability" 
                name="limitation_liability" 
                rows="3" 
                required><?= old('limitation_liability', $record['limitation_liability']) ?></textarea>
        </div>

        <!-- Privacy Terms -->
        <div class="mb-3">
            <label for="privacy_terms" class="form-label font-weight-bold">Privacy Terms</label>
            <textarea 
                class="form-control" 
                id="privacy_terms" 
                name="privacy_terms" 
                rows="2" 
                required><?= old('privacy_terms', $record['privacy_terms']) ?></textarea>
        </div>

        <!-- Contact details -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="contact_email" class="form-label font-weight-bold">Contact Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="contact_email" 
                    name="contact_email" 
                    value="<?= old('contact_email', $record['contact_email']) ?>" 
                    required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contact_phone1" class="form-label font-weight-bold">Contact Phone 1</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="contact_phone1" 
                    name="contact_phone1" 
                    value="<?= old('contact_phone1', $record['contact_phone1']) ?>" 
                    required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contact_phone2" class="form-label font-weight-bold">Contact Phone 2</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="contact_phone2" 
                    name="contact_phone2" 
                    value="<?= old('contact_phone2', $record['contact_phone2']) ?>" 
                    required>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
