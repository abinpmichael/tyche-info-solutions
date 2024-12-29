<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\SliderModel;


class SliderController extends BaseController
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $model = new SliderModel();
        $data['records'] = $model->findAll();
        return view('admin/header') .view('admin/slider/index', $data). view('admin/footer');
    }

    public function create()
    {
        return view('admin/header').view('admin/slider/create').view('admin/footer');
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
        'b_link' => 'required|valid_url',
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

    return redirect()->to('/slider')->with('msg', 'Record added successfully.');

    }

    public function edit($id)
    {
        $model = new YourModelName();
        $data['record'] = $model->find($id);
        return view('your_view_edit', $data);
    }

    public function update($id)
    {
        $model = new YourModelName();
        $data = [
            'b_heading'   => $this->request->getPost('b_heading'),
            's_heading'   => $this->request->getPost('s_heading'),
            'button_name' => $this->request->getPost('button_name'),
            'b_link'      => $this->request->getPost('b_link'),
            'img'         => $this->request->getPost('img')
        ];
        $model->update($id, $data);
        return redirect()->to('/your_controller_name');
    }

    public function delete($id)
    {
        $model = new YourModelName();
        $model->delete($id);
        return redirect()->to('/your_controller_name');
    }
}
