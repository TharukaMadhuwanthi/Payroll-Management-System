<?php

namespace App\Models;

use CodeIgniter\Model;

class SubMonthProcessModel extends Model
{
    protected $table="sub_month_process";
    protected $primaryKey="Id";
    protected $allowedFields=['Id','Year','Month','EmployeeCode','Days','ItemCode','Rate','Amount'];
    
        public function getWorkReport($EmployeeCode, $Year, $Month) {
        $query = $this->query("
SELECT Year, Month, s.SubstitutedEmployee, COUNT(s.Id) As Days FROM `substitution` s WHERE s.SubstitutedEmployee='$EmployeeCode' AND Year='$Year' AND Month='$Month' ");
        $result = $query->getResultArray();
        return $result;
    }
}

