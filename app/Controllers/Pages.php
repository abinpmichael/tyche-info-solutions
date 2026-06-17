<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\SliderModel;
use App\Models\BrandModel;
use App\Models\ModelModel;
use App\Models\ModelGalleryModel;
use App\Models\AboutModel;
use App\Models\EnquiryModel;
use App\Models\ServiceModel;
use App\Models\TermsConditionsModel;
use App\Models\PrivacyPolicyModel;

class Pages extends BaseController
{
    public function index()
    {
        $homeModel = new HomeModel();
        $sliderModel = new SliderModel();
        $brandModel = new BrandModel();
        $modelModel = new ModelModel();

        $data['home'] = $homeModel->find(1);
        $data['sliders'] = $sliderModel->findAll();
        $data['brands'] = $brandModel->where('b_status', 1)->findAll();
        
        // Fetch featured laptops (type=1) and desktops (type=2)
        $data['laptops'] = $modelModel->where('type', '1')->where('status', 1)->limit(6)->findAll();
        $data['desktops'] = $modelModel->where('type', '2')->where('status', 1)->limit(6)->findAll();

        echo view('templates/header', ['title' => 'Home']);
        echo view('pages/home', $data);
        echo view('templates/footer');
    }

    public function aboutUs()
    {
        $aboutModel = new AboutModel();
        $data['about'] = $aboutModel->find(1);

        echo view('templates/header', ['title' => 'About Us']);
        echo view('pages/about-us', $data);
        echo view('templates/footer');
    }

    public function laptops()
    {
        $modelModel = new ModelModel();
        $brandModel = new BrandModel();

        // Get filter inputs
        $selectedBrand = $this->request->getVar('brand');

        $query = $modelModel->where('type', '1')->where('status', 1);
        if ($selectedBrand) {
            $query->where('b_id', $selectedBrand);
        }
        $data['laptops'] = $query->findAll();
        
        // Fetch active brands for sidebar filtering
        $data['brands'] = $brandModel->where('b_status', 1)->findAll();
        $data['selectedBrand'] = $selectedBrand;

        echo view('templates/header', ['title' => 'Laptops']);
        echo view('pages/laptops', $data);
        echo view('templates/footer');
    }

    public function desktops()
    {
        $modelModel = new ModelModel();
        $brandModel = new BrandModel();

        // Get filter inputs
        $selectedBrand = $this->request->getVar('brand');

        $query = $modelModel->where('type', '2')->where('status', 1);
        if ($selectedBrand) {
            $query->where('b_id', $selectedBrand);
        }
        $data['desktops'] = $query->findAll();
        
        // Fetch active brands for sidebar filtering
        $data['brands'] = $brandModel->where('b_status', 1)->findAll();
        $data['selectedBrand'] = $selectedBrand;

        echo view('templates/header', ['title' => 'Desktops']);
        echo view('pages/desktops', $data);
        echo view('templates/footer');
    }

    public function services()
    {
        $serviceModel = new ServiceModel();
        $data['services'] = $serviceModel->where('status', 1)->findAll();

        echo view('templates/header', ['title' => 'Services']);
        echo view('pages/services', $data);
        echo view('templates/footer');
    }

    public function contactUs()
    {
        echo view('templates/header', ['title' => 'Contact Us']);
        echo view('pages/contact-us');
        echo view('templates/footer');
    }

    public function termsConditions()
    {
        $model = new TermsConditionsModel();
        $data['terms'] = $model->find(1);

        echo view('templates/header', ['title' => 'Terms and conditions']);
        echo view('pages/terms-conditions', $data);
        echo view('templates/footer');
    }

    public function privacyPolicy()
    {
        $model = new PrivacyPolicyModel();
        $data['privacy'] = $model->find(1);

        echo view('templates/header', ['title' => 'Privacy Policy']);
        echo view('pages/privacy-policy', $data);
        echo view('templates/footer');
    }

