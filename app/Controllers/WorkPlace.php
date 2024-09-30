<?php

namespace App\Controllers;

use App\Models\WorkPlaceModel;

class WorkPlace extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        //check form is submit as post

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'Place' => ['label' => 'Place', 'rules' => 'required']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $item = new WorkPlaceModel();
                $item->save([
                    'Place' => $this->request->getPost('Place')
                ]);
                $data['msg'] = "Work Place Saved...!";
            }
        }

        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/work_place/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');

        $work = new WorkPlaceModel();
        if ($this->request->getMethod() == 'post') {
            $data['list'] = $work->getEmployeeCount($this->request->getPost('PlaceId'));
        } else {
            $data['list'] = $work->getEmployeeCount();
        }
       //echo $work->getLastQuery();
      /*  $place = new WorkPlaceModel();
        $data['list'] = $place->findAll();*/


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/work_place/view', $data);
        echo view('sys/footer');
    }

    public function edit() {


        $user_type = str_replace(' ', '', strtolower(session()->get('UserType')));

        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        echo view('sys/workplace/edit');
        echo view('sys/footer');
    }
}
