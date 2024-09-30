<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\AttendanceModel;


class Attendance extends BaseController {

    public function index() {
        
    }

    public function add() {
         helper('form');
        $data = array();
        
        $employee = new EmployeeModel();
        $data['employee_list'] = $employee->findAll();
        // echo $employee->getLastQuery();
       //( $data['empyee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                 'Date' => ['label' => 'Date', 'rules' => 'required'],
                'EmployeeCode' => ['label' => 'EmployeeCode', 'rules' => 'required'],
                'Presence' => ['label' => 'Presence', 'rules' => 'required'],
                'ReliefEmployee' => ['label' => 'ReliefEmployee', 'rules' => 'required'],
            ];
            
            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $attendance = new AttendanceModel();
                $attendance->save([
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'Date' => $this->request->getPost('Date'),
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'Presence' => $this->request->getPost('Presence'),
                    'ReliefEmployee' => $this->request->getPost('ReliefEmployee'),
                ]);
              
                $data['msg'] = "Attendance Saved...!";
            }
        }

       
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/attend/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
        $attendance = new AttendanceModel();
        $data['list'] = $attendance->getAttendance();
     

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/attendance/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));     
                
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/attendance/edit');
        echo view('sys/footer');
    }
}
