<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

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
}