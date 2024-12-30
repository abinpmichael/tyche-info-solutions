<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\BrandModel;



class ModelController extends Controller
{
    public function index()
    {
       
        $modelModel = new \App\Models\ModelModel();
        $brandModel = new \App\Models\BrandModel();
        $models = $modelModel
    ->select('models.*, brands.b_name')
    ->join('brands', 'brands.b_id = models.b_id', 'left')
    ->findAll();

// Pass the data to the view
return view('admin/header')
    . view('admin/model/index', ['models' => $models])
    . view('admin/footer');

        
    }

    public function view($id)
    {
        $modelModel = new \App\Models\ModelModel();
        $galleryModel = new \App\Models\ModelGalleryModel();

        $model = $modelModel->find($id);
        $gallery = $galleryModel->where('model_id', $id)->findAll();

        if (!$model) {
            return redirect()->to('/model')->with('error', 'Model not found.');
        }

        return view('admin/header').view('admin/model/view', ['model' => $model, 'gallery' => $gallery]).view('admin/footer');
    }
    public function create()
{
$brandModel = new \App\Models\BrandModel();
$productModel = new \App\Models\ProductModel();

$product = $productModel->findAll();
$brand = $brandModel->findAll();

// Merge the data into a single array
$data = [
    'product' => $product,
    'brand'   => $brand,
];

// Pass the merged data array to the view
return view('admin/header')
    . view('admin/model/create', $data)
    . view('admin/footer');
}

public function store(){
 
    $validation = \Config\Services::validation();

    // Validation rules for inputs
    $rules = [
        'name'        => 'required|string|max_length[255]',
        'type'        => 'required|string|max_length[100]',
        'processor'   => 'string|max_length[255]',
        'screen_size' => 'string|max_length[50]',
        'storage'     => 'string|max_length[100]',
        'memory'      => 'string|max_length[100]',
        'warranty'    => 'string|max_length[100]',
        'graphics'    => 'string|max_length[255]',
        'status'      => 'string|max_length[50]',
        'graphics_d'  => 'string',
        'display_d'   => 'string',
        'audio_d'     => 'string',
        'dimensions_d'=> 'string',
        'ports_d'     => 'string',
        'about'       => 'string',
        'b_id'       => 'b_id',
        /*'meta_title'  => 'string',
        'meta_desc'  => 'string',*/
        /* Uncomment if validating images
        'thumbnail'   => 'is_image[thumbnail]|max_size[thumbnail,2048]',
        'gallery'     => 'is_image[gallery.*]|max_size[gallery.*,2048]', */
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Load models
    $modelModel = new \App\Models\ModelModel();
    $galleryModel = new \App\Models\ModelGalleryModel();

    // Get input data
    $files = $this->request->getFiles();
    $data = $this->request->getPost();

    // Insert model details
    $modelId = $modelModel->insert([
        'name'        => $data['name'],
        's_desc'      => $data['s_desc'],
        'type'        => $data['type'],
        'processor'   => $data['processor'],
        'screen_size' => $data['screen_size'],
        'storage'     => $data['storage'],
        'memory'      => $data['memory'],
        'warranty'    => $data['warranty'],
        'graphics'    => $data['graphics'],
        'status'      => $data['status'],
        'graphics_d'  => $data['graphics_d'],
        'display_d'   => $data['display_d'],
        'audio_d'     => $data['audio_d'],
        'dimensions_d'=> $data['dimensions_d'],
        'ports_d'     => $data['ports_d'],
        'about'       => $data['about'],
        'meta_title'  => $data['meta_title'],
        'meta_desc'   => $data['meta_desc'],
         'b_id'   => $data['b_id'],
    ]);

    if (!$modelId) {
        return redirect()->back()->withInput()->with('errors', 'Failed to create the model.');
    }

    // Handle thumbnail upload
    if ($thumbnail = $files['thumbnail']) {
        if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move(WRITEPATH . 'uploads/thumbnails', $thumbnailName);

            // Update model with thumbnail path
            $modelModel->update($modelId, ['thumbnail' => $thumbnailName]);
        }
    }

    // Handle gallery uploads
    if (isset($files['gallery']) && is_array($files['gallery'])) {
        foreach ($files['gallery'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $galleryName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/gallery', $galleryName);

                $galleryModel->insert([
                    'model_id' => $modelId,
                    'image'    => $galleryName,
                ]);
            }
        }
    }

    return redirect()->to('model/view/' . $modelId)->with('message', 'Model created successfully!');
}


