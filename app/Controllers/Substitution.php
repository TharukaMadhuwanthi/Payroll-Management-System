<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\SubstitutionModel;

class Substitution extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();

        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        
        //$subs = new SubstitutionModel();
        //$data['Availability'] = $subs->findAll();
        // echo $employee->getLastQuery();
        //( $data['empyee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'Date' => ['label' => 'Date', 'rules' => 'required'],
                'EmployeeCode' => ['label' => 'Employee Code', 'rules' => 'required'],
                'SubstitutedEmployee' => ['label' => 'SubstitutedEmployee', 'rules' => 'required'],
                'Availability'=>['label'=> 'Availability','rules'=>'required|validateSub[Availability]']
            ];
  $errors = [
                'Availability' => [
                    'validateSub' => 'Already work!'
                ]
            ];
  
  
            if (!$this->validate($rules,$errors)) {
                echo 'validated';
                $data['validation'] = $this->validator;
                
                
            } else 
            {
                  
            if ($employee->where(['Avalability' => 'no'])){
                 $data['msg'] = "Employee is already working...!";
            }
            else
            {
                $substitution = new SubstitutionModel();
                $substitution->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'Date' => $this->request->getPost('Date'),
                    'Employee' => $this->request->getPost('EmployeeCode'),
                    'SubstitutedEmployee' => $this->request->getPost('SubstitutedEmployee'),
                     'Availability' => $this->request->getPost('Availability'),
                ]);
               // echo $substitution->getLastQuery();
                $data['msg'] = "Substitution Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/substitution/add', $data);
        echo view('sys/footer');
    }}

    public function view() {
        helper('form');

        $employee = new SubstitutionModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getAttendance($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getAttendance();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/substitution/view', $data);
        echo view('sys/footer');
    }

    public function edit() {

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/substitution/edit');
        echo view('sys/footer');
    }
}
