<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\HTTP\Request;

class InsertEmployee extends BaseController
{
    // controller for insert view
    public function index()
    {
        $data = [
            'title' => 'Insert Data',
        ];

        return view('pages/insert', $data);
    }

    // controller for insert data to database
    public function insert_data()
    {
        $employeeModel = new EmployeeModel();
        $input = $this->request->getVar();

        // rules for validation 
        $rulesPhone = ['is_unique[employee.phone]'];
        $rulesEmail = ['is_unique[employee.email]'];
        $rulesImg = [
            'max_size[image,2048]',
            'mime_in[image,image/png,image/jpeg,image/jpg]',
            'ext_in[image,png,jpg,jpeg]',
            'is_image[image]',
        ];

        $errors = [
            'is_unique' => 'The {field} already registered'
        ];
        $errorImg = [
            'max_size' => 'File more than 2 MB',
            'mime_in' => 'Please select jpg/png file',
            'ext_in' => 'Please select jpg/png file',
            'is_image' => 'Please select jpg/png file',
        ];

        // validation for phone
        if (!$this->validate([
            'phone' => [
                'rules' => $rulesPhone,
                'errors' => $errors,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError());
            return redirect()->to('insertemployee')->withInput();
        }

        // validation for email 
        if (!$this->validate([
            'email' => [
                'rules' => $rulesEmail,
                'errors' => $errors,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError());
            return redirect()->to('insertemployee')->withInput();
        }

        // validation for image 
        if (!$this->validate([
            'image' => [
                'rules' => $rulesImg,
                'errors' => $errorImg,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError());
            return redirect()->to('insertemployee')->withInput();
        }

        $nameImg = $this->request->getFile('image')->getRandomName();
        $this->request->getFile('image')->move('img', $nameImg);

        // inserting data to db when the data already pass with the validation
        $data = [
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
            'image' => $nameImg,
        ];

        $employeeModel->insert($data);

        // set redirect based on the checkbox in the form
        if ($input['input-other'] == '1') {
            return redirect()->to('insertemployee');
        }

        return redirect()->to('main');
    }
}