    public function edit($id)
    {
        $modelModel = new \App\Models\ModelModel();
        $galleryModel = new \App\Models\ModelGalleryModel();
        $productModel = new \App\Models\ProductModel();


        $model = $modelModel->find($id);
        $gallery = $galleryModel->where('model_id', $id)->findAll();
        $product = $productModel->findAll();

        if (!$model) {
            return redirect()->to('/models')->with('error', 'Model not found.');
        }

        return view('admin/header').view('admin/model/edit', ['model' => $model, 'gallery' => $gallery,'product' => $product]).view('admin/footer');
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'        => 'required|string|max_length[255]',
            'type'        => 'required|string|max_length[100]',
            'processor'   => 'string|max_length[255]',
            'screen_size' => 'string|max_length[50]',
            'storage'     => 'string|max_length[100]',
            'warranty'    => 'string|max_length[100]',
            'graphics'    => 'string|max_length[255]',
            /*'thumbnail'   => 'is_image[thumbnail]|max_size[thumbnail,2048]',
            'gallery'     => 'is_image[gallery.*]|max_size[gallery.*,2048]',*/
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $modelModel = new \App\Models\ModelModel();
        $galleryModel = new \App\Models\ModelGalleryModel();

        $files = $this->request->getFiles();
        $data = $this->request->getPost();

        // Update model details
        $modelModel->update($id, [
            'name'        => $data['name'],
            's_desc'      => $data['s_desc'],
            'type'        => $data['type'],
            'processor'   => $data['processor'],
            'screen_size' => $data['screen_size'],
            'storage'     => $data['storage'],
            'memory'      => $data['memory'],
            'warranty'    => $data['warranty'],
            'graphics'    => $data['graphics'],
            'status'    => $data['status'],
            'graphics_d' => $data['graphics_d'],
            'display_d'     => $data['display_d'],
            'audio_d'      => $data['audio_d'],
            'dimensions_d'    => $data['dimensions_d'],
            'ports_d'    => $data['ports_d'],
            'about'    => $data['about'],
            'meta_title'  => $data['meta_title'],
        'meta_desc'   => $data['meta_desc'],
        ]);

        // Replace Thumbnail if uploaded
        if ($thumbnail = $files['thumbnail']) {
            if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
                $thumbnailName = $thumbnail->getRandomName();
                $thumbnail->move(WRITEPATH . 'uploads/thumbnails', $thumbnailName);

                // Update thumbnail path
                $modelModel->update($id, ['thumbnail' => $thumbnailName]);
            }
        }

        // Add new gallery images if uploaded
        if (isset($files['gallery']) && is_array($files['gallery'])) {
            foreach ($files['gallery'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $galleryName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads/gallery', $galleryName);

                    $galleryModel->insert([
                        'model_id' => $id,
                        'image'    => $galleryName,
                    ]);
                }
            }
        }

        return redirect()->to('model/view/' . $id)->with('message', 'Model updated successfully!');
    }

    public function delete($id)
    {
        $modelModel = new \App\Models\ModelModel();
        $modelModel->delete($id);

        return redirect()->to('model')->with('success', 'Model deleted successfully!');
    }

    public function deleteGalleryImage($imageId)
    {
        $galleryModel = new \App\Models\ModelGalleryModel();

        $image = $galleryModel->find($imageId);
        if ($image) {
            unlink(WRITEPATH . 'uploads/gallery/' . $image['image']);
            $galleryModel->delete($imageId);
        }

        return redirect()->back()->with('message', 'Image deleted successfully!');
    }
}
