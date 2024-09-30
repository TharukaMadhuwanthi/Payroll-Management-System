<?php

namespace App\Controllers;

use App\Models\LoanRequestModel;
use App\Models\ItemModel;
use App\Models\EmployeeModel;
use App\Models\LoanMasterModel;
use App\Models\GrantLoansModel;

class Loanrequest extends BaseController {

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
                'EmployeeCode' => ['label' => 'Employee', 'rules' => 'required'],
                'LoanType' => ['label' => 'LoanType', 'rules' => 'required'],
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
                'Reason' => ['label' => 'Reason', 'rules' => 'required'],
                'Guarantor1' => ['label' => 'Guarantor1', 'rules' => 'required'],
                'Guarantor2' => ['label' => 'Guarantor2', 'rules' => 'required']
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $loan = new LoanRequestModel();
                $loan->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'Date' => $this->request->getPost('Date'),
                    'Employee' => $this->request->getPost('EmployeeCode'),
                    'LoanType' => $this->request->getPost('LoanType'),
                    'Amount' => $this->request->getPost('Amount'),
                    'Reason' => $this->request->getPost('Reason'),
                    'Guarantor1' => $this->request->getPost('Guarantor1'),
                    'Guarantor2' => $this->request->getPost('Guarantor2'),
                ]);
                $data['msg'] = "Loan Request Details Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_request/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
        $employee = new LoanRequestModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getLoanRequest($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getLoanRequest();
        }



        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_request/view', $data);
        echo view('sys/footer');
    }

    public function approvedview() {
        helper('form');

        $employee = new LoanRequestModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getApprovedLoanDetails($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getApprovedLoanDetails();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/approvedview', $data);
        echo view('sys/footer');
    }

    public function grantview($employee = null, $loanrequestid = null) {
        helper('form');

        $loanrequest = new GrantLoansModel();

        $data['list'] = $loanrequest->getGrantLoanDetails($loanrequestid);

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/grantview', $data);
        echo view('sys/footer');
    }

    public function edit() {


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type,);
        echo view('sys/loan_request/edit');
        echo view('sys/footer');
    }

    public function getamount() {
        $amount = new LoanTypesModel();
        $viewamount = $this->request->getPost('ItemCode');
        $data['list'] = $amount->where('ItemCode', $viewamount)->findAll();

        return view('sys/loanrequest/loanamount', $data);
    }
}
