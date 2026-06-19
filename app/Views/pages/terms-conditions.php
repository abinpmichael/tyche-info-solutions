<!-- Include header menu -->
<?= view('templates/headermenu'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Terms and conditions</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="text-center">
            <div class="card-body subhead-60 pb-6 px-0 continer-head">
                <h4>Terms and conditions</h4>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <h5><?= $terms['intro'] ?? 'By using our website and services, you agree to the following terms and conditions.' ?></h5>
                    </div>
                </div>                    
            </div>
        </div>

        <div class="mb-5">
            <div class="text-gray-90"><?= $terms['rental_terms'] ?? 'Our rental services are available to individuals aged 18 or older and require valid identification for verification. The rental period begins upon delivery and ends on the agreed return date. Customers are responsible for maintaining the device in good condition and will be liable for any damages, loss, or theft during the rental period. A refundable security deposit may be required, which will be returned once the device is inspected and found to be in acceptable condition. Late returns will incur additional charges as per the rental agreement.' ?></div>                     
          
            <h3 class="mb-2 pb-2 font-size-25">Refurbished Products Terms</h3>
            <div class="text-gray-90"><?= $terms['refurbished_terms'] ?? 'For refurbished products, all devices are pre-owned and restored to full working condition, though minor cosmetic imperfections may be present. A limited warranty is provided for refurbished devices as specified at the time of purchase. Returns for refurbished devices will only be accepted if they meet our return policy criteria. All payments for rentals and purchases must be made upfront unless otherwise agreed. Prices exclude applicable taxes unless specified.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25">Payments and Charges</h3>
            <div class="text-gray-90"><?= $terms['payments_charges'] ?? "All payments must be made upfront for rentals and purchases unless otherwise agreed.\nIf the device is not returned on time, late fees will be applied as per the rental agreement.\nPrices listed are exclusive of applicable taxes unless mentioned otherwise." ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25">Delivery and Collection</h3>
            <div class="text-gray-90"><?= $terms['delivery_collection'] ?? 'Delivery services will be provided within the agreed timeframe, but delays caused by unforeseen circumstances will be communicated in advance. Customers must return rental devices to the specified location or arrange for their collection. We are not liable for any direct or indirect damages arising from the use of our rented or refurbished products. Your data will be handled per our Privacy Policy. We reserve the right to amend these terms and conditions without prior notice, and continued use of our services constitutes acceptance of the updated terms.' ?></div>
        </div>
           
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25">Limitation of Liability</h3>
            <div class="text-gray-90"><?= $terms['limitation_liability'] ?? 'We are not liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use the rented or purchased devices.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25">Privacy</h3>
            <div class="text-gray-90"><?= $terms['privacy_terms'] ?? 'Please read our Privacy Policy.' ?></div>
            <?php
            $email = esc($terms['contact_email'] ?? 'sales@tycheinfosolutions.com');
            $phone1 = esc($terms['contact_phone1'] ?? '+91 9946622288');
            $phone2 = esc($terms['contact_phone2'] ?? '+91 9946633380');
            ?>
            <p style="text-align: left;">For any questions or clarifications, please contact us at <a class="font-size-15 text-blue" href="mailto:<?= $email ?>"><?= $email ?></a> or <a href="tel:<?= str_replace(' ', '', $phone1) ?>" class="font-size-15 text-blue"><?= $phone1 ?></a> | <a href="tel:<?= str_replace(' ', '', $phone2) ?>" class="font-size-15 text-blue"><?= $phone2 ?></a>.</p>
        </div>
    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
