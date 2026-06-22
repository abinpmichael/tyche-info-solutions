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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Privacy Policy</li>
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
                <?php
                $privacyTitleTag = esc($privacy['privacy_title_tag'] ?? 'h4');
                $privacyTitleText = esc($privacy['privacy_title'] ?? 'Privacy Policy');
                $privacySubtitleTag = esc($privacy['privacy_subtitle_tag'] ?? 'h5');
                $privacySubtitleText = esc($privacy['privacy_subtitle'] ?? $privacy['intro_title'] ?? 'Committed to protecting your privacy and ensuring that your personal information is handled securely.');
                ?>
                <<?= $privacyTitleTag ?>><?= $privacyTitleText ?></<?= $privacyTitleTag ?>>
                <div class="border-bottom">
                    <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                        <<?= $privacySubtitleTag ?>><?= $privacySubtitleText ?></<?= $privacySubtitleTag ?>>
                    </div>
                </div> 
            </div>
        </div>

        <div class="mb-5">
            <div class="text-gray-90"><?= $privacy['intro_text'] ?? 'This Privacy Policy outlines how we collect, use, and protect your data when you use our website and services. By using our website, you agree to the terms outlined in this policy.' ?></div>                   
            
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['collect_title'] ?? 'Information We Collect') ?></h3>
            <div class="text-gray-90"><?= $privacy['info_collect'] ?? "We collect the following types of information:\n\n1. Personal Information: Name, email address, phone number, billing and shipping address, and payment details.\n2. Identity Verification Information: Government-issued IDs or other identification documents (required for rentals).\n3. Technical Data: IP address, browser type, and operating system\n4. Transaction Data: Details of your orders, rentals, and communications with us." ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['use_title'] ?? 'How We Use Your Information') ?></h3>
            <div class="text-gray-90"><?= $privacy['info_use'] ?? "We use the information we collect for the following purposes:\n\n1. Process and fulfill your rental or purchase orders.\n2. To verify your identity for rental agreements and prevent fraud.\n3. To communicate with you about your transactions, inquiries, or promotional offers.\n4. Improve our website, services, and user experience.\n5. To comply with legal obligations or resolve disputes." ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['share_title'] ?? 'Sharing of Information') ?></h3>
            <div class="text-gray-90"><?= $privacy['info_share'] ?? "We do not sell your personal information to third parties. However, we may share your data in the following circumstances:\n\n1. Service Providers: With trusted third-party providers for payment processing, delivery, or customer support.\n2. Legal Compliance: When required by law or to protect our legal rights.\n3. Business Transfers: In the event of a merger, acquisition, or sale of our business assets." ?></div> 
        </div>                       

        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['security_title'] ?? 'Data Security') ?></h3>
            <div class="text-gray-90"><?= $privacy['data_security'] ?? 'We implement appropriate technical and organizational measures to protect your data from unauthorized access, loss, or misuse. However, no system is completely secure, and we cannot guarantee absolute security.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['cookies_title'] ?? 'Cookies and Tracking') ?></h3>
            <div class="text-gray-90"><?= $privacy['cookies_tracking'] ?? 'Our website uses cookies and similar technologies to enhance your browsing experience. Cookies help us understand user behavior, remember preferences, and improve our services. You can manage cookie preferences through your browser settings.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['rights_title'] ?? 'Your Rights') ?></h3>
            <div class="text-gray-90"><?= $privacy['user_rights'] ?? "You have the following rights regarding your data:\n\n1. Access: Request access to the personal data we hold about you.\n2. Correction: Request correction of inaccurate or incomplete data.\n3. Deletion: Request deletion of your data, subject to legal or contractual obligations." ?></div>
        </div>
           
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['retention_title'] ?? 'Retention of Data') ?></h3>
            <div class="text-gray-90"><?= $privacy['retention_data'] ?? 'We retain your data for as long as necessary to fulfill the purposes outlined in this policy or as required by law.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['third_party_title'] ?? 'Third-Party Links') ?></h3>
            <div class="text-gray-90"><?= $privacy['third_party_links'] ?? 'Our website may contain links to third-party websites. We are not responsible for their privacy practices or content.' ?></div>
        </div>
        
        <div class="mb-5">
            <h3 class="mb-2 pb-2 font-size-25"><?= esc($privacy['changes_title'] ?? 'Changes to This Policy') ?></h3>
            <div class="text-gray-90"><?= $privacy['policy_changes'] ?? 'We may update this Privacy Policy from time to time. Any changes will be posted on this page, and the updated policy will take effect immediately.' ?></div>
        </div>
    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Include footer menu -->
<?= view('templates/footermenu'); ?>