    public function viewModel($slug)
    {
        $modelModel = new ModelModel();
        $galleryModel = new ModelGalleryModel();
        $brandModel = new BrandModel();

        // Find the matching model by slugified name comparison
        $allModels = $modelModel->findAll();
        $foundModel = null;
        foreach ($allModels as $m) {
            $cleanedName = str_replace(' ', '-', strtolower(trim($m['name'])));
            if ($cleanedName === strtolower($slug)) {
                $foundModel = $m;
                break;
            }
        }

        if (!$foundModel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product not found: " . esc($slug));
        }

        // Fetch brand
        $foundModel['brand'] = $brandModel->find($foundModel['b_id']);
        
        // Fetch gallery images
        $gallery = $galleryModel->where('model_id', $foundModel['id'])->findAll();
        $foundModel['gallery'] = $gallery;

        echo view('templates/header', ['title' => $foundModel['name']]);
        echo view('pages/product-details', ['product' => $foundModel]);
        echo view('templates/footer');
    }

    // Cart Actions
    public function cart()
    {
        $cart = session()->get('cart') ?? [];
        echo view('templates/header', ['title' => 'Shopping Cart']);
        echo view('pages/cart', ['cart' => $cart]);
        echo view('templates/footer');
    }

    public function cartAdd($id)
    {
        $modelModel = new ModelModel();
        $product = $modelModel->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $type = $this->request->getVar('type') ?? 'rent'; // rent or buy
        $qty = intval($this->request->getVar('qty') ?? 1);
        if ($qty < 1) $qty = 1;

        $cart = session()->get('cart') ?? [];
        $key = $id . '_' . $type;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $qty;
        } else {
            $cart[$key] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'thumbnail' => $product['thumbnail'],
                'type' => $type,
                'qty' => $qty
            ];
        }

        session()->set('cart', $cart);
        return redirect()->to('/cart')->with('success', 'Product added to cart!');
    }

    public function cartRemove($id)
    {
        $type = $this->request->getVar('type') ?? 'rent';
        $key = $id . '_' . $type;

        $cart = session()->get('cart') ?? [];
        if (isset($cart[$key])) {
            unset($cart[$key]);
        }

        session()->set('cart', $cart);
        return redirect()->to('/cart')->with('success', 'Product removed from cart.');
    }

    public function cartUpdate()
    {
        $cart = session()->get('cart') ?? [];
        $qtys = $this->request->getPost('qty') ?? [];

        foreach ($qtys as $key => $qty) {
            $qty = intval($qty);
            if ($qty < 1) $qty = 1;
            if (isset($cart[$key])) {
                $cart[$key]['qty'] = $qty;
            }
        }

        session()->set('cart', $cart);
        return redirect()->to('/cart')->with('success', 'Cart updated successfully.');
    }

    public function enquireNow()
    {
        $cart = session()->get('cart') ?? [];
        echo view('templates/header', ['title' => 'Enquire Now']);
        echo view('pages/enquire-now', ['cart' => $cart]);
        echo view('templates/footer');
    }

    public function submitEnquiry()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required|valid_email',
            'phone' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', 'Please fill all required fields correctly.');
        }

        $source = $this->request->getPost('source') ?? 'enquiry';
        $cart = session()->get('cart') ?? [];
        if ($source === 'enquiry' && empty($cart)) {
            return redirect()->to('/')->with('error', 'Your cart is empty. Cannot submit enquiry.');
        }

        $enquiryModel = new EnquiryModel();
        $data = [
            'first_name' => $this->request->getPost('firstName'),
            'last_name' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('emailAddress'),
            'phone' => $this->request->getPost('phone'),
            'subject' => $this->request->getPost('Subject') ?? ($source === 'enquiry' ? 'Product Enquiry' : 'Contact Us Message'),
            'message' => $this->request->getPost('text'),
            'items' => json_encode(array_values($cart))
        ];

        $enquiryModel->save($data);

        // Prepare and send email notification
        try {
            $email = \Config\Services::email();
            
            $senderEmail = $data['email'];
            $senderName = $data['first_name'] . ' ' . $data['last_name'];
            
            // Fetch configuration setting from database
            $db = db_connect();
            $homeSettings = $db->table('home')->where('id', 1)->get()->getRowArray();
            $adminEmail = 'sales@tycheinfosolutions.com'; // Default fallback
            
            if ($homeSettings) {
                if ($source === 'contact' && !empty($homeSettings['contact_email'])) {
                    $adminEmail = $homeSettings['contact_email'];
                } elseif ($source === 'enquiry' && !empty($homeSettings['enquiry_email'])) {
                    $adminEmail = $homeSettings['enquiry_email'];
                }
            }
            
            // 1. Send notification email to Admin
            $email->setTo($adminEmail);
            $email->setFrom('no-reply@tycheinfosolutions.com', $senderName);
            $email->setReplyTo($senderEmail, $senderName);
            
            $itemsText = "";
            if ($source === 'enquiry') {
                foreach ($cart as $item) {
                    $itemsText .= " - " . $item['name'] . " (Qty: " . $item['qty'] . ", Type: " . $item['type'] . ")\n";
                }
            }
            
            if ($source === 'contact') {
                $email->setSubject('New Contact Us Message: ' . $data['subject']);
                $email->setMessage("You have received a new message from the Contact Us form:\n\n" .
                    "Name: " . $senderName . "\n" .
                    "Email: " . $senderEmail . "\n" .
                    "Phone: " . $data['phone'] . "\n" .
                    "Subject: " . $data['subject'] . "\n\n" .
                    "Message:\n" . $data['message']);
            } else {
                $email->setSubject('New Product Enquiry Request');
                $email->setMessage("You have received a new product enquiry checkout:\n\n" .
                    "Name: " . $senderName . "\n" .
                    "Email: " . $senderEmail . "\n" .
                    "Phone: " . $data['phone'] . "\n\n" .
                    "Requested Items:\n" . $itemsText . "\n" .
                    "Special Requirements:\n" . $data['message']);
            }
            $email->send();

            // 2. Send confirmation/thank you email to Customer
            $email->clear();
            $email->setTo($senderEmail);
            $email->setFrom('no-reply@tycheinfosolutions.com', 'Tyche Info Solutions');
            $email->setReplyTo($adminEmail, 'Tyche Info Solutions');
            
            if ($source === 'contact') {
                $email->setSubject('Thank you for contacting Tyche Info Solutions');
                $email->setMessage("Dear " . $senderName . ",\n\n" .
                    "Thank you for contacting Tyche Info Solutions. We have received your message and will get back to you shortly.\n\n" .
                    "Your message details:\n" .
                    "Subject: " . $data['subject'] . "\n" .
                    "Message:\n" . $data['message'] . "\n\n" .
                    "Best regards,\n" .
                    "Tyche Info Solutions Team");
            } else {
                $email->setSubject('Tyche Info Solutions - Enquiry Confirmation');
                $email->setMessage("Dear " . $senderName . ",\n\n" .
                    "Thank you for your product enquiry. We have received your request and will contact you with a quotation shortly.\n\n" .
                    "Your Enquiry Details:\n" .
                    "Requested Items:\n" . $itemsText . "\n" .
                    "Special Requirements:\n" . $data['message'] . "\n\n" .
                    "Best regards,\n" .
                    "Tyche Info Solutions Team");
            }
            $email->send();
            
        } catch (\Exception $e) {
            log_message('error', 'Mail delivery failed: ' . $e->getMessage());
        }

        // Clear the cart if it was an enquiry checkout
        if ($source === 'enquiry') {
            session()->remove('cart');
        }

        $redirectUrl = ($source === 'contact') ? '/contact-us' : '/';
        return redirect()->to($redirectUrl)->with('success', 'Thank you! Your submission was successful and a confirmation email has been sent.');
    }
}
