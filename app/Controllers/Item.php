<?php

namespace App\Controllers;

use App\Models\ItemModel;


class Item extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'ItemCode' => ['label' => 'Description', 'rules' => 'required'],
                'ItemName' => ['label' => 'Item Name', 'rules' => 'required'],
                'Description' => ['label' => 'Description', 'rules' => 'required'],
                'Status' => ['label' => 'Status', 'rules' => 'required'],
                'ItemType' => ['label' => 'ItemType', 'rules' => 'required|validateItemType[ItemCode,ItemType]']
            ];
            $errors = [
                'ItemType' => [
                    'validateItemType' => 'Item Code is not a Addition code'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $item = new ItemModel();
                $item->save([
                    'ItemCode' => $this->request->getPost('ItemCode'),
                    'ItemName' => $this->request->getPost('ItemName'),
                    'Description' => $this->request->getPost('Description'),
                    'Status' => $this->request->getPost('Status'),
                    'ItemType' => $this->request->getPost('ItemType')
                ]);
                $data['msg'] = "Item Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/item/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
      
        $itm = new ItemModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $itm->where('ItemCode', $this->request->getPost('ItemCode'))->findAll();
        } else {
            $data['list'] = $itm->findAll();
        }

        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/item/view', $data);
        echo view('sys/footer');
    }

    public function edit() {
        

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));
        
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/item/edit');
        echo view('sys/footer');
    }
}
