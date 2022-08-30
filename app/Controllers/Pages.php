<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\HTTP\Request;

class Pages extends BaseController
{
    public function index()
    {
        $employeeModel = new EmployeeModel();
        $dataEmployee = $employeeModel->findAll();

        $data = [
            'title' => 'List Employee',
            'dataEmployee' => $dataEmployee,
        ];

        return view('pages/index', $data);
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert Data',
        ];

        return view('pages/insert', $data);
    }

    public function save()
    {
        $employeeModel = new EmployeeModel();
        $input = $this->request->getVar();

        $rulesPhone = ['is_unique[employee.phone]'];
        $rulesEmail = ['is_unique[employee.email]'];

        $errors = [
            'is_unique' => 'The {field} already registered'
        ];

        if (!$this->validate([
            'phone' => [
                'rules' => $rulesPhone,
                'errors' => $errors,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError());
            return redirect()->to('pages/insert')->withInput();
        }

        if (!$this->validate([
            'email' => [
                'rules' => $rulesEmail,
                'errors' => $errors,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError());
            return redirect()->to('pages/insert')->withInput();
        }

        $data = [
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
            'image' => $input['image'],
        ];

        $employeeModel->insert($data);

        if ($input['input-other'] == '1') {
            return redirect()->to('pages/insert');
        }

        return redirect()->to('pages');
    }
}