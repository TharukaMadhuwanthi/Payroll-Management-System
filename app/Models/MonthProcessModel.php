<?php

namespace App\Models;

use CodeIgniter\Model;

class MonthProcessModel extends Model
{
    protected $table="month_process";
    protected $primaryKey="Id";
    protected $allowedFields=['Id','Year','Month','EmployeeCode','ItemCode','Amount'];
    
     public function getMonthSummary($Year,$Month) {
        $query = $this->query("
SELECT m.ItemCode,ItemName,Sum(Amount) AS 'Total' FROM `month_process` m INNER JOIN item i ON m.ItemCode=i.ItemCode WHERE Year='$Year' AND Month='$Month' GROUP BY m.ItemCode ;");
        $result = $query->getResultArray();
        return $result;
    }
}


