<?php

namespace App\Validation;

class SubRules {

    public function validateSub(string $str, string $fields, array $data) {


         $subs = new SubstitutionModel();
        $user = $subs->where('Avalilability', $data['yes'])->first();

        if (!$user)
            
        
            
           
           
            return false;
    }
     
    
}
