<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\ItemModel;
use App\Models\InstructionsModel;

class Instructions extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Year' => ['label' => 'Year', 'rules' => 'required'],
                'Month' => ['label' => 'Month', 'rules' => 'required'],
                'Date' => ['label' => 'Date', 'rules' => 'required'],
                'Instruction' => ['label' => 'Instruction', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $instructions = new InstructionsModel();
                $instructions->save([
                    'InstructionNo' => $this->request->getPost('InstructionId'),
                    'Year' => $this->request->getPost('Year'),
                    'Month' => $this->request->getPost('Month'),
                    'Date' => $this->request->getPost('Date'),
                    'Instruction' => $this->request->getPost('Instruction'),
                ]);
                echo $instructions->getLastQuery();
                $data['msg'] = "Instruction Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/instructions/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');

        $ins = new InstructionsModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $ins->where('InstructionNo', $this->request->getPost('InstructionId'))->findAll();
        } else {
            $data['list'] = $ins->findAll();
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/instructions/view', $data);
        echo view('sys/footer');
    }

    public function edit() {


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/instructions/edit');
        echo view('sys/footer');
    }
}
