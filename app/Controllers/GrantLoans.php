<?php

namespace App\Controllers;

use App\Models\LoanRequestModel;
use App\Models\ItemModel;
use App\Models\EmployeeModel;
use App\Models\LoanMasterModel;
use App\Models\GrantLoansModel;

class GrantLoans extends BaseController {

    public function index() {
        
    }

    public function add() {

        helper('form');
        $data = array();
        $itemtype = new LoanRequestModel();
        $data['item_list'] = $itemtype->getLoanRequestDetails();
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        $details = new GrantLoansModel();
        $data['list'] = $details->findAll();

//check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'Date' => ['label' => 'Date', 'rules' => 'required'],
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $grant = new GrantLoansModel();
                $grant->save([
                    'LoanRequestId' => $this->request->getPost('Id'),
                    'RYear' => $this->request->getPost('Year'),
                    'RMonth' => $this->request->getPost('Month'),
                    'RDate' => $this->request->getPost('Date'),
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'LoanType' => $this->request->getPost('Type'),
                    'Capital' => $this->request->getPost('Capital'),
                    'MonthlyInstallment' => $this->request->getPost('MonthlyInstallmentAmount'),
                    'MonthlyInterest' => $this->request->getPost('MonthlyiInterestAmount'),
                    'TotalInterest' => $this->request->getPost('TotalInterest'),
                    'MonthlyDeduction' => $this->request->getPost('MonthlyDeduction'),
                    'RecoverAmount' => $this->request->getPost('Capital')+$this->request->getPost('TotalInterest')
                ]);
                
                $data['msg'] = "Grant Loan Details Saved...!";
            }
        }

        $loanrequest = new GrantLoansModel();

        $data['list'] = $loanrequest->getGrantLoanDetails($this->request->getPost('Id'));
        echo $this->request->getPost('Id');
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));    
        

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/approvedview', $data);
        echo view('sys/footer');
    }
}
