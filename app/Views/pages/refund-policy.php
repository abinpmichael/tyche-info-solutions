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
                <?php
                $refundTitleTag = esc($policy['refund_title_tag'] ?? 'h4');
                $refundTitleText = esc($policy['refund_title'] ?? 'Refund and Cancellation Policy');
                $refundSubtitleTag = esc($policy['refund_subtitle_tag'] ?? 'h5');
                $refundSubtitleText = esc($policy['refund_subtitle'] ?? 'Outlines the terms and conditions for cancellations, refunds, and exchanges');
                ?>
                <<?= $refundTitleTag ?>><?= $refundTitleText ?></<?= $refundTitleTag ?>>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <<?= $refundSubtitleTag ?>><?= $refundSubtitleText ?></<?= $refundSubtitleTag ?>>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-gray-90">At Tyche Info Solution, we strive to ensure customer satisfaction with our rental and refurbished products. This Refund and Cancellation Policy outlines the terms and conditions for cancellations, refunds, and exchanges. Please read this policy carefully before making a transaction.</p>

        <!-- Cancellation Policy -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25"><?= esc($policy['cancellation_title'] ?? 'Cancellation Policy') ?></h2>

            <h3 class="mb-1 pb-2 font-size-25"><?= esc($policy['cancellation_rentals_title'] ?? 'For Rentals:') ?></h3>
            <div class="text-gray-90"><?= $policy['cancellation_rentals'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['cancellation_refurbished_title'] ?? 'For Refurbished Products:') ?></h3>
            <div class="text-gray-90"><?= $policy['cancellation_refurbished'] ?? '' ?></div>
        </div>

        <!-- Refund Policy -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25"><?= esc($policy['refund_title_sec'] ?? 'Refund Policy') ?></h2>

            <h3 class="mb-1 pb-2 font-size-25"><?= esc($policy['refund_rentals_title'] ?? 'For Rentals:') ?></h3>
            <div class="text-gray-90"><?= $policy['refund_rentals'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['refund_refurbished_title'] ?? 'For Refurbished Products:') ?></h3>
            <div class="text-gray-90"><?= $policy['refund_refurbished'] ?? '' ?></div>
        </div>

        <!-- Return & Exchange -->
        <div class="mb-5">
            <h2 class="mb-1 pb-2 font-size-25"><?= esc($policy['return_exchange_title'] ?? 'Return and Exchange Policy') ?></h2>
            <div class="text-gray-90"><?= $policy['return_exchange'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['exceptions_title'] ?? 'Exceptions to Refunds') ?></h3>
            <div class="text-gray-90"><?= $policy['exceptions'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['process_title'] ?? 'Process for Refunds and Returns') ?></h3>
            <div class="text-gray-90"><?= $policy['process'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['late_missing_title'] ?? 'Late or Missing Refunds') ?></h3>
            <div class="text-gray-90"><?= $policy['late_missing'] ?? '' ?></div>

            <h3 class="mb-2 pb-2 font-size-25"><?= esc($policy['changes_policy_title'] ?? 'Changes to This Policy') ?></h3>
            <div class="text-gray-90"><?= $policy['changes_policy'] ?? '' ?></div>
        </div>

    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->

<?= view('templates/footermenu') ?>
