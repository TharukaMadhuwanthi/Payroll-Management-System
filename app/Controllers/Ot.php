<?php

namespace App\Controllers;

use App\Models\LoanRequestModel;
use App\Models\ItemModel;
use App\Models\EmployeeModel;
use App\Models\LoanMasterModel;
use App\Models\GrantLoansModel;
use App\Models\OtModel;

class Ot extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new LoanRequestModel();
        $data['item_list'] = $itemtype->getLoanRequestDetails();
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();

        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'Date' => ['label' => 'Date', 'rules' => 'required'],
                'Employee' => ['label' => 'Employee', 'rules' => 'required'],
                'OtMonth' => ['label' => 'OT Month', 'rules' => 'required'],
                'OtYear' => ['label' => 'OT Year', 'rules' => 'required'],
                'OtHours' => ['label' => 'OT Hours', 'rules' => 'required'],
                'OtReason' => ['label' => 'OT Reason', 'rules' => 'required']
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $loan = new OtModel();
                $loan->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'Date' => $this->request->getPost('Date'),
                    'Employee' => $this->request->getPost('Employee'),
                    'MonthOT' => $this->request->getPost('OtMonth'),
                    'YearOT' => $this->request->getPost('OtYear'),
                    'Hours' => $this->request->getPost('OtHours'),
                    'Reason' => $this->request->getPost('OtReason')
                ]);
                $data['msg'] = "OT Request Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/ot/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
              $employee = new OtModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->requestOT($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->requestOT();
        }
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/ot/view', $data);
        echo view('sys/footer');
    }
        public function ApproveView($EmployeeCode=null, $requestid=null) {
      
        
               helper('form');
          $otrequest = new OtModel();
        
            $data['list'] = $otrequest->getOtRequestbyRequestId($EmployeeCode,$requestid);
           

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/ot/approveOT', $data);
        echo view('sys/footer');
        
     
    }
    public function updateotrequeststatus(){
        $otrequest = new OtModel();
        $newdata=[
            "Status"=>$this->request->getPost('action')
        ];
        $otrequest->where(['Id'=>$this->request->getPost('Orequestid')])->set($newdata)->update();
        helper('form');
          $otrequest1 = new OtModel();
        
            $data['list'] = $otrequest1->requestOT();
           

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/Ot/View', $data);
        echo view('sys/footer');        
        
    }
    public function approvedview() {
        helper('form');
        $loanrequest = new LoanRequestModel();

        $data['list'] = $loanrequest->getApprovedLoanDetails();
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/approvedview', $data);
        echo view('sys/footer');
    }

    public function grantview() {
        helper('form');
        $loanrequest = new LoanRequestModel();
        $newdata = [
            "Status" => $this->request->getPost('action')
        ];
        $loanrequest->where(['Id' => $this->request->getPost('requestid')])->set($newdata)->update();
        $loanrequest = new GrantLoansModel();

        $data['list'] = $loanrequest->getGrantLoanDetails();
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/grantview', $data);
        echo view('sys/footer');
    }

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_request/edit');
        echo view('sys/footer');
    }
}
