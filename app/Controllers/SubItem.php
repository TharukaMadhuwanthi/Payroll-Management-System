<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\SubMasterModel;

class SubItem extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $itemtype = new ItemModel();
        $data['item_list'] = $itemtype->findAll();
        
        // echo $employee->getLastQuery();
        //print_r( $data['employee_list']);
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                
                'ItemCode' => ['label' => 'ItemCode', 'rules' => 'required'],
                'Amount' => ['label' => 'Amount', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                echo 'validated';
                $data['validation'] = $this->validator;
            } else {
                $sub_item = new SubMasterModel();
                $sub_item->save([
                    
                    'ItemCode' => $this->request->getPost('ItemCode'),
                    'Amount' => $this->request->getPost('Amount'),
                ]);
               // echo $master_details->getLastQuery();
                $data['msg'] = "Sub Item Details Saved...!";
            }
        }
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/sub_item/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
        
              $employee = new SubMasterModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $employee->getSubItem($this->request->getPost('ItemCode'));
        } else {
            $data['list'] = $employee->getSubItem();
        }
       
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));  

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/sub_item/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        
        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/sub_item/edit');
        echo view('sys/footer');
    }

  

    
}
