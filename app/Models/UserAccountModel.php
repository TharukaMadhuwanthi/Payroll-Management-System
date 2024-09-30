<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAccountModel extends Model
{
    protected $table="user_account";
    protected $primaryKey="Id";
    protected $allowedFields=['Name','Email','UserType','Status','Username','Password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    
    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);  
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);       
        return $data;
    }
    
    protected function passwordHash(array $data) {
        if (isset($data['data']['Password'])){
            $data['data']['Password'] = password_hash($data['data']['Password'], PASSWORD_DEFAULT);

        return $data;
        }
    }
    

 public function getUserDetails() {
        $query = $this->query("
SELECT * FROM `user_account` u INNER JOIN employee e ON u.EmployeeCode=e.EmployeeCode");
        $result = $query->getResultArray();
        return $result;
    }
    
    public function viewUserDetails($EmployeeCode=null) {
          $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE u.Name ='$EmployeeCode' ";
            }
        $query = $this->query("
SELECT * FROM `employee` e LEFT JOIN user_account u ON e.EmployeeCode=u.Name $where GROUP BY e.EmployeeCode ;");
        $result = $query->getResultArray();
        return $result;
    }
    
}


