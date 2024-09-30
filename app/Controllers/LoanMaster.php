<?php

namespace App\Controllers;

use App\Models\LoanMasterModel;
use App\Models\ItemModel;
use App\Models\LoanRequestModel;
use App\Models\EmployeeModel;

class LoanMaster extends BaseController {

    public function index() {
        
    }

    public function view() {
        helper('form');
        $loan = new LoanMasterModel();

        $data['list'] = $loan->getMasterDetails();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/view', $data);
        echo view('sys/footer');
    }

    public function edit() {


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/edit');
        echo view('sys/footer');
    }

    public function status() {
        helper('form');

        $loan = new LoanMasterModel();

        $data['list'] = $loan->getMasterDetails();
        $status = new LoanRequestModel();

        $da = $status->getLoanStatusDetails();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/status', $data, $da);
        echo view('sys/footer');
    }

    public function requestdetails() {
        helper('form');

        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        if ($this->request->getMethod() == 'post') {
            $data['emp'] = $employee->getEmployee($this->request->getPost('EmployeeCode'));

            $details = new LoanMasterModel();
            $data['d_list'] = $details->getLoanDetails($this->request->getPost('EmployeeCode'));
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/requestdetails', $data);
        echo view('sys/footer');
    }

    public function GrantedLoans() {
        helper('form');
        $grant = new LoanMasterModel();
        $data['glist'] = $grant->getGrantLoanDetails();

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/loan_master/grantedloans', $data);
        echo view('sys/footer');
    }
}
