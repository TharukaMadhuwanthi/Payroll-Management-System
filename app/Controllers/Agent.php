<?php

namespace App\Controllers;

use App\Models\AgentModel;
use App\Models\ItemModel;

class Agent extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new ItemModel();
        $data['item_list'] = $itemtype->findAll();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Agent' => ['label' => 'Agent', 'rules' => 'required'],
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'TelNo' => ['label' => 'Tel. No.', 'rules' => 'required|min_length[10]'],
                'Address' => ['label' => 'Address', 'rules' => 'required'],
                'AccountNo' => ['label' => 'Account No', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $agent = new AgentModel();
                $agent->save([
                    'Agent' => $this->request->getPost('ItemCode'),
                    'Email' => $this->request->getPost('Email'),
                    'TelNo' => $this->request->getPost('TelNo'),
                    'Address' => $this->request->getPost('Address'),
                    'AccountNo' => $this->request->getPost('AccountNo'),
                ]);

                $data['msg'] = "Agent Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/agent/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');

        $employee = new AgentModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getAgentDetails($this->request->getPost('ItemCode'));
        } else {
            $data['list'] = $employee->getAgentDetails();
        }


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/agent/view', $data);
        echo view('sys/footer');
    }

    public function updatedetails($ItemCode = null) {
        helper('form'); //load form
        $item = new AgentModel(); //to create object from the emp model
        $data['ag'] = $item->where('Agent', $ItemCode)->first();

        echo view("sys/header");
        echo view("sys/menu");
        echo view("sys/agent/update_details", $data);
        echo view("sys/footer");
    }

    public function update() {
        helper('form');
        $data = array();
        $itemtype = new ItemModel();
        $data['item_list'] = $itemtype->findAll();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Agent' => ['label' => 'Agent', 'rules' => 'required'],
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'TelNo' => ['label' => 'Tel. No.', 'rules' => 'required|min_length[10]'],
                'Address' => ['label' => 'Address', 'rules' => 'required'],
                'AccountNo' => ['label' => 'Account No', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $agent = new AgentModel();
                $agent->update([
                    'Agent' => $this->request->getPost('ItemCode'),
                    'Email' => $this->request->getPost('Email'),
                    'TelNo' => $this->request->getPost('TelNo'),
                    'Address' => $this->request->getPost('Address'),
                    'AccountNo' => $this->request->getPost('AccountNo'),
                ]);

                $data['msg'] = "Agent Updated...!";
            }
            return redirect()->to('agent/view');
        }
    }
}
