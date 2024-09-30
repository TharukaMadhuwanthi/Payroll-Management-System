<?php

namespace App\Controllers;

use App\Models\SubWorkReportModel;

class WorkReport extends BaseController {

    public function index() {
        
    }


    public function work_report() {
        helper('form');
        $item = new SubWorkReportModel();
        $data['list'] = $item->findAll();
        
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


