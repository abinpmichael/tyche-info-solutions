<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\SliderModel;


class SliderController extends BaseController
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
        $model = new SliderModel();
        $data['records'] = $model->findAll();
        return view('Admin/header') .view('Admin/slider/index', $data). view('Admin/footer');
    }

    public function create()
    {
        return view('Admin/header').view('Admin/slider/create').view('Admin/footer');
    }

    public function store()
    {
         $Model = new SliderModel();

    $validation = \Config\Services::validation();

    // Set validation rules
    $validation->setRules([
        'b_heading' => 'required',
        's_heading' => 'required',
        'button_name' => 'required',
        /*'b_link' => 'required|valid_url',*/
        /*'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,2048]'*/
    ]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('msg', $this->validator->getErrors());
    }

    $data = [
        'b_heading'   => $this->request->getPost('b_heading'),
        's_heading'   => $this->request->getPost('s_heading'),
        'button_name' => $this->request->getPost('button_name'),
        'b_link'      => $this->request->getPost('b_link')
    ];

    // Handle the thumbnail upload
    $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $imgName = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads/slider', $imgName);

        // Add the thumbnail name to the data array
        $data['img'] = $imgName;
    }

    $Model->insert($data);

    return redirect()->to(base_url('slider'))->with('msg', 'Record added successfully.');

    }

    public function edit($id)
    {
        $model = new SliderModel();
        $data['record'] = $model->find($id);
        return view('Admin/header').view('Admin/slider/edit', $data).view('Admin/footer');
    }

    public function update($id)
    {
        $model = new SliderModel();

// Fetch existing data
$slider = $model->find($id);

if (!$slider) {
    return redirect()->back()->with('msg', 'Slider not found.');
}

// Prepare updated data
$data = [
    'b_heading'   => $this->request->getPost('b_heading'),
    's_heading'   => $this->request->getPost('s_heading'),
    'button_name' => $this->request->getPost('button_name'),
    'b_link'      => $this->request->getPost('b_link'),
];

// Handle image upload
     $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
    $imgName = $img->getRandomName();
    $img->move(WRITEPATH . 'uploads/slider', $imgName);

    // Add the new image name to the data array
    $data['img'] = $imgName;

    // Optionally delete the old image
    if (!empty($slider['img']) && file_exists(WRITEPATH . 'uploads/slider/' . $slider['img'])) {
        unlink(WRITEPATH . 'uploads/slider/' . $slider['img']);
    }
    }

    // Update the slider
    $model->update($id, $data);

    return redirect()->to(base_url('slider'))->with('msg', 'Record updated successfully.');

    }

    public function delete($id)
    {
        $model = new SliderModel();
        $model->delete($id);
        return redirect()->to(base_url('slider'))->with('msg', 'Record Delete Successfully.');
    }
}
