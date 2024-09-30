<?php

namespace App\Models;

use CodeIgniter\Model;

class MonthlyDetailsModel extends Model {

    protected $table = "monthly_details";
    protected $primaryKey = "Id";
    protected $allowedFields = ['Year', 'Month', 'EmployeeCode', 'ItemCode', 'Amount'];

    public function getMonthlyDetails($EmployeeCode=null) {
        $where=null;
            if (!empty($EmployeeCode)){
                $where=" WHERE e.EmployeeCode ='$EmployeeCode' ";
            }
        $query = $this->query("
SELECT * FROM `monthly_details` m INNER JOIN employee e ON m.EmployeeCode=e.EmployeeCode INNER JOIN item i ON m.ItemCode=i.ItemCode $where GROUP BY m.ItemCode,m.EmployeeCode;");
        $result = $query->getResultArray();
        return $result;
    }
}
