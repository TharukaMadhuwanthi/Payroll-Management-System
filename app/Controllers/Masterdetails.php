<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\MasterDetailsModel;
use App\Models\ItemModel;

class Masterdetails extends BaseController {

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
        //print_r( $data['employee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'EmployeeCode' => ['label' => 'EmployeeId', 'rules' => 'required'],
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required|validatemaster[EmployeeCode,ItemCode]'],
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
            ];
            $errors=[
                
                'ItemCode'=>[
                    'validatemaster'=>'Item already exist!'
                ]
            ];

            if (!$this->validate($rules,$errors)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $master_details = new MasterDetailsModel();
                $master_details->save([
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'ItemCode' => $this->request->getPost('ItemCode'),
                    'Amount' => $this->request->getPost('Amount'),
                ]);
               // echo $master_details->getLastQuery();
                $data['msg'] = "Monthly Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/master_details/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
     $employee = new MasterDetailsModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getMasterDetails($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getMasterDetails();
        }
       

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));      

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/master_details/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/master_details/edit');
        echo view('sys/footer');
    }

  

    
}
