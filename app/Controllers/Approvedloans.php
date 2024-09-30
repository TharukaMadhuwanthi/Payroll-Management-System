<?php

namespace App\Controllers;

use App\Models\LoanRequestModel;
use App\Models\ItemModel;
use App\Models\EmployeeModel;
use App\Models\LoanMasterModel;
use App\Models\ApprovedLoansModel;

class Approvedloans extends BaseController {
    
        public function add() {
        helper('form');
        $data = array();
        $itemtype = new LoanRequestModel();
        $data['item_list'] = $itemtype->getLoanRequestDetails();
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        
                        $loan = new LoanRequestModel();
                        
                       $data['list']=$loan->UpdateLoanRequestDetails( $EmployeeCode,$requestid);
                       echo view('sys/loan_requested/view', $data);
                
        }


    public function view($EmployeeCode=null, $requestid=null) {
      
        
               helper('form');
          $loanrequest = new LoanRequestModel();
        
            $data['list'] = $loanrequest->getLoanRequestbyRequestId($EmployeeCode,$requestid);
           

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/approved_loans/view', $data);
        echo view('sys/footer');
        
     
    }
    
    public function updateloanrequeststatus(){
        $loanrequest = new LoanRequestModel();
        $newdata=[
            "Status"=>$this->request->getPost('action')
        ];
        $loanrequest->where(['Id'=>$this->request->getPost('requestid')])->set($newdata)->update();
        helper('form');
          $loanrequest = new LoanRequestModel();
        
            $data['list'] = $loanrequest->getLoanRequest();
           

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_request/view', $data);
        echo view('sys/footer');        
        
    }
    


    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/approved_loans/edit');
        echo view('sys/footer');
    }
}

