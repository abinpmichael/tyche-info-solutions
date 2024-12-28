<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;


class ModelController extends Controller
{
    public function index()
    {
       
        $modelModel = new \App\Models\ModelModel();
        $models = $modelModel->findAll();

        return view('admin/header').view('admin/model/index', ['models' => $models]).view('admin/footer');
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

        return view('admin/model/view', ['model' => $model, 'gallery' => $gallery]);
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

        return redirect()->to('admin/model')->with('message', 'Model deleted successfully!');
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
