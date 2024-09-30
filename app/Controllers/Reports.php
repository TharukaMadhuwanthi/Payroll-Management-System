<?php

namespace App\Controllers;

use App\Models\ItemModel;


class Reports extends BaseController {

    public function monthlyreport() {

        helper(['form', 'url']);
        echo 'ok';

        $user_type = strtolower(session()->get('UserType'));
        echo view('sys/header');
        echo view('sys/menu_' . $user_type);
        //echo view('sys/reports');
        echo view('sys/reports/report_view');
        echo view('sys/footer');
    }
}


