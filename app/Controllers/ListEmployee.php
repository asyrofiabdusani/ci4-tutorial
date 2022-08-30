<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\HTTP\Request;

class ListEmployee extends BaseController
{
    // controller for main
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
}