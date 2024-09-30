<?php

namespace App\Validation;

class ItemRules {

    public function validateItemType(string $str, string $fields, array $data) {


        if ($data['ItemCode'] < 200 && $data['ItemType'] == 'Deduction')
            return false;
    }
     
    
}
