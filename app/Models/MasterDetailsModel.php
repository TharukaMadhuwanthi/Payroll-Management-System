<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterDetailsModel extends Model
{
    protected $table="master_details";
    protected $primaryKey="Record_no";
    protected $allowedFields=['Record_no','EmployeeCode','ItemCode','Amount'];
    
    public function getMasterDetails($EmployeeCode=null) {
        $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE e.EmployeeCode ='$EmployeeCode' ";
            }
        $query = $this->query("
SELECT * FROM `master_details` m INNER JOIN employee e ON m.EmployeeCode=e.EmployeeCode INNER JOIN item i ON m.ItemCode=i.ItemCode $where GROUP BY m.ItemCode,m.EmployeeCode;");
        $result = $query->getResultArray();
        return $result;
    }
}



