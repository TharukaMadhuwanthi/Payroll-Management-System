<?php

namespace App\Controllers;

use App\Models\LoanMasterModel;
use App\Models\ItemModel;
use App\Models\LoanReportsModel;

class Loanreports extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new LoanMasterModel();
        $data['item_list'] = $itemtype->getLoanMasterDetails();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
         
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required'],
               
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
                'MonthlyInterest' => ['label' => 'MonthlyInterest', 'rules' => 'required'],
                'NumInstallments' => ['label' => 'NumInstallments', 'rules' => 'required']
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $loan = new LoanMasterModel();
                $loan->save([
                    
                    'ItemCode' => $this->request->getPost('ItemCode'),
                  
                    'Amount' => $this->request->getPost('Amount'),
                    'MonthlyInterest' => $this->request->getPost('MonthlyInterest'),
                    'NumInstallments' => $this->request->getPost('NumInstallments')
                ]);
                $data['msg'] = "Loan Master Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
        
        $loanreports = new LoanReportsModel();
        
           
            $cal['sum']=$loanreports->getLoanProceedDetails();


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));       

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_reports/proceed', $cal);
        echo view('sys/footer');
         
    }  
    
    

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/edit');
        echo view('sys/footer');
    }
}
