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
                
                'EmployeeCode' => ['label' => 'EmployeeCode', 'rules' => 'required'],
                'WorkedDays' => ['label' => 'WorkedDays', 'rules' => 'required']
                
            ];
            
            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $attendance = new AttendanceModel();
                $attendance->save([
                    
                    'EmployeeCode' => $this->request->getPost('EmployeeCode'),
                    'WorkedDays' => $this->request->getPost('WorkedDays')
                    
                ]);
              
                $data['msg'] = "Attendance Saved...!";
            }
        }

       
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/attendance/add', $data);
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
