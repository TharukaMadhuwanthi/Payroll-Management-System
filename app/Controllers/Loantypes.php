<?php

namespace App\Controllers;

use App\Models\LoanTypesModel;
use App\Models\ItemModel;

class Loantypes extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new LoanTypesModel();
        $data['item_list'] = $itemtype->getLoanTypeDetails();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
         
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required'],
               
                'Capital' => ['label' => 'Capital', 'rules' => 'required'],
                'MonthlyInterest' => ['label' => 'MonthlyInterest', 'rules' => 'required'],
                'NumInstallments' => ['label' => 'NumInstallments', 'rules' => 'required']
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $loan = new LoanTypesModel();
                $loan->save([
                    
                    'ItemCode' => $this->request->getPost('ItemCode'),
                  
                    'Capital' => $this->request->getPost('Capital'),
                    'MonthlyInterest' => $this->request->getPost('MonthlyInterest'),
                    'NumInstallments' => $this->request->getPost('NumInstallments')
                ]);
                $data['msg'] = "Loan Master Details Saved...!";
            }
        }
        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_types/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');

        $employee = new LoanTypesModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getLoanTypes($this->request->getPost('ItemCode'));
        } else {
            $data['list'] = $employee->getLoanTypes();
        }
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_types/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_types/edit');
        echo view('sys/footer');
    }
}
