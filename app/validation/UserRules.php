<?php

namespace App\Validation;

use App\Models\UserAccountModel;


class UserRules {

    public function validateUser(string $str, string $fields, array $data) {
        $model = new UserAccountModel();
        $user = $model->where('Username', $data['username'])->first();

        if (!$user)
            return false;
        return password_verify($data['password'], $user['Password']);
       
    }

}