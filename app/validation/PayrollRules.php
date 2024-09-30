<?php

namespace App\Validation;

use App\Models\PayrollModel;


class PayrollRules {

    public function validatemaster(string $str, string $fields, array $data) {
        $model = new PayrollModel();
        $master = $model->where(['EmployeeCode'=> $data['EmployeeCode'],'ItemCode'=>$data['ItemCode']])->first();

        if ($master)
            return false;
       
       
    }

}