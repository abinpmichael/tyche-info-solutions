<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Add New Page SEO Settings</h1>
        <a href="<?= base_url('seo-admin') ?>" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to List
        </a>
    </div>

    <!-- Display Validation Errors -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-lg bg-white p-4">
        <div class="card-body p-2">
            <form method="post" action="<?= base_url('seo-admin/store') ?>">
                <?= csrf_field() ?>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="page_name" class="form-label font-weight-semibold">Page Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="page_name" name="page_name" value="<?= old('page_name') ?>" placeholder="e.g. Dell Latitude 3540 Laptop" required>
                        <div class="form-text text-muted fs-2">A human-readable label identifying this page.</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="page_route" class="form-label font-weight-semibold">Page Route <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text font-monospace">/</span>
                            <input type="text" class="form-control font-monospace" id="page_route" name="page_route" value="<?= old('page_route') ?>" placeholder="e.g. dell-latitude-3540" required>
                        </div>
                        <div class="form-text text-muted fs-2">The path/slug relative to the root URL (e.g., brand slug, product name slug, or subpage route).</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="meta_title" class="form-label font-weight-semibold">Meta Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title') ?>" placeholder="e.g. Rent Dell Latitude 3540 Laptop in Kochi | Tyche Info Solutions" required>
                    <div class="form-text text-muted fs-2">Recommended length: 50-60 characters.</div>
                </div>

                <div class="mb-4">
                    <label for="meta_keywords" class="form-label font-weight-semibold">Meta Keywords <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?= old('meta_keywords') ?>" placeholder="e.g. dell latitude 3540 rental, rent laptop kochi" required>
                    <div class="form-text text-muted fs-2">Comma-separated keywords (e.g. laptop rental, rent desktop kochi).</div>
                </div>

                <div class="mb-4">
                    <label for="meta_description" class="form-label font-weight-semibold">Meta Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="4" placeholder="e.g. Rent the Dell Latitude 3540 Laptop with Core i5 processor, 8GB RAM, and 256GB SSD storage in Kochi at the best rental rates." required><?= old('meta_description') ?></textarea>
                    <div class="form-text text-muted fs-2">Recommended length: 150-160 characters. A concise summary of the page's content.</div>
                </div>

                <div class="mb-4">
                    <label for="schema_code" class="form-label font-weight-semibold">Schema JSON-LD Code</label>
                    <textarea class="form-control font-monospace" id="schema_code" name="schema_code" rows="5" placeholder="&lt;script type=&quot;application/ld+json&quot;&gt;&#10;{&#10;  &quot;@context&quot;: &quot;https://schema.org&quot;,&#10;  ...&#10;}&#10;&lt;/script&gt;"><?= old('schema_code') ?></textarea>
                    <div class="form-text text-muted fs-2">Paste your JSON-LD structured data script markup here. Include script tag wrappers.</div>
                </div>

                <div class="mb-4">
                    <label for="header_code" class="form-label font-weight-semibold">Header Script / Code</label>
                    <textarea class="form-control font-monospace" id="header_code" name="header_code" rows="4" placeholder="&lt;!-- Custom header scripts like Google Analytics, Meta Pixel, etc. --&gt;"><?= old('header_code') ?></textarea>
                    <div class="form-text text-muted fs-2">Placed inside the &lt;head&gt; section. Include &lt;script&gt; tags if writing JavaScript.</div>
                </div>

                <div class="mb-4">
                    <label for="body_code" class="form-label font-weight-semibold">Body Script / Code</label>
                    <textarea class="form-control font-monospace" id="body_code" name="body_code" rows="4" placeholder="&lt;!-- Custom body scripts like GTM noscript, custom tracking, etc. --&gt;"><?= old('body_code') ?></textarea>
                    <div class="form-text text-muted fs-2">Placed immediately after the opening &lt;body&gt; tag.</div>
                </div>

                <div class="mb-4">
                    <label for="footer_code" class="form-label font-weight-semibold">Footer Script / Code</label>
                    <textarea class="form-control font-monospace" id="footer_code" name="footer_code" rows="4" placeholder="&lt;!-- Custom footer scripts like Live Chat, custom tracking js, etc. --&gt;"><?= old('footer_code') ?></textarea>
                    <div class="form-text text-muted fs-2">Placed just before the closing &lt;/body&gt; tag.</div>
                </div>

                <button type="submit" class="btn btn-success py-2 px-4">Save SEO Settings</button>
            </form>
        </div>
    </div>
</div>
