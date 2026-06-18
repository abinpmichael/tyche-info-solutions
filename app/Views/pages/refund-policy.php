<?= view('templates/headermenu') ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <!-- Breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Refund and Cancellation Policy</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Page Title -->
        <div class="text-center">
            <div class="card-body subhead-60 pb-6 px-0 continer-head">
                <h4>Refund and Cancellation Policy</h4>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <h5>Outlines the terms and conditions for cancellations, refunds, and exchanges</h5>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-gray-90">At Tyche Info Solution, we strive to ensure customer satisfaction with our rental and refurbished products. This Refund and Cancellation Policy outlines the terms and conditions for cancellations, refunds, and exchanges. Please read this policy carefully before making a transaction.</p>

        <!-- Cancellation Policy -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25">Cancellation Policy</h2>

            <h3 class="mb-1 pb-2 font-size-25">For Rentals:</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['cancellation_rentals'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">For Refurbished Products:</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['cancellation_refurbished'] ?? '')) ?></p>
        </div>

        <!-- Refund Policy -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25">Refund Policy</h2>

            <h3 class="mb-1 pb-2 font-size-25">For Rentals:</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['refund_rentals'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">For Refurbished Products:</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['refund_refurbished'] ?? '')) ?></p>
        </div>

        <!-- Return & Exchange -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25">Return and Exchange Policy</h2>
            <p class="text-gray-90"><?= nl2br(esc($policy['return_exchange'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">Exceptions to Refunds</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['exceptions'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">Process for Refunds and Returns</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['process'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">Late or Missing Refunds</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['late_missing'] ?? '')) ?></p>

            <h3 class="mb-2 pb-2 font-size-25">Changes to This Policy</h3>
            <p class="text-gray-90"><?= nl2br(esc($policy['changes_policy'] ?? '')) ?></p>
        </div>

    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->

<?= view('templates/footermenu') ?>
