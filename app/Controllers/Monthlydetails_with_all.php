<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\MonthlyDetailsModel;
use App\Models\ItemModel;

class Monthlydetails extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new ItemModel();
        $data['item_list'] = $itemtype->findAll();
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        // echo $employee->getLastQuery();
        //( $data['employee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'EmployeeCode' => ['label' => 'EmployeeCode', 'rules' => 'required'],
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required'],
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $monthly_details = new MonthlyDetailsModel();

                if ($this->request->getPost('EmployeeCode') == 'All') {
                    $emp = new EmployeeModel;
                    $allemp = $emp->findAll();
                    foreach ($allemp as $key => $value) {
                        $monthly_details->save([
                            'Year' => $this->request->getPost('Year'),
                            'Month' => $this->request->getPost('Month'),
                            'EmployeeCode' => $value['EmployeeCode'],
                            'ItemCode' => $this->request->getPost('ItemCode'),
                            'Amount' => $this->request->getPost('Amount'),
                        ]);
                    }
                } else {

                    $monthly_details->save([
                        'Year' => $this->request->getPost('Year'),
                        'Month' => $this->request->getPost('Month'),
                        'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                        'ItemCode' => $this->request->getPost('ItemCode'),
                        'Amount' => $this->request->getPost('Amount'),
                    ]);
                }
                echo $monthly_details->getLastQuery();
                $data['msg'] = "Monthly Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/monthly_details/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');

        $employee = new MonthlydetailsModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getMonthlyDetails($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getMonthlyDetails();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/monthly_details/view', $data);
        echo view('sys/footer');
    }

    public function edit() {


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/monthly_details/edit');
        echo view('sys/footer');
    }
}
