<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\MonthlyDetailsModel;
use App\Models\ItemModel;
use App\Models\CommonEntriesModel;

class CommonEntries extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new ItemModel();
        $data['item_list'] = $itemtype->findAll();
        $employee = new EmployeeModel();
        $employees = $employee->findAll();
        $common = new CommonEntriesModel();
        // echo $employee->getLastQuery();
        //( $data['employee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required'],
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                foreach ($employees as $employee) {
            $employeecode = $employee['EmployeeCode'];

            // Insert data into the common table
            $data = [
                'Employeecode' => $employeecode,
               'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'ItemCode' => $this->request->getPost('ItemCode'),
                    'Amount' => $this->request->getPost('Amount'),
            ];

            // Insert data into the common table
            $common->insert($data);
        }
                
                $data['msg'] = "Monthly Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/common_entries/add', $data);
        echo view('sys/footer');
    }

  /*  public function view() {
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
        echo view('sys/common_entries/view', $data);
        echo view('sys/footer');
    }*/

   
}


