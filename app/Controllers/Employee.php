<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DModel;
use App\Models\DesignationModel;
use App\Models\DsModel;
use App\Models\WorkPlaceModel;
use App\Models\UserAccountModel;

class Employee extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $district = new DModel();
        $data['district_list'] = $district->findAll();

        $designation = new DesignationModel();
        $data['designation_list'] = $designation->findAll();

        $work_place = new WorkPlaceModel();
        $data['work_place_list'] = $work_place->findAll();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'EmployeeCode' => ['label' => 'Employee Code', 'rules' => 'required'],
                'Title' => ['label' => 'Title', 'rules' => 'required'],
                'FirstName' => ['label' => 'First Name', 'rules' => 'required'],
                'LastName' => ['label' => 'Last Name', 'rules' => 'required'],
                'DOB' => ['label' => 'DOB', 'rules' => 'required'],
                'NIC' => ['label' => 'NIC', 'rules' => 'required'],
                'Type' => ['label' => 'Type', 'rules' => 'required'],
                'AppointmentDate' => ['label' => 'Appointment Date', 'rules' => 'required'],
                'Designation' => ['label' => 'Designation', 'rules' => 'required'],
                'WorkPlace' => ['label' => 'WorkPlace', 'rules' => 'required'],
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'TelNo' => ['label' => 'Tel. No.', 'rules' => 'required|min_length[10]'],
                'Address' => ['label' => 'Address', 'rules' => 'required'],
                'BankCode' => ['label' => 'BankCode', 'rules' => 'required'],
                'BranchCode' => ['label' => 'BranchCode', 'rules' => 'required'],
                'AccountNo' => ['label' => 'Account No', 'rules' => 'required'],
                'Status' => ['label' => 'Status', 'rules' => 'required'],
                    //  'District' => ['label' => 'District', 'rules' => 'required'],
                    //'DsDivision' => ['label' => 'DsDivision', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $employee = new EmployeeModel();
                $employee->save([
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'Title' => $this->request->getPost('Title'),
                    'FirstName' => $this->request->getPost('FirstName'),
                    'LastName' => $this->request->getPost('LastName'),
                    'DOB' => $this->request->getPost('DOB'),
                    'NIC' => $this->request->getPost('NIC'),
                    'Type' => $this->request->getPost('Type'),
                    'AppointmentDate' => $this->request->getPost('AppointmentDate'),
                    'Designation' => $this->request->getPost('Designation'),
                    'WorkPlace' => $this->request->getPost('WorkPlace'),
                    'Email' => $this->request->getPost('Email'),
                    'TelNo' => $this->request->getPost('TelNo'),
                    'Address' => $this->request->getPost('Address'),
                    'BankCode' => $this->request->getPost('BankCode'),
                    'BranchCode' => $this->request->getPost('BranchCode'),
                    'AccountNo' => $this->request->getPost('AccountNo'),
                    'Status' => $this->request->getPost('Status'),
                    'District' => $this->request->getPost('District'),
                    'DsDivision' => $this->request->getPost('dsdivision')
                ]);

                $data['msg'] = "Employee Saved...!";
            }
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/employee/add', $data);
        echo view('sys/footer');
    }

    public function view() {
       helper('form');
        $employee = new EmployeeModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getEmployeeDetails($this->request->getPost('EmployeeCode'));
        } else {
            $data['list'] = $employee->getEmployeeDetails();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/employee/view', $data);
        echo view('sys/footer');
    }


    public function viewprofile($emp = null) {
        helper('form');
        $employeecode = session()->get('EmployeeCode');
        // Load EmployeeModel
        $employee = new EmployeeModel();

        // Fetch all employees
        $data['list'] = $employee->join('designation', 'designation.DesId=employee.Designation', 'left')->join('work_place', 'work_place.PlaceId=employee.WorkPlace', 'left')->where('EmployeeCode', $employeecode)->first();

        // Get the user type from the session
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        // Load views
        echo view('Sys/header');
        echo view('Sys/menu_' . $user_type);
        echo view('sys/employee/profile', $data);
        echo view('sys/footer');
    }

    public function getdsdivision() {
        $ds = new DsModel();
        $DistrictId = $this->request->getPost('DistrictId');
        $data['list'] = $ds->where('DistrictId', $DistrictId)->findAll();

        return view('sys/employee/dsdivision', $data);
    }

    public function getemployeecode() {
        $placeid = $this->request->getPost('placeid');

        $employee = new EmployeeModel();
        $emp = $employee->orderBy('Id', 'DESC')->first();
        if (isset($emp['Id'])) {

            $nextid = $emp['Id'] + 1;
            $nextid = sprintf('%04d', $nextid);
            echo $placeid . $nextid;
        } else {

            $nextid = 1;
            $nextid = sprintf('%04d', $nextid);
            echo $placeid . $nextid;
        }
    }

   /* public function updateview() {


        echo view("sys/header");
        echo view("sys/menu");
        echo view("sys/employee/updatebutton");
        echo view("sys/footer");
    }*/

    public function updatedetails($EmployeeCode = null) {
        helper('form'); //load form
        $employee = new EmployeeModel(); //to create object from the emp model
        $designation = new DesignationModel();
        $data['designation_list'] = $designation->findAll();
        $work_place = new WorkPlaceModel();
        $data['work_place_list'] = $work_place->findAll();
        $data['emp'] = $employee->where('EmployeeCode', $EmployeeCode)->first();

        
         $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view("sys/header");
        echo view("sys/menu_' . $user_type");
        echo view("sys/employee/update_details", $data);
        echo view("sys/footer");
    }

    public function update() {
        helper('form');
        $data = array();
        $district = new DModel();
        $data['district_list'] = $district->findAll();

        $designation = new DesignationModel();
        $data['designation_list'] = $designation->findAll();

        $work_place = new WorkPlaceModel();
        $data['work_place_list'] = $work_place->join('employee', 'work_place.PlaceId=employee.WorkPlace', 'left')->findAll();
        //check form is submit as post
        $emp = new EmployeeModel();
        $data['employee'] = $emp->where('Id', $this->request->getPost('Id'))->first();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'EmployeeCode' => ['label' => 'Employee Code', 'rules' => 'required'],
               /*'Title' => ['label' => 'Title', 'rules' => 'required'],
                'FirstName' => ['label' => 'First Name', 'rules' => 'required'],
                'LastName' => ['label' => 'Last Name', 'rules' => 'required'],
                'DOB' => ['label' => 'DOB', 'rules' => 'required'],
                'NIC' => ['label' => 'NIC', 'rules' => 'required'],
                'Type' => ['label' => 'Type', 'rules' => 'required'],
                'AppointmentDate' => ['label' => 'Appointment Date', 'rules' => 'required'],
                'Designation' => ['label' => 'Designation', 'rules' => 'required'],
                'WorkPlace' => ['label' => 'WorkPlace', 'rules' => 'required'],
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'TelNo' => ['label' => 'Tel. No.', 'rules' => 'required|min_length[10]'],
                'Address' => ['label' => 'Address', 'rules' => 'required'],
                'BankCode' => ['label' => 'BankCode', 'rules' => 'required'],
                'BranchCode' => ['label' => 'BranchCode', 'rules' => 'required'],
                'AccountNo' => ['label' => 'Account No', 'rules' => 'required'],
                'Status' => ['label' => 'Status', 'rules' => 'required'],*/
                    //  'District' => ['label' => 'District', 'rules' => 'required'],
                    //'DsDivision' => ['label' => 'DsDivision', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $employee = new EmployeeModel();
                $employee->update($this->request->getPost('Id'), [
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'Title' => $this->request->getPost('Title'),
                    'FirstName' => $this->request->getPost('FirstName'),
                    'LastName' => $this->request->getPost('LastName'),
                    'DOB' => $this->request->getPost('DOB'),
                    'NIC' => $this->request->getPost('NIC'),
                    'Type' => $this->request->getPost('Type'),
                    'AppointmentDate' => $this->request->getPost('AppointmentDate'),
                    'Designation' => $this->request->getPost('Designation'),
                    'WorkPlace' => $this->request->getPost('WorkPlace'),
                    'Email' => $this->request->getPost('Email'),
                    'TelNo' => $this->request->getPost('TelNo'),
                    'Address' => $this->request->getPost('Address'),
                    'BankCode' => $this->request->getPost('BankCode'),
                    'BranchCode' => $this->request->getPost('BranchCode'),
                    'AccountNo' => $this->request->getPost('AccountNo'),
                    'Status' => $this->request->getPost('Status'),
                    'District' => $this->request->getPost('District'),
                    'DsDivision' => $this->request->getPost('dsdivision')
                ]);

              echo  $data['msg'] = "Employee Updated...!";
            }
        }


        return redirect()->to('employee/view');
    }
}